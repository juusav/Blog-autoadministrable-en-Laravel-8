<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Product;
use App\Models\User;
use App\Models\Category;


class ProductFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Product::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $name = $this->faker->unique()->sentence();

        return [
            'name' => $name,
            'price' => $this->faker->randomFloat($nbMaxDecimals = NULL, $min = 0, $max = 100.00),
            'slug' => Str::slug($name),
            'extract' => $this->faker->text(60),
            'body' => $this->faker->text(200),
            'status' => $this->faker->randomElement([1, 2]),
            'category_id' => Category::all()->random()->id,
            'user_id' => User::all()->random()->id
        ];
    }
}
