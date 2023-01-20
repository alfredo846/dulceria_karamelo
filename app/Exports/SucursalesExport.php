<?php

namespace App\Exports;

use App\Models\Sucursal;
use App\Models\Estado;
use App\Models\Municipio;
use App\Models\Localidad;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromView;
use Illuminate\Contracts\View\View;

// class SucursalesExport implements FromCollection
// {
    /**
    * @return \Illuminate\Support\Collection
    */
    // public function collection()
    // {
        // return Sucursal::all();
    // }

// }

class SucursalesExport implements FromView
{
    public function view(): View
    {
        return view('sucursales.export-excel', [
            'sucursales'     => Sucursal::all(),
            'estados'        => Estado::all(),
            'municipios'     => Municipio::all(),
            'localidades'    => Localidad::all()
        ]);
    }
}
