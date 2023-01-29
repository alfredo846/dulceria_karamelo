<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UsuariosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    $superadmin=User::create([
        'nombre'             => 'Alfredo',
        'apellido_paterno'   => 'Heraz',
        'apellido_materno'   => 'Pérez',
        'genero'             => 'masculino',
        'telefono'           => '7293856818',
        'username'           => 'Alfredo Heraz Pérez',
        'email'              => 'superadmin@gmail.com',
        'password'           =>  Hash::make('superadmin'),
        'foto'               => 'shadow.jpg',
        'rol_id'             => '1',
    ]);

    $administrador=User::create([
        'nombre'             => 'Jesús',
        'apellido_paterno'   => 'Heraz',
        'apellido_materno'   => 'Pérez',
        'genero'             => 'masculino',
        'telefono'           => '7291234567',
        'username'           => 'Jesús Heraz Pérez',
        'email'              => 'admin@gmail.com',
        'password'           =>  Hash::make('admin'),
        'foto'               => 'shadow.jpg',
        'rol_id'             => '2',
        'sucursal_id'        => '1',
    ]);

    $avendedor=User::create([
        'nombre'             => 'Sara Andrea',
        'apellido_paterno'   => 'Heraz',
        'apellido_materno'   => 'Pérez',
        'genero'             => 'femenino',
        'telefono'           => '7295511223',
        'username'           => 'Sara Andrea Heraz Pérez',
        'email'              => 'vendedor@gmail.com',
        'password'           =>  Hash::make('vendedor'),
        'foto'               => 'shadow.jpg',
        'rol_id'             => '3',
        'sucursal_id'        => '1',
    ]);
    }
}
