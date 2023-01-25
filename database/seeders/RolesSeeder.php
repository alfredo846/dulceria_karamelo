<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RolesSeeder extends Seeder
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
            'nombre' => 'Superadmin',
            'created_at' => '2023-01-02 18:19:52',
            'updated_at' => '2023-01-02 18:19:52'
        ],
        [
            'nombre' => 'Administrador',
            'created_at' => '2023-01-02 18:19:52',
            'updated_at' => '2023-01-02 18:19:52'
        ],
        [
            'nombre' => 'Vendedor',
            'created_at' => '2023-01-02 18:19:52',
            'updated_at' => '2023-01-02 18:19:52'
        ]
        ];
        DB::table('rols')->insert($data);
    }
}
