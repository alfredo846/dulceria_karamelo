<?php

namespace App\Http\Controllers;

use App\Models\Articulo;
use App\Models\User;
use App\Models\Sucursal;
use App\Models\Producto;
use Illuminate\Http\Request;
use Auth;

class ArticuloController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $articulos       = Articulo::orderBy('articulo_id','DESC')->where('deleted_at', '=', NULL)
                         ->where ('sucursal_id', '=', Auth::user()->sucursal_id)->get();

        $productos       = Producto::orderBy('producto_id','DESC')->where('deleted_at', '=', NULL)->get();
        $productosd      = Producto::onlyTrashed()->get();

        $sucursales      = Sucursal::orderBy('sucursal_id','DESC')->where('deleted_at', '=', NULL)->get();
        $sucursalesd     = Sucursal::onlyTrashed()->get();

        $usuariologeado  = User::find(Auth::id());

        return view("articulos.index", compact('articulos','productos','productosd','usuariologeado','sucursales','sucursalesd'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('articulos.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Articulo  $articulo
     * @return \Illuminate\Http\Response
     */
    public function show(Articulo $articulo)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Articulo  $articulo
     * @return \Illuminate\Http\Response
     */
    public function edit(Articulo $articulo)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Articulo  $articulo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Articulo $articulo)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Articulo  $articulo
     * @return \Illuminate\Http\Response
     */
    public function destroy(Articulo $articulo)
    {
        //
    }
}
