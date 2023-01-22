<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SucursalesSeeder extends Seeder
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
            'numero_sucursal'     => '1',
            'imagen'              => 'shadow.jpg',
            'nombre'              => 'Sucursal 1',
            'estado_id'           => '1',
            'municipio_id'        => '1',
            'localidad_id'        => '1',
            'telefono'            => '7293856818',
            'email'               => 'sucursal1@gmail.com',
            'created_at'          => '2023-01-02 18:19:52',
            'updated_at'          => '2023-01-02 18:19:52'
        ],
        [
            'numero_sucursal'     => '2',
            'imagen'              => 'shadow.jpg',
            'nombre'              => 'Sucursal 2',
            'estado_id'           => '1',
            'municipio_id'        => '1',
            'localidad_id'        => '1',
            'telefono'            => '7221234567',
            'email'               => 'sucursal2@gmail.com',
            'created_at'          => '2023-01-02 18:19:52',
            'updated_at'          => '2023-01-02 18:19:52'
        ]
        ];
        DB::table('sucursals')->insert($data);
    }
}
