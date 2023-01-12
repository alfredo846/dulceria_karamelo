<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TemporadasSeeder extends Seeder
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
            'nombre' => 'Baby shower',
            'imagen' => 'shadow.jpg',
            'created_at' => '2023-01-02 18:19:52',
            'updated_at' => '2023-01-02 18:19:52'
        ],
        [
            'nombre' => 'Día del amor y la amistad',
            'imagen' => 'shadow.jpg',
            'created_at' => '2023-01-02 18:19:52',
            'updated_at' => '2023-01-02 18:19:52'
        ],
        [
            'nombre' => 'Día de las madres',
            'imagen' => 'shadow.jpg',
            'created_at' => '2023-01-02 18:19:52',
            'updated_at' => '2023-01-02 18:19:52'
        ],
        [
            'nombre' => 'Día del padre',
            'imagen' => 'shadow.jpg',
            'created_at' => '2023-01-02 18:19:52',
            'updated_at' => '2023-01-02 18:19:52'
        ],
        [
            'nombre' => 'Fiestas patrias',
            'imagen' => 'shadow.jpg',
            'created_at' => '2023-01-02 18:19:52',
            'updated_at' => '2023-01-02 18:19:52'
        ],
        [
            'nombre' => 'Halloween',
            'imagen' => 'shadow.jpg',
            'created_at' => '2023-01-02 18:19:52',
            'updated_at' => '2023-01-02 18:19:52'
        ],  
        [
            'nombre' => 'Navidad',
            'imagen' => 'shadow.jpg',
            'created_at' => '2023-01-02 18:19:52',
            'updated_at' => '2023-01-02 18:19:52'
        ],
        [
            'nombre' => 'Día de muertos',
            'imagen' => 'shadow.jpg',
            'created_at' => '2023-01-02 18:19:52',
            'updated_at' => '2023-01-02 18:19:52'
        ],
        [
            'nombre' => 'Primavera',
            'imagen' => 'shadow.jpg',
            'created_at' => '2023-01-02 18:19:52',
            'updated_at' => '2023-01-02 18:19:52'
        ],
        [
            'nombre' => 'Verano',
            'imagen' => 'shadow.jpg',
            'created_at' => '2023-01-02 18:19:52',
            'updated_at' => '2023-01-02 18:19:52'
        ]
        ];
        DB::table('temporadas')->insert($data);
    }
}
