<?php

namespace Database\Factories;

use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str; 

class CategoryFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Category::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {   
        $name = $this->faker->unique->word(20); //Genera un nombre unico, lo guarda en la variable name para luego ser ocupado para la creacion del name y el slug (IMPORTANTE!! INCLUIR EL DIRECTORIO arriba PARA PODER OCUPAR Str)
        
        return [
            'name' => $name,
            'slug' => Str::slug($name)
        ];
    }
}
