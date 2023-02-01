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
        'nombre'             => 'Vianey',
        'apellido_paterno'   => 'Reyes',
        'apellido_materno'   => 'Reyes',
        'genero'             => 'femenino',
        'telefono'           => '7291234567',
        'username'           => 'Vianey Reyes Reyes',
        'email'              => 'admin@gmail.com',
        'password'           =>  Hash::make('admin'),
        'foto'               => 'shadow.jpg',
        'rol_id'             => '2',
        'sucursal_id'        => '1',
    ]);

    $administrador=User::create([
        'nombre'             => 'Lucía',
        'apellido_paterno'   => 'Salazar',
        'apellido_materno'   => 'Flores',
        'genero'             => 'femenino',
        'telefono'           => '7296548745',
        'username'           => 'Lucía Salazar Flores',
        'email'              => 'admin2@gmail.com',
        'password'           =>  Hash::make('admin2'),
        'foto'               => 'shadow.jpg',
        'rol_id'             => '2',
        'sucursal_id'        => '2',
    ]);

    $vendedor=User::create([
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
