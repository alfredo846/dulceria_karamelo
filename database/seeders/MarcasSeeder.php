<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MarcasSeeder extends Seeder
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
            'nombre' => 'Caenels',
            'imagen' => 'shadow.jpg',
            'created_at' => '2023-01-02 18:19:52',
            'updated_at' => '2023-01-02 18:19:52'
        ],
        [
            'nombre' => 'La corona',
            'imagen' => 'shadow.jpg',
            'created_at' => '2023-01-02 18:19:52',
            'updated_at' => '2023-01-02 18:19:52'
        ],
        [
            'nombre' => 'Coronado',
            'imagen' => 'shadow.jpg',
            'created_at' => '2023-01-02 18:19:52',
            'updated_at' => '2023-01-02 18:19:52'
        ],
        [
            'nombre' => 'Barcel',
            'imagen' => 'shadow.jpg',
            'created_at' => '2023-01-02 18:19:52',
            'updated_at' => '2023-01-02 18:19:52'
        ],
        [
            'nombre' => 'Gamesa',
            'imagen' => 'shadow.jpg',
            'created_at' => '2023-01-02 18:19:52',
            'updated_at' => '2023-01-02 18:19:52'
        ],
        [
            'nombre' => 'Alvbro',
            'imagen' => 'shadow.jpg',
            'created_at' => '2023-01-02 18:19:52',
            'updated_at' => '2023-01-02 18:19:52'
        ],  
        [
            'nombre' => 'Cerezo',
            'imagen' => 'shadow.jpg',
            'created_at' => '2023-01-02 18:19:52',
            'updated_at' => '2023-01-02 18:19:52'
        ],
        [
            'nombre' => 'Marinela',
            'imagen' => 'shadow.jpg',
            'created_at' => '2023-01-02 18:19:52',
            'updated_at' => '2023-01-02 18:19:52'
        ],
        [
            'nombre' => 'Mars',
            'imagen' => 'shadow.jpg',
            'created_at' => '2023-01-02 18:19:52',
            'updated_at' => '2023-01-02 18:19:52'
        ],
        [
            'nombre' => 'JulyMoy',
            'imagen' => 'shadow.jpg',
            'created_at' => '2023-01-02 18:19:52',
            'updated_at' => '2023-01-02 18:19:52'
        ],
        [
            'nombre' => 'Karla',
            'imagen' => 'shadow.jpg',
            'created_at' => '2023-01-02 18:19:52',
            'updated_at' => '2023-01-02 18:19:52'
        ],
        [
            'nombre' => 'Lucass',
            'imagen' => 'shadow.jpg',
            'created_at' => '2023-01-02 18:19:52',
            'updated_at' => '2023-01-02 18:19:52'
        ],
        [
            'nombre' => 'Nestle',
            'imagen' => 'shadow.jpg',
            'created_at' => '2023-01-02 18:19:52',
            'updated_at' => '2023-01-02 18:19:52'
        ],
        [
            'nombre' => 'Totis',
            'imagen' => 'shadow.jpg',
            'created_at' => '2023-01-02 18:19:52',
            'updated_at' => '2023-01-02 18:19:52'
        ],
         [
            'nombre' => 'Ricolino',
            'imagen' => 'shadow.jpg',
            'created_at' => '2023-01-02 18:19:52',
            'updated_at' => '2023-01-02 18:19:52'
        ]
        ];
        DB::table('marcas')->insert($data);
    }
}
