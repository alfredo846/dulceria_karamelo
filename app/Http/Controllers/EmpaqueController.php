<?php

namespace App\Http\Controllers;

use App\Models\Empaque;
use Illuminate\Http\Request;
use App\Http\Requests\Empaques\CreateEmpaqueRequest;
use App\Http\Requests\Empaques\EditEmpaqueRequest;
use App\Exports\EmpaquesExport;
use Maatwebsite\Excel\Facades\Excel;

class EmpaqueController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $empaques = Empaque::orderBy('empaque_id','DESC')->where('deleted_at', '=', NULL)->get();
        // dd($empaques);
        return view('empaques.index')
        ->with(['empaques' => $empaques]);
    }

    public function papelera()
    {
        $empaques = Empaque::onlyTrashed()->get();
        return view('empaques.papelera')
        ->with(['empaques' => $empaques]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('empaques.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateEmpaqueRequest $request)
    {
         Empaque::create($request->all());

         return redirect()->route('empaques.index')
        ->with('message', 'Empaque creada exitosamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Empaque  $empaque
     * @return \Illuminate\Http\Response
     */
    public function show(Empaque $empaque)
    {
         return view('empaques.show', compact('empaque'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Empaque  $empaque
     * @return \Illuminate\Http\Response
     */
    public function edit(Empaque $empaque)
    {
        return view('empaques.edit', compact('empaque'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Empaque  $empaque
     * @return \Illuminate\Http\Response
     */
    public function update(EditEmpaqueRequest $request, Empaque $empaque)
    {
         $empaque->update($request->all());

        return redirect()->route('empaques.index')->with('message', 'Empaque actualizado exitosamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Empaque  $empaque
     * @return \Illuminate\Http\Response
     */
    public function destroy(Empaque $empaque)
    {
        $empaque->delete();

        return redirect()->route('empaques.index')->with('eliminar','ok');
    }

    public function activar($empaque_id)
    {
        $empaques = Empaque::withTrashed()->where('empaque_id', $empaque_id)->restore();

        return redirect()->route('empaques.papelera')->with('activar','ok');
    }

    public function borrar($empaque_id)
    {
        $empaques = Empaque::withTrashed()->where('empaque_id', $empaque_id)->forcedelete();

        return redirect()->route('empaques.papelera')->with('borrar','ok');
    }

    public function export()
    {
       return Excel::download(new EmpaquesExport, 'empaques.xlsx');
    }
}
