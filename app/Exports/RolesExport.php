<?php

namespace App\Exports;

use App\Models\Rol;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromView;
use Illuminate\Contracts\View\View;

// class RolesExport implements FromCollection
// {
    /**
    * @return \Illuminate\Support\Collection
    */
    // public function collection()
    // {
        // return Rol::all();
    // }
// }

class RolesExport implements FromView
{
    public function view(): View
    {
        return view('roles.export-excel', [
            'roles' => Rol::all()
        ]);
    }
}
