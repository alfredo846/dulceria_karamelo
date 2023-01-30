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
            'producto_id'                 => '1',
            'sucursal_id'                 => '1',
            'precio_compra_empaque'       => '10.00',
            'precio_venta_empaque'        => '12.50',
            'precio_compra_unidad'        => '1.00',
            'precio_venta_unidad'         => '1.50',
            'stock_minimo'                => '5',
            'stock_maximo'                => '15',
            'inventario_inicial_empaque'  => '0',
            'inventario_inicial_unidad'   => '1',
            'created_at'                  => '2023-01-02 18:19:52',
            'updated_at'                  => '2023-01-02 18:19:52'
        ],
        [
            'producto_id'                 => '2',
            'sucursal_id'                 => '1',
            'precio_compra_empaque'       => '50.00',
            'precio_venta_empaque'        => '65.50',
            'precio_compra_unidad'        => '2.00',
            'precio_venta_unidad'         => '3.50',
            'stock_minimo'                => '5',
            'stock_maximo'                => '15',
            'inventario_inicial_empaque'  => '5',
            'inventario_inicial_unidad'   => '2',
            'created_at'                  => '2023-01-02 18:19:52',
            'updated_at'                  => '2023-01-02 18:19:52'
        ],
        [
            'producto_id'                 => '3',
            'sucursal_id'                 => '1',
            'precio_compra_empaque'       => '60.00',
            'precio_venta_empaque'        => '78.50',
            'precio_compra_unidad'        => '60.00',
            'precio_venta_unidad'         => '78.50',
            'stock_minimo'                => '5',
            'stock_maximo'                => '15',
            'inventario_inicial_empaque'  => '8',
            'inventario_inicial_unidad'   => '1',
            'created_at'                  => '2023-01-02 18:19:52',
            'updated_at'                  => '2023-01-02 18:19:52'
        ],
        
          [
            'producto_id'                 => '1',
            'sucursal_id'                 => '2',
            'precio_compra_empaque'       => '10.00',
            'precio_venta_empaque'        => '13.50',
            'precio_compra_unidad'        => '1.00',
            'precio_venta_unidad'         => '2.00',
            'stock_minimo'                => '5',
            'stock_maximo'                => '15',
            'inventario_inicial_empaque'  => '0',
            'inventario_inicial_unidad'   => '4',
            'created_at'                  => '2023-01-02 18:19:52',
            'updated_at'                  => '2023-01-02 18:19:52'
        ],
        [
            'producto_id'                 => '2',
            'sucursal_id'                 => '2',
            'precio_compra_empaque'       => '100.00',
            'precio_venta_empaque'        => '125.50',
            'precio_compra_unidad'        => '4.00',
            'precio_venta_unidad'         => '6.50',
            'stock_minimo'                => '5',
            'stock_maximo'                => '15',
            'inventario_inicial_empaque'  => '5',
            'inventario_inicial_unidad'   => '4',
            'created_at'                  => '2023-01-02 18:19:52',
            'updated_at'                  => '2023-01-02 18:19:52'
        ],
          [
            'producto_id'                 => '3',
            'sucursal_id'                 => '2',
            'precio_compra_empaque'       => '60.00',
            'precio_venta_empaque'        => '77.50',
            'precio_compra_unidad'        => '60.00',
            'precio_venta_unidad'         => '77.50',
            'stock_minimo'                => '5',
            'stock_maximo'                => '15',
            'inventario_inicial_empaque'  => '8',
            'inventario_inicial_unidad'   => '1',
            'created_at'                  => '2023-01-02 18:19:52',
            'updated_at'                  => '2023-01-02 18:19:52'
        ]
        ];
        DB::table('articulos')->insert($data);
    }
}
