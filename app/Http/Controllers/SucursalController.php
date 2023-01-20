<?php

namespace App\Http\Controllers;

use App\Models\Sucursal;
use App\Models\Estado;
use App\Models\Municipio;
use App\Models\Localidad;
use Illuminate\Http\Request;
use App\Http\Requests\Sucursales\CreateSucursalRequest;
use App\Http\Requests\Sucursales\EditSucursalRequest;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;  
use App\Exports\SucursalesExport;
use Maatwebsite\Excel\Facades\Excel;

class SucursalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sucursales   = Sucursal::orderBy('sucursal_id','DESC')->where('deleted_at', '=', NULL)->get();
        return view('sucursales.index', compact('sucursales'));
    }

    public function papelera()
    {
        $sucursales   = Sucursal::onlyTrashed()->get();
        $estados      = Estado::all();
        $municipios   = Municipio::all();
        $localidades  = Localidad::all();

        return view('sucursales.papelera')
        ->with(['sucursales'   => $sucursales])
        ->with(['estados'      => $estados])
        ->with(['municipios'   => $municipios])
        ->with(['localidades'  => $localidades]);
    }

    public function getMunicipios(Request $request)
    {
        $municipios = \DB::table('municipios')
            ->where('estado_id', $request->estado_id)
            ->get();
        
        if (count($municipios) > 0) {
            return response()->json($municipios);
        }
    }

   public function getLocalidades(Request $request)
    {
        $localidades = \DB::table('localidads')
            ->where('municipio_id', $request->municipio_id)
            ->get();
        
        if (count($localidades) > 0) {
            return response()->json($localidades);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $estados      = Estado::all();
        $municipios   = Municipio::all();
        $localidades  = Localidad::all();

        return view('sucursales.create', compact('estados', 'municipios', 'localidades'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateSucursalRequest $request)
    {
        $imagen2 = "shadow.jpg";
        $newSucursal = Sucursal::create($request->all());

        if ($request->hasFile('imagen')) {
          $newSucursal->imagen = Storage::disk('sucursal-imagenes')->putFile('', $request->file('imagen'));
        }else{    
          $newSucursal->imagen = ($imagen2);
        }
        $newSucursal->save();

        //  Sucursal::create($request->all());

         return redirect()->route('sucursales.index')
        ->with('message', 'Sucursal creada exitosamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Sucursal  $sucursal
     * @return \Illuminate\Http\Response
     */
    public function show(Sucursal $sucursale)
    {
        $estados      = Estado::all();
        $municipios   = Municipio::all();
        $localidades  = Localidad::all();

        return view('sucursales.show', compact('sucursale','estados', 'municipios', 'localidades'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Sucursal  $sucursal
     * @return \Illuminate\Http\Response
     */
    public function edit(Sucursal $sucursale)
    {
        $estados      = Estado::all();
        $municipios   = Municipio::all();
        $localidades  = Localidad::all();

        return view('sucursales.edit', compact('sucursale', 'estados', 'municipios', 'localidades'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Sucursal  $sucursal
     * @return \Illuminate\Http\Response
     */
    public function update(EditSucursalRequest $request, Sucursal $sucursale)
    {
        //  $sucursal->update($request->all());
         $sucursale->update($request->except(['sucursal_id', 'imagen']));

         if ($request->hasFile('imagen')) {
            if (Storage::disk('sucursal-imagenes')->exists("$sucursale->imagen")) {
                if($sucursale->imagen == "shadow.jpg"){
                     $sucursale->imagen = "shadow.jpg";
                } else {
                 Storage::disk('sucursal-imagenes')->delete("$sucursale->imagen");
                }
            }
            $sucursale->imagen = Storage::disk('sucursal-imagenes')->putFile('', $request->file('imagen'));
        }

        $sucursale->save();

        return redirect()->route('sucursales.index')->with('message', 'Sucursal actualizada exitosamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Sucursal  $sucursal
     * @return \Illuminate\Http\Response
     */
    public function destroy(Sucursal $sucursale)
    {
        $sucursale->delete();

        return redirect()->route('sucursales.index')->with('eliminar','ok');
    }

     public function activar($sucursal_id)
    {
        $sucursales = Sucursal::withTrashed()->where('sucursal_id', $sucursal_id)->restore();

        return redirect()->route('sucursales.papelera')->with('activar','ok');
    }

    public function borrar($sucursal_id)
    {
        $sucursal = Sucursal::withTrashed()->where('sucursal_id', $sucursal_id)->find($sucursal_id);

        if (Storage::disk('sucursal-imagenes')->exists("$sucursal->imagen")) {
            if($sucursal->imagen == "shadow.jpg"){
                    
                } else {
                    Storage::disk('sucursal-imagenes')->delete("$sucursal->imagen");
                }
        }
        
        $sucursals = Sucursal::withTrashed()->where('sucursal_id', $sucursal_id)->forcedelete();

        return redirect()->route('sucursales.papelera')->with('borrar','ok');
    }

      public function export()
    {
       return Excel::download(new SucursalesExport, 'sucursales.xlsx');
    }
}
