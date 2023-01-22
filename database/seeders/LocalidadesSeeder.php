<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LocalidadesSeeder extends Seeder
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
            'municipio_id' => '1',
            'nombre'    => 'Santa María la Asunción'
        ]
        ];
        DB::table('localidads')->insert($data);
    }
}
