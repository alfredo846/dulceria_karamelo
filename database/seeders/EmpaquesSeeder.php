<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EmpaquesSeeder extends Seeder
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
            'nombre' => 'Caja',
            'created_at' => '2023-01-02 18:19:52',
            'updated_at' => '2023-01-02 18:19:52'
        ],
        [
            'nombre' => 'Bolsa',
            'created_at' => '2023-01-02 18:19:52',
            'updated_at' => '2023-01-02 18:19:52'
        ],
        [
            'nombre' => 'Paquete',
            'created_at' => '2023-01-02 18:19:52',
            'updated_at' => '2023-01-02 18:19:52'
        ]
        ];
        DB::table('empaques')->insert($data);
    }
}
