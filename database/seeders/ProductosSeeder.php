<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductosSeeder extends Seeder
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
            'codigo_barras'        => '221910301',
            'nombre'               => 'Totis Donitas',
            'Descripcion'          => 'Botana de trigo sabor a sal y limon',
            'imagen'               => 'shadow.jpg',
            'categoria_id'         => '1',
            'marca_id'             => '2',
            'temporada_id'         => '3',
            'empaque_id'           => '1',
            'piezas_por_empaque'   => '10',
            'created_at'           => '2023-01-02 18:19:52',
            'updated_at'           => '2023-01-02 18:19:52'
        ],
        [
            'codigo_barras'        => '3552731',
            'nombre'               => 'Kipi bofitos',
            'Descripcion'          => 'Botana de enchilada de arroz inflado',
            'imagen'               => 'shadow.jpg',
            'categoria_id'         => '1',
            'marca_id'             => '3',
            'temporada_id'         => '4',
            'empaque_id'           => '2',
            'piezas_por_empaque'   => '25',
            'created_at'           => '2023-01-02 18:19:52',
            'updated_at'           => '2023-01-02 18:19:52'
        ],
        [
            'codigo_barras'        => '854765218',
            'nombre'               => 'Sol cacahuate garapiñado',
            'Descripcion'          => 'Ccahuate garapiñado',
            'imagen'               => 'shadow.jpg',
            'categoria_id'         => '2',
            'marca_id'             => '4',
            'temporada_id'         => '5',
            'empaque_id'           => '2',
            'piezas_por_empaque'   => '1',
            'created_at' => '2023-01-02 18:19:52',
            'updated_at' => '2023-01-02 18:19:52'
        ],
        [
            'codigo_barras'        => '155487412',
            'nombre'               => 'Mazapan de la Rosa',
            'Descripcion'          => 'Dulce de cacahuate estilo mazapan',
            'imagen'               => 'shadow.jpg',
            'categoria_id'         => '3',
            'marca_id'             => '1',
            'temporada_id'         => '1',
            'empaque_id'           => '1',
            'piezas_por_empaque'   => '10',
            'created_at' => '2023-01-02 18:19:52',
            'updated_at' => '2023-01-02 18:19:52'
        ],
        [
            'codigo_barras'        => '221910309',
            'nombre'               => 'Carlos V',
            'Descripcion'          => 'Chocolate carlos V',
            'imagen'               => 'shadow.jpg',
            'categoria_id'         => '1',
            'marca_id'             => '1',
            'temporada_id'         => '1',
            'empaque_id'           => '1',
            'piezas_por_empaque'   => '16',
            'created_at' => '2023-01-02 18:19:52',
            'updated_at' => '2023-01-02 18:19:52'
        ]
        ];
        DB::table('productos')->insert($data);
    }
}
