<?php

namespace App\Exports;

use App\Models\Empaque;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromView;
use Illuminate\Contracts\View\View;

// class EmpaquesExport implements FromCollection
// {
    /**
    * @return \Illuminate\Support\Collection
    */
//     public function collection()
//     {
//         return Empaque::all();
//     }
// }

class EmpaquesExport implements FromView
{
    public function view(): View
    {
        return view('empaques.export-excel', [
            'empaques' => Empaque::all()
        ]);
    }
}
