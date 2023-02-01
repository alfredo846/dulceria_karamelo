<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class VentasSeeder extends Seeder
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
            'fecha_venta'        => '2023-01-02 18:19:52',
            'user_id'            => '2',
            'sucursal_id'        => '1',
            'subtotal'           => '200.00',
            'total'              => '220.00',
            'created_at'         => '2023-01-02 18:19:52',
            'updated_at'         => '2023-01-02 18:19:52'
        ],
       
        [
            'fecha_venta'        => '2023-01-03 18:19:52',
            'user_id'            => '2',
            'sucursal_id'        => '1',
            'subtotal'           => '400.00',
            'total'              => '240.00',
            'created_at'         => '2023-01-02 18:19:52',
            'updated_at'         => '2023-01-02 18:19:52'
        ],

        [
            'fecha_venta'        => '2023-01-04 18:19:52',
            'user_id'            => '3',
            'sucursal_id'        => '2',
            'subtotal'           => '800.00',
            'total'              => '880.00',
            'created_at'         => '2023-01-02 18:19:52',
            'updated_at'         => '2023-01-02 18:19:52'
        ],
        ];
        DB::table('ventas')->insert($data);
    }
}
