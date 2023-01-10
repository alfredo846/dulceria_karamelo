<?php

namespace App\Exports;

use App\Models\Categoria;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromView;
use Illuminate\Contracts\View\View;

// class CategoriasExport implements FromCollection
// {
    /**
    * @return \Illuminate\Support\Collection
    */
//     public function collection()
//     {
//         return Categoria::all();
//     }
// }

class CategoriasExport implements FromView
{
    public function view(): View
    {
        return view('categorias.export-excel', [
            'categorias' => Categoria::all()
        ]);
    }
}