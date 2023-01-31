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
use App\Http\Requests\Articulos\CreateArticuloRequest;
use Auth;
use Illuminate\Support\Facades\DB; 

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
        $productos      = Producto::orderBy('producto_id','DESC')->where('deleted_at', '=', NULL)->get();
        $articulos      = Articulo::orderBy('articulo_id','DESC')->where('deleted_at', '=', NULL)
        ->where ('sucursal_id', '=', Auth::user()->sucursal_id)->get();
        $sucursal_id    = Auth::user()->sucursal_id;

        $productosinexistentes = DB::select("SELECT * FROM productos t1
                                WHERE NOT EXISTS (SELECT NULL
                                FROM articulos t2
                                WHERE t2.producto_id = t1.producto_id && t2.sucursal_id = '$sucursal_id')");
        // dd($productosinexistentes);
        
        return view('articulos.create',compact('usuariologeado','sucursales','sucursalesd','productos','articulos','productosinexistentes'));
    }

    public function datos1(Request $request){
        $productos       = Producto::all();
        $categorias      = Categoria::all();
        $categoriasd     = Categoria::onlyTrashed()->get();
        $marcas          = Marca::all();
        $marcasd         = Marca::onlyTrashed()->get();
        $temporadas      = Temporada::all();
        $temporadasd     = Temporada::onlyTrashed()->get();
        $empaques        = Empaque::all();
        $empaquesd       = Empaque::onlyTrashed()->get();
        $id              = $request->get('id');
        $usuariologeado  = User::find(Auth::id());

        return view("articulos/datos01")
        ->with(['productos'       => $productos])
        ->with(['categorias'      => $categorias])
        ->with(['categoriasd'     => $categoriasd])
        ->with(['marcas'          => $marcas])
        ->with(['marcasd'         => $marcasd])
        ->with(['temporadas'      => $temporadas])
        ->with(['temporadasd'     => $temporadasd])
        ->with(['empaques'        => $empaques])
        ->with(['empaquesd'       => $empaquesd])
        ->with(['usuariologeado'  => $usuariologeado])
        ->with(['id'              => $id]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateArticuloRequest $request)
    {
        // dd($request);
         Articulo::create($request->all());

         return redirect()->route('articulos.index')
        ->with('message', 'Producto creado exitosamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Articulo  $articulo
     * @return \Illuminate\Http\Response
     */
    public function show(Articulo $articulo)
    {
        $usuariologeado = User::find(Auth::id());
        $sucursales     = Sucursal::all();
        $sucursalesd    = Sucursal::onlyTrashed()->get();
        $categorias     = Categoria::all();
        $categoriasd    = Categoria::onlyTrashed()->get();
        $marcas         = Marca::all();
        $marcasd        = Marca::onlyTrashed()->get();
        $temporadas     = Temporada::all();
        $temporadasd    = Temporada::onlyTrashed()->get();
        $empaques       = Empaque::all();
        $empaquesd      = Empaque::onlyTrashed()->get();
        $productos      = Producto::orderBy('producto_id','DESC')->where('deleted_at', '=', NULL)->get();
        $productosd     = Producto::onlyTrashed()->get();
        $articulos      = Articulo::orderBy('articulo_id','DESC')->where('deleted_at', '=', NULL)->get();
        $articulosd     = Articulo::onlyTrashed()->get();
        
        return view('articulos.show',compact('articulo','usuariologeado','sucursales','sucursalesd','categorias','categoriasd',
        'marcas','marcasd','temporadas','temporadasd','empaques','empaquesd','productos','productosd','articulos','articulosd'));

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
