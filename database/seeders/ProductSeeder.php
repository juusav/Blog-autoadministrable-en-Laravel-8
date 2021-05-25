<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Product;
use App\Models\Image;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        $products = Product::factory(200)->create(); //Por cada producto que se genere se descarga una imagen y la informacion de esa imagen se almacena en la tabla images

        foreach ($products as $product) {
            Image::factory(1)->create([
                'imageable_id' => $product->id,
                'imageable_type' => Product::class
            ]);
        }
    }
}
