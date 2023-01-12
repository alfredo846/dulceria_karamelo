<?php

namespace App\Exports;

use App\Models\Temporada;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromView;
use Illuminate\Contracts\View\View;

// class TemporadasExport implements FromCollection
// {
    /**
    * @return \Illuminate\Support\Collection
    */
//     public function collection()
//     {
//         return Temporada::all();
//     }
// }

class TemporadasExport implements FromView
{
    public function view(): View
    {
        return view('temporadas.export-excel', [
            'temporadas' => Temporada::all()
        ]);
    }
}
