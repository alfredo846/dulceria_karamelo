<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ArticulosSeeder extends Seeder
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
            'producto_id'          => '1',
            'sucursal_id'          => '1',
            'precio_compra'        => '10.00',
            'precio_venta'         => '12.50',
            'stock_minimo'         => '5',
            'stock_maximo'         => '15',
            'stock_empaque'        => '0',
            'stock_unidad'         => '4',
            'created_at'           => '2023-01-02 18:19:52',
            'updated_at'           => '2023-01-02 18:19:52'
        ],
        [
            'producto_id'          => '2',
            'sucursal_id'          => '1',
            'precio_compra'        => '20.00',
            'precio_venta'         => '23.99',
            'stock_minimo'         => '5',
            'stock_maximo'         => '15',
            'stock_empaque'        => '5',
            'stock_unidad'         => '0',
            'created_at'           => '2023-01-02 18:19:52',
            'updated_at'           => '2023-01-02 18:19:52'
        ],
        [
            'producto_id'          => '3',
            'sucursal_id'          => '1',
            'precio_compra'        => '14.00',
            'precio_venta'         => '16.99',
            'stock_minimo'         => '5',
            'stock_maximo'         => '15',
            'stock_empaque'        => '14',
            'stock_unidad'         => '1',
            'created_at'           => '2023-01-02 18:19:52',
            'updated_at'           => '2023-01-02 18:19:52'
        ],
        [
            'producto_id'          => '4',
            'sucursal_id'          => '1',
            'precio_compra'        => '4.00',
            'precio_venta'         => '6.99',
            'stock_minimo'         => '5',
            'stock_maximo'         => '15',
            'stock_empaque'        => '15',
            'stock_unidad'         => '1',
            'created_at'           => '2023-01-02 18:19:52',
            'updated_at'           => '2023-01-02 18:19:52'
        ],
        [
            'producto_id'          => '1',
            'sucursal_id'          => '2',
            'precio_compra'        => '11.00',
            'precio_venta'         => '13.50',
            'stock_minimo'         => '5',
            'stock_maximo'         => '15',
            'stock_empaque'        => '12',
            'stock_unidad'         => '11',
            'created_at'           => '2023-01-02 18:19:52',
            'updated_at'           => '2023-01-02 18:19:52'
        ],
         [
            'producto_id'          => '2',
            'sucursal_id'          => '2',
            'precio_compra'        => '40.00',
            'precio_venta'         => '63.99',
            'stock_minimo'         => '5',
            'stock_maximo'         => '15',
            'stock_empaque'        => '14',
            'stock_unidad'         => '2',
            'created_at'           => '2023-01-02 18:19:52',
            'updated_at'           => '2023-01-02 18:19:52'
        ]
        ];
        DB::table('articulos')->insert($data);
    }
}
