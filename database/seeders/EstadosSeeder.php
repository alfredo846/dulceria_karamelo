<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EstadosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         $data = [
        [
            'clave'     => '11',
            'nombre'    => 'México',
            'abrev'     => 'MEX',
            'activo'    => '1'
        ]
        ];
        DB::table('estados')->insert($data);
    }
}
