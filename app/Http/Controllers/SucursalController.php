<?php

namespace App\Http\Controllers;

use App\Models\Sucursal;
use App\Models\Estado;
use App\Models\Municipio;
use App\Models\Localidad;
use Illuminate\Http\Request;
use App\Http\Requests\Sucursales\CreateSucursalRequest;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;  

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
    public function show(Sucursal $sucursal)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Sucursal  $sucursal
     * @return \Illuminate\Http\Response
     */
    public function edit(Sucursal $sucursal)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Sucursal  $sucursal
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Sucursal $sucursal)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Sucursal  $sucursal
     * @return \Illuminate\Http\Response
     */
    public function destroy(Sucursal $sucursal)
    {
        //
    }
}
