<?php

namespace App\Http\Controllers;

use App\Models\Rol;
use Illuminate\Http\Request;
use App\Http\Requests\Roles\CreateRolRequest;
use App\Http\Requests\Roles\EditRolRequest;
use App\Exports\RolesExport;
use Maatwebsite\Excel\Facades\Excel;

class RolController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         $roles = Rol::orderBy('rol_id','DESC')->where('deleted_at', '=', NULL)->get();
        // dd($roles);
        return view('roles.index')
        ->with(['roles' => $roles]);
    }

      public function papelera()
    {
        $roles   = Rol::onlyTrashed()->get();

        return view('roles.papelera')
        ->with(['roles'     => $roles]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('roles.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateRolRequest $request)
    {
         Rol::create($request->all());

         return redirect()->route('roles.index')
        ->with('message', 'Rol creado exitosamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Rol  $rol
     * @return \Illuminate\Http\Response
     */
    public function show(Rol $role)
    {
          return view('roles.show',compact('role'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Rol  $rol
     * @return \Illuminate\Http\Response
     */
    public function edit(Rol $role)
    {
         return view('roles.edit', compact('role'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Rol  $rol
     * @return \Illuminate\Http\Response
     */
    public function update(EditRolRequest $request, Rol $role)
    {
            $role->update($request->all());

           return redirect()->route('roles.index')->with('message', 'Rol actualizado exitosamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Rol  $rol
     * @return \Illuminate\Http\Response
     */
    public function destroy(Rol $role)
    {
         $role->delete();

        return redirect()->route('roles.index')->with('eliminar','ok');
    }

     public function activar($rol_id)
    {
        $roles = Rol::withTrashed()->where('rol_id', $rol_id)->restore();

        return redirect()->route('roles.papelera')->with('activar','ok');
    }

     public function borrar($rol_id)
    {
        $roles = Rol::withTrashed()->where('rol_id', $rol_id)->forcedelete();

        return redirect()->route('roles.papelera')->with('borrar','ok');
    }

    public function export()
    {
       return Excel::download(new RolesExport, 'roles.xlsx');
    }
}
