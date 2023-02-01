<?php

namespace App\Http\Controllers;

use App\Models\Venta;
use App\Models\Producto;
use App\Models\Sucursal;
use App\Models\User;
use Illuminate\Http\Request;
use Auth;

class VentaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ventas          = Venta::orderBy('venta_id','DESC')->where('deleted_at', '=', NULL)
                         ->where ('sucursal_id', '=', Auth::user()->sucursal_id)->get();
        
        $productos       = Producto::orderBy('producto_id','DESC')->where('deleted_at', '=', NULL)->get();
        $productosd      = Producto::onlyTrashed()->get();

        $sucursales      = Sucursal::orderBy('sucursal_id','DESC')->where('deleted_at', '=', NULL)->get();
        $sucursalesd     = Sucursal::onlyTrashed()->get();

        $usuariologeado  = User::find(Auth::id());
        return view('ventas.index',compact('ventas','productos','productosd','sucursales','sucursalesd',
        'usuariologeado'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
     * @param  \App\Models\Venta  $venta
     * @return \Illuminate\Http\Response
     */
    public function show(Venta $venta)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Venta  $venta
     * @return \Illuminate\Http\Response
     */
    public function edit(Venta $venta)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Venta  $venta
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Venta $venta)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Venta  $venta
     * @return \Illuminate\Http\Response
     */
    public function destroy(Venta $venta)
    {
        //
    }
}
