<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Category;
use Illuminate\Support\Str; 
class CategoryFactory extends Factory
{
    protected $model = Category::class;

    public function definition()
    {   
        $name = $this->faker->unique->word(20); //Genera un nombre unico, lo guarda en la variable name para luego ser ocupado para la creacion del name y el slug (IMPORTANTE!! INCLUIR EL DIRECTORIO arriba PARA PODER OCUPAR Str)
        
        return [
            'name' => $name,
            'slug' => Str::slug($name),
        ];
    }
}
