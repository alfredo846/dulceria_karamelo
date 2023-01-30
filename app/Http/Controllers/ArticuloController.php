<?php

namespace App\Http\Controllers;

use App\Models\Articulo;
use App\Models\Categoria;
use App\Models\Marca;
use App\Models\Temporada;
use App\Models\Empaque;
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

     public function papelera()
    {
        $articulos       = Articulo::onlyTrashed()->where ('sucursal_id', '=', Auth::user()->sucursal_id)->get();

        $productos       = Producto::orderBy('producto_id','DESC')->where('deleted_at', '=', NULL)->get();
        $productosd      = Producto::onlyTrashed()->get();

        $sucursales      = Sucursal::orderBy('sucursal_id','DESC')->where('deleted_at', '=', NULL)->get();
        $sucursalesd     = Sucursal::onlyTrashed()->get();

        $usuariologeado  = User::find(Auth::id());

        return view("articulos.papelera", compact('articulos','productos','productosd','usuariologeado','sucursales','sucursalesd'));
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
        $productos       = Producto::orderBy('producto_id','DESC')->where('deleted_at', '=', NULL)->get();

        return view('articulos.create',compact('usuariologeado','sucursales','sucursalesd','productos'));
    }

    public function datos1(Request $request){
        $productos       = Producto::all();
        $categorias      = Categoria::all();
        $marcas          = Marca::all();
        $temporadas      = Temporada::all();
        $empaques        = Empaque::all();
        $id              = $request->get('id');
        $usuariologeado  = User::find(Auth::id());

        return view("articulos/datos01")
        ->with(['productos'       => $productos])
        ->with(['categorias'      => $categorias])
        ->with(['marcas'          => $marcas])
        ->with(['temporadas'      => $temporadas])
        ->with(['empaques'        => $empaques])
        ->with(['usuariologeado'  => $usuariologeado])
        ->with(['id'              => $id]);
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
        $articulo->delete();

        return redirect()->route('articulos.index')->with('eliminar','ok');
    }

    public function activar($articulo_id)
    {
        $articuloss = Articulo::withTrashed()->where('articulo_id', $articulo_id)->restore();

        return redirect()->route('articulos.papelera')->with('activar','ok');
    }

    public function borrar($articulo_id)
    {
        $articulo = Articulo::withTrashed()->where('articulo_id', $articulo_id)->find($articulo_id);

        // $buscaarticulos   = Articulo::where('articulo_id',$articulo_id)->get(); 
        // $buscaarticulosd  = Articulo::withTrashed()->where('articulo_id', $articulo_id)->get();

        // $cuantos  = count($buscaarticulos); 
        // $cuantosd = count($buscaarticulosd);


        // if($cuantos>=1) {
        //    return redirect()->route('articulos.papelera')->with('error', 'El registro no se puede eliminar ya que tiene registros en Articulos');
        // }

        // if($cuantosd>=1) {
        //    return redirect()->route('articulos.papelera')->with('error', 'El registro no se puede eliminar ya que tiene registros en Articulos');
        // }

        $articulos = Articulo::withTrashed()->where('articulo_id', $articulo_id)->forcedelete();

        return redirect()->route('articulos.papelera')->with('borrar','ok');
    }
}
