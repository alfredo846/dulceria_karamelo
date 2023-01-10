<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use Illuminate\Http\Request;
use App\Http\Requests\Categorias\CreateCategoriaRequest;
use App\Http\Requests\Categorias\EditCategoriaRequest;


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
         Categoria::create($request->all());

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
         $categoria->update($request->all());
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
        $categorias = Categoria::withTrashed()->where('categoria_id', $categoria_id)->forcedelete();

        return redirect()->route('categorias.papelera')->with('borrar','ok');
    }

}
