<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Rol;
use App\Models\Sucursal;
use Illuminate\Http\Request;
use App\Http\Requests\Usuarios\CreateUsuarioRequest;
use Illuminate\Support\Facades\Storage;

class UsuarioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $usuarios    = User::orderBy('id','DESC')->where('deleted_at', '=', NULL)->get();
        $roles       = Rol::all();
        $sucursales  = Sucursal::all();
        $sucursalesd = Sucursal::onlyTrashed()->get();
       
        return view('usuarios.index')
        ->with(['usuarios'        => $usuarios])
        ->with(['roles'           => $roles])
        ->with(['sucursales'      => $sucursales])    
        ->with(['sucursalesd'     => $sucursalesd]);  
    }

     public function papelera()
    {
        $usuarios    = User::onlyTrashed()->get();
        $roles       = Rol::all();
        $sucursales  = Sucursal::all();
        $sucursalesd = Sucursal::onlyTrashed()->get();

        return view('usuarios.papelera')
        ->with(['usuarios'        => $usuarios])
        ->with(['roles'           => $roles])
        ->with(['sucursales'      => $sucursales])    
        ->with(['sucursalesd'     => $sucursalesd]); 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles       = Rol::all();
        $sucursales  = Sucursal::all();
        $sucursalesd = Sucursal::onlyTrashed()->get();

        return view('usuarios.create',compact('roles','sucursales','sucursalesd'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateUsuarioRequest $request)
    {
        if (($request->rol_id == '2') || ($request->rol_id == '3')) {
             $this->validate($request, [
            'sucursal_id' => 'required',
        ]);
        }

        $foto2 = "shadow.jpg";
        $newUsuario = User::create($request->all());

        if ($request->hasFile('foto')) {
          $newUsuario->foto = Storage::disk('usuario-imagenes')->putFile('', $request->file('foto'));
        }else{    
          $newUsuario->foto = ($foto2);
        }

        $newUsuario->password = bcrypt($request->password);
            
        $newUsuario->save();

         return redirect()->route('usuarios.index')
        ->with('message', 'Usuario creado exitosamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $usuario)
    {
        $usuario->delete();

        return redirect()->route('usuarios.index')->with('eliminar','ok');
    }

    public function activar($id)
    {
        $usuarios = User::withTrashed()->where('id', $id)->restore();

        return redirect()->route('usuarios.papelera')->with('activar','ok');
    }

    public function borrar($id)
    {
        $usuario = User::withTrashed()->where('id', $id)->find($id);

        if (Storage::disk('usuario-imagenes')->exists("$usuario->foto")) {
            if($usuario->foto == "shadow.jpg"){
                    
                } else {
                    Storage::disk('usuario-imagenes')->delete("$usuario->foto");
                }
        }
        
        $usuarios = User::withTrashed()->where('id', $id)->forcedelete();

        return redirect()->route('usuarios.papelera')->with('borrar','ok');
    }
}
