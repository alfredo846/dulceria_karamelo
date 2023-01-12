<?php

namespace App\Exports;

use App\Models\Marca;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromView;
use Illuminate\Contracts\View\View;

// class MarcasExport implements FromCollection
// {
    /**
    * @return \Illuminate\Support\Collection
    */
//     public function collection()
//     {
//         return Marca::all();
//     }
// }

class MarcasExport implements FromView
{
    public function view(): View
    {
        return view('marcas.export-excel', [
            'marcas' => Marca::all()
        ]);
    }
}
