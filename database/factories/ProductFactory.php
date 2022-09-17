<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
        'name'=>$this->faker->word(),
        'description'=>$this->faker->text(),
        'short_description'=>$this->faker->text(),
        'brand_id'=>$this->faker->numberBetween(6,8),
        'slug'=>$this->faker->slug(),
        'price'=>$this->faker->numberBetween(50,500),
        'manage_stock'=>$this->faker->boolean(),
        'in_stock'=>$this->faker->boolean(),
        'is_active'=>$this->faker->boolean(),
        ];
    }
}
