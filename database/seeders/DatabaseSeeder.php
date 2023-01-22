<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        $this->call(EstadosSeeder::class);
        $this->call(MunicipiosSeeder::class);
        $this->call(LocalidadesSeeder::class);
        $this->call(SucursalesSeeder::class);
        $this->call(CategoriasSeeder::class);
        $this->call(MarcasSeeder::class);
        $this->call(TemporadasSeeder::class);
        $this->call(EmpaquesSeeder::class);
        $this->call(ProductosSeeder::class);
        $this->call(RolesSeeder::class);
    }
}
