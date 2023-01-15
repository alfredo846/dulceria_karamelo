<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use App\Models\Producto;
use Illuminate\Http\Request;
use App\Http\Requests\Categorias\CreateCategoriaRequest;
use App\Http\Requests\Categorias\EditCategoriaRequest;
use App\Exports\CategoriasExport;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Storage;

class CategoriaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categorias = Categoria::orderBy('categoria_id','DESC')->where('deleted_at', '=', NULL)->get();
        // dd($categorias);
        return view('categorias.index')
        ->with(['categorias' => $categorias]);
    }

    public function papelera()
    {
        $categorias = Categoria::onlyTrashed()->get();
        return view('categorias.papelera')
        ->with(['categorias' => $categorias]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('categorias.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateCategoriaRequest $request)
    {
        $imagen2 = "shadow.jpg";
        $newCategoria = Categoria::create($request->all());

        if ($request->hasFile('imagen')) {
          $newCategoria->imagen = Storage::disk('categoria-imagenes')->putFile('', $request->file('imagen'));
        }else{    
          $newCategoria->imagen = ($imagen2);
        }
        $newCategoria->save();

        //  Categoria::create($request->all());

         return redirect()->route('categorias.index')
        ->with('message', 'Categoría creada exitosamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Categoria  $categoria
     * @return \Illuminate\Http\Response
     */
    public function show(Categoria $categoria)
    {
         return view('categorias.show',compact('categoria'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Categoria  $categoria
     * @return \Illuminate\Http\Response
     */
    public function edit(Categoria $categoria)
    {

       return view('categorias.edit',compact('categoria'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Categoria  $categoria
     * @return \Illuminate\Http\Response
     */
    public function update(EditCategoriaRequest $request, Categoria $categoria)
    {
        //  $categoria->update($request->all());
         $categoria->update($request->except(['categoria_id', 'imagen']));

         if ($request->hasFile('imagen')) {
            if (Storage::disk('categoria-imagenes')->exists("$categoria->imagen")) {
                if($categoria->imagen == "shadow.jpg"){
                     $categoria->imagen = "shadow.jpg";
                } else {
                 Storage::disk('categoria-imagenes')->delete("$categoria->imagen");
                }
            }
            $categoria->imagen = Storage::disk('categoria-imagenes')->putFile('', $request->file('imagen'));
        }

        $categoria->save();

        return redirect()->route('categorias.index')->with('message', 'Categoría actualizada exitosamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Categoria  $categoria
     * @return \Illuminate\Http\Response
     */
    public function destroy(Categoria $categoria)
    {
        $categoria->delete();

        return redirect()->route('categorias.index')->with('eliminar','ok');
    }

    public function activar($categoria_id)
    {
        $categorias = Categoria::withTrashed()->where('categoria_id', $categoria_id)->restore();

        return redirect()->route('categorias.papelera')->with('activar','ok');
    }

    public function borrar($categoria_id)
    {
        $categoria = Categoria::withTrashed()->where('categoria_id', $categoria_id)->find($categoria_id);

        $buscaproductos   = Producto::where('categoria_id',$categoria_id)->get(); 
        $buscaproductosd  = Producto::withTrashed()->where('categoria_id', $categoria_id)->get();

        $cuantos = count($buscaproductos); 
        $cuantosd = count($buscaproductosd);

        if($cuantosd>=1) {
           return redirect()->route('categorias.papelera')->with('error', 'El registro no se puede eliminar ya que tiene registros en Productos');
        }

        if($cuantos==0) 
        { 
            if (Storage::disk('categoria-imagenes')->exists("$categoria->imagen")) {
                if($categoria->imagen == "shadow.jpg"){
                        
                    } else {
                        Storage::disk('categoria-imagenes')->delete("$categoria->imagen");
                    }
            }
            
            $categorias = Categoria::withTrashed()->where('categoria_id', $categoria_id)->forcedelete();

             return redirect()->route('categorias.papelera')->with('borrar','ok');
        }else{
             return redirect()->route('categorias.papelera')->with('error', 'El registro no se puede eliminar ya que tiene registros en Productos');
        }
    }

    public function export()
    {
       return Excel::download(new CategoriasExport, 'categorias.xlsx');
    }

}
