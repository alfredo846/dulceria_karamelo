<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use App\Models\Categoria;
use App\Models\Marca;
use App\Models\Temporada;
use App\Models\Empaque;
use Illuminate\Http\Request;
use App\Http\Requests\Productos\CreateProductoRequest;
use App\Http\Requests\Productos\EditProductoRequest;
use App\Exports\ProductosExport;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Storage;

class ProductoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $productos = Producto::orderBy('producto_id','DESC')->where('deleted_at', '=', NULL)->get();
        // dd($productos);
        return view('productos.index')
        ->with(['productos' => $productos]);
    }

     public function papelera()
    {
        $productos = Producto::onlyTrashed()->get();
        return view('productos.papelera')
        ->with(['productos' => $productos]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categorias = Categoria::all();
        $marcas = Marca::all();
        $temporadas = Temporada::all();
        $empaques = Empaque::all();
        return view('productos.create',compact('categorias','marcas','temporadas','empaques'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateProductoRequest $request)
    {
        $imagen2 = "shadow.jpg";
        $newProducto = Producto::create($request->all());

        if ($request->hasFile('imagen')) {
          $newProducto->imagen = Storage::disk('producto-imagenes')->putFile('', $request->file('imagen'));
        }else{    
          $newProducto->imagen = ($imagen2);
        }
        $newProducto->save();

        //  Producto::create($request->all());

         return redirect()->route('productos.index')
        ->with('message', 'Producto creado exitosamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Producto  $producto
     * @return \Illuminate\Http\Response
     */
    public function show(Producto $producto)
    {
         return view('productos.show',compact('producto'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Producto  $producto
     * @return \Illuminate\Http\Response
     */
    public function edit(Producto $producto)
    {
         return view('productos.edit',compact('producto'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Producto  $producto
     * @return \Illuminate\Http\Response
     */
    public function update(EditProductoRequest $request, Producto $producto)
    {
        //  $producto->update($request->all());
         $producto->update($request->except(['producto_id', 'imagen']));

         if ($request->hasFile('imagen')) {
            if (Storage::disk('producto-imagenes')->exists("$producto->imagen")) {
                if($producto->imagen == "shadow.jpg"){
                     $producto->imagen = "shadow.jpg";
                } else {
                 Storage::disk('producto-imagenes')->delete("$producto->imagen");
                }
            }
            $producto->imagen = Storage::disk('producto-imagenes')->putFile('', $request->file('imagen'));
        }

        $producto->save();

        return redirect()->route('productos.index')->with('message', 'Producto actualizada exitosamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Producto  $producto
     * @return \Illuminate\Http\Response
     */
    public function destroy(Producto $producto)
    {
         $producto->delete();

        return redirect()->route('productos.index')->with('eliminar','ok');
    }

    public function activar($producto_id)
    {
        $productos = Producto::withTrashed()->where('producto_id', $producto_id)->restore();

        return redirect()->route('productos.papelera')->with('activar','ok');
    }

    public function borrar($producto_id)
    {
        $producto = Producto::withTrashed()->where('producto_id', $producto_id)->find($producto_id);

        if (Storage::disk('producto-imagenes')->exists("$producto->imagen")) {
            if($producto->imagen == "shadow.jpg"){
                    
                } else {
                    Storage::disk('producto-imagenes')->delete("$producto->imagen");
                }
        }
        
        $productos = Producto::withTrashed()->where('producto_id', $producto_id)->forcedelete();

        return redirect()->route('productos.papelera')->with('borrar','ok');
    }

    public function export()
    {
       return Excel::download(new ProductosExport, 'productos.xlsx');
    }
}
