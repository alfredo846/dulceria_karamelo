<?php

namespace App\Exports;

use App\Models\Producto;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromView;
use Illuminate\Contracts\View\View;

// class ProductosExport implements FromCollection
// {
    /**
    * @return \Illuminate\Support\Collection
    */
//     public function collection()
//     {
//         return Producto::all();
//     }
// }

class ProductosExport implements FromView
{
    public function view(): View
    {
        return view('productos.export-excel', [
            'productos' => Producto::all()
        ]);
    }
}
