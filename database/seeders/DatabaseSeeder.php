<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;

use Illuminate\Support\Facades\Storage; //Utilicé este facade para crear una carpeta ('Products' para las imagenes)

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        Storage::deleteDirectory('products');//Primero la elimina para no tener muchas carpetas con muchas imagenes
        Storage::makeDirectory('products'); //crea una carpeta en Storage

        $this->call(RoleSeeder::class);
        $this->call(UserSeeder::class);

        Category::factory(5)->create();
        $this->call(ProductSeeder::class);
    }
}
