<?php

namespace App\Http\Controllers;

use App\Models\Marca;
use App\Models\Producto;
use Illuminate\Http\Request;
use App\Http\Requests\Marcas\CreateMarcaRequest;
use App\Http\Requests\Marcas\EditMarcaRequest;
use App\Exports\MarcasExport;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Storage;

class MarcaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $marcas = Marca::orderBy('marca_id','DESC')->where('deleted_at', '=', NULL)->get();
        // dd($marcas);
        return view('marcas.index')
        ->with(['marcas' => $marcas]);
    }

    public function papelera()
    {
        $marcas = Marca::onlyTrashed()->get();
        return view('marcas.papelera')
        ->with(['marcas' => $marcas]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('marcas.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateMarcaRequest $request)
    {
        $imagen2 = "shadow.jpg";
        $newMarca = Marca::create($request->all());

        if ($request->hasFile('imagen')) {
          $newMarca->imagen = Storage::disk('marca-imagenes')->putFile('', $request->file('imagen'));
        }else{    
          $newMarca->imagen = ($imagen2);
        }
        $newMarca->save();

        //  Marca::create($request->all());

         return redirect()->route('marcas.index')
        ->with('message', 'Marca creada exitosamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Marca  $marca
     * @return \Illuminate\Http\Response
     */
    public function show(Marca $marca)
    {
         return view('marcas.show',compact('marca'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Marca  $marca
     * @return \Illuminate\Http\Response
     */
    public function edit(Marca $marca)
    {
         return view('marcas.edit',compact('marca'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Marca  $marca
     * @return \Illuminate\Http\Response
     */
    public function update(EditMarcaRequest $request, Marca $marca)
    {
       //  $marca->update($request->all());
         $marca->update($request->except(['marca_id', 'imagen']));

         if ($request->hasFile('imagen')) {
            if (Storage::disk('marca-imagenes')->exists("$marca->imagen")) {
                if($marca->imagen == "shadow.jpg"){
                     $marca->imagen = "shadow.jpg";
                } else {
                 Storage::disk('marca-imagenes')->delete("$marca->imagen");
                }
            }
            $marca->imagen = Storage::disk('marca-imagenes')->putFile('', $request->file('imagen'));
        }

        $marca->save();

        return redirect()->route('marcas.index')->with('message', 'Marca actualizada exitosamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Marca  $marca
     * @return \Illuminate\Http\Response
     */
    public function destroy(Marca $marca)
    {
         $marca->delete();

        return redirect()->route('marcas.index')->with('eliminar','ok');
    }

    public function activar($marca_id)
    {
        $marcas = Marca::withTrashed()->where('marca_id', $marca_id)->restore();

        return redirect()->route('marcas.papelera')->with('activar','ok');
    }

    public function borrar($marca_id)
    {
        $marca = Marca::withTrashed()->where('marca_id', $marca_id)->find($marca_id);
        
        $buscaproductos  = Producto::where('marca_id',$marca_id)->get(); 
        $buscaproductosd = Producto::withTrashed()->where('marca_id', $marca_id)->get();

        $cuantos  = count($buscaproductos); 
        $cuantosd = count($buscaproductosd); 

        if($cuantosd>=1) {
           return redirect()->route('marcas.papelera')->with('error', 'El registro no se puede eliminar ya que tiene registros en Productos');
        }

        if($cuantos==0) 
        { 
            if (Storage::disk('marca-imagenes')->exists("$marca->imagen")) {
                if($marca->imagen == "shadow.jpg"){
                        
                    } else {
                        Storage::disk('marca-imagenes')->delete("$marca->imagen");
                    }
            }
            $marcas = Marca::withTrashed()->where('marca_id', $marca_id)->forcedelete();

            return redirect()->route('marcas.papelera')->with('borrar','ok');
        }
        
        else{
             return redirect()->route('marcas.papelera')->with('error', 'El registro no se puede eliminar ya que tiene registros en Productos');
        }
    }

    public function export()
    {
       return Excel::download(new MarcasExport, 'marcas.xlsx');
    }
}
