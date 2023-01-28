<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Rol;
use App\Models\Sucursal;
use Illuminate\Http\Request;
use App\Http\Requests\Usuarios\CreateUsuarioRequest;
use App\Http\Requests\Usuarios\EditUsuarioRequest;
use Illuminate\Support\Facades\Storage;
use Auth;

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
    public function show(User $usuario)
    {
        $usuarios    = User::orderBy('id','DESC')->where('deleted_at', '=', NULL)->get();
        $roles       = Rol::all();
        $sucursales  = Sucursal::all();
        $sucursalesd = Sucursal::onlyTrashed()->get();
       
        return view('usuarios.show')
        ->with(['usuario'        => $usuario])
        ->with(['usuarios'        => $usuarios])
        ->with(['roles'           => $roles])
        ->with(['sucursales'      => $sucursales])    
        ->with(['sucursalesd'     => $sucursalesd]); 
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(User $usuario)
    {
        $usuarios    = User::orderBy('id','DESC')->where('deleted_at', '=', NULL)->get();
        $roles       = Rol::all();
        $sucursales  = Sucursal::all();
        $sucursalesd = Sucursal::onlyTrashed()->get();
       
        return view('usuarios.edit')
        ->with(['usuario'         => $usuario])
        ->with(['usuarios'        => $usuarios])
        ->with(['roles'           => $roles])
        ->with(['sucursales'      => $sucursales])    
        ->with(['sucursalesd'     => $sucursalesd]); 
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(EditUsuarioRequest $request, User $usuario)
    {

        if (($request->rol_id == '2') || ($request->rol_id == '3')) {
             $this->validate($request, [
            'sucursal_id' => 'required',
        ]);
        }

        if(Auth::user()->id == $usuario->id){
         $usuario->update($request->except(['id', 'foto', 'password', 'rol_id', 'sucursal_id']));
        }else{
         $usuario->update($request->except(['id', 'foto', 'password']));
        }

         if ($request->hasFile('foto')) {
            if (Storage::disk('usuario-imagenes')->exists("$usuario->foto")) {
                if($usuario->foto == "shadow.jpg"){
                     $usuario->foto = "shadow.jpg";
                } else {
                 Storage::disk('usuario-imagenes')->delete("$usuario->foto");
                }
            }
            $usuario->foto = Storage::disk('usuario-imagenes')->putFile('', $request->file('foto'));
        }

        if($request->password){
            $usuario->password = bcrypt($request->password);
        }


        if(Auth::user()->id == $usuario->id){
            $usuario->save();
            return redirect()->route('usuarios.index')->with('message', '¡Usuario actualizado exitosamente!
            Si desea cambiar el "Rol" del usuario, cierre sesión e inicie sesión con otra cuenta superadmin');
        }else{
            $usuario->save();
            return redirect()->route('usuarios.index')->with('message', 'Usuario actualizado exitosamente');
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $usuario)
    {
        if(Auth::user()->id == $usuario->id){
          return redirect()->route('usuarios.index')->with('error', '¡El registro no se puede eliminar ya que usted se encuentra logeado con está cuenta!');
        }else{
        $usuario->delete();

        return redirect()->route('usuarios.index')->with('eliminar','ok');
        }
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
