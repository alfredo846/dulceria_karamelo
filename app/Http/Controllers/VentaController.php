<?php

namespace App\Http\Controllers;

use App\Models\Venta;
use App\Models\Articulo;
use App\Models\Producto;
use App\Models\Sucursal;
use App\Models\User;
use Illuminate\Http\Request;
use Auth;
use Illuminate\Support\Facades\DB; 

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

        $usuarios        =User::all();

        return view('ventas.index',compact('usuarios','ventas','productos','productosd','sucursales','sucursalesd',
        'usuariologeado'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $usuariologeado = User::find(Auth::id());
        $sucursales     = Sucursal::all();
        $sucursalesd    = Sucursal::onlyTrashed()->get();
        $productos      = Producto::orderBy('producto_id','DESC')->where('deleted_at', '=', NULL)->get();
        $articulos      = Articulo::orderBy('articulo_id','DESC')->where('deleted_at', '=', NULL)
                         ->where ('sucursal_id', '=', Auth::user()->sucursal_id)->get();
        $sucursal_id    = Auth::user()->sucursal_id;

        $productosinexistentes = DB::select("SELECT * FROM productos t1
                                WHERE NOT EXISTS (SELECT NULL
                                FROM articulos t2
                                WHERE t2.producto_id = t1.producto_id && t2.sucursal_id = '$sucursal_id')");
        // dd($productosinexistentes);
        
        return view('ventas.create',compact('usuariologeado','sucursales','sucursalesd','productos','articulos','productosinexistentes'));
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
