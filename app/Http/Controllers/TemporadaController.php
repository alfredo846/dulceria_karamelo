<?php

namespace App\Http\Controllers;

use App\Models\Temporada;
use App\Models\Producto;
use Illuminate\Http\Request;
use App\Http\Requests\Temporadas\CreateTemporadaRequest;
use App\Http\Requests\Temporadas\EditTemporadaRequest;
use App\Exports\TemporadasExport;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Storage;

class TemporadaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $temporadas = Temporada::orderBy('temporada_id','DESC')->where('deleted_at', '=', NULL)->get();
        // dd($temporadas);
        return view('temporadas.index')
        ->with(['temporadas' => $temporadas]);
    }

      public function papelera()
    {
        $temporadas = Temporada::onlyTrashed()->get();
        return view('temporadas.papelera')
        ->with(['temporadas' => $temporadas]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('temporadas.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateTemporadaRequest $request)
    {
        $imagen2 = "shadow.jpg";
        $newTemporada = Temporada::create($request->all());

        if ($request->hasFile('imagen')) {
          $newTemporada->imagen = Storage::disk('temporada-imagenes')->putFile('', $request->file('imagen'));
        }else{    
          $newTemporada->imagen = ($imagen2);
        }
        $newTemporada->save();

        //  Temporada::create($request->all());

         return redirect()->route('temporadas.index')
        ->with('message', 'Temporada creada exitosamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Temporada  $temporada
     * @return \Illuminate\Http\Response
     */
    public function show(Temporada $temporada)
    {
        return view('temporadas.show',compact('temporada'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Temporada  $temporada
     * @return \Illuminate\Http\Response
     */
    public function edit(Temporada $temporada)
    {
         return view('temporadas.edit',compact('temporada'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Temporada  $temporada
     * @return \Illuminate\Http\Response
     */
    public function update(EditTemporadaRequest $request, Temporada $temporada)
    {
        //  $temporada->update($request->all());
         $temporada->update($request->except(['temporada_id', 'imagen']));

         if ($request->hasFile('imagen')) {
            if (Storage::disk('temporada-imagenes')->exists("$temporada->imagen")) {
                if($temporada->imagen == "shadow.jpg"){
                     $temporada->imagen = "shadow.jpg";
                } else {
                 Storage::disk('temporada-imagenes')->delete("$temporada->imagen");
                }
            }
            $temporada->imagen = Storage::disk('temporada-imagenes')->putFile('', $request->file('imagen'));
        }
         $temporada->save();

        return redirect()->route('temporadas.index')->with('message', 'Temporada actualizada exitosamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Temporada  $temporada
     * @return \Illuminate\Http\Response
     */
    public function destroy(Temporada $temporada)
    {
        $temporada->delete();

        return redirect()->route('temporadas.index')->with('eliminar','ok');
    }
    
      public function activar($temporada_id)
    {
        $temporadas = Temporada::withTrashed()->where('temporada_id', $temporada_id)->restore();

        return redirect()->route('temporadas.papelera')->with('activar','ok');
    }

    public function borrar($temporada_id)
    {
        $temporada = Temporada::withTrashed()->where('temporada_id', $temporada_id)->find($temporada_id);

        $buscaproductos = Producto::where('temporada_id',$temporada_id)->get(); 
        $cuantos = count($buscaproductos); 
        if($cuantos==0) 
        { 
            if (Storage::disk('temporada-imagenes')->exists("$temporada->imagen")) {
                if($temporada->imagen == "shadow.jpg"){
                        
                    } else {
                        Storage::disk('temporada-imagenes')->delete("$temporada->imagen");
                    }
            }
            
            $temporadas = Temporada::withTrashed()->where('temporada_id', $temporada_id)->forcedelete();

            return redirect()->route('temporadas.papelera')->with('borrar','ok');
        }else{
             return redirect()->route('temporadas.papelera')->with('error', 'El registro no se puede eliminar ya que tiene registros en Productos');
        }
    }

    public function export()
    {
       return Excel::download(new TemporadasExport, 'temporadas.xlsx');
    }
}
