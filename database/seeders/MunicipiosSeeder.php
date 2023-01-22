<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MunicipiosSeeder extends Seeder
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
            'estado_id' => '1',
            'clave'     => '11',
            'nombre'    => 'San Mateo Atenco',
            'activo'    => '1'
        ]
        ];
        DB::table('municipios')->insert($data);
    }
}
