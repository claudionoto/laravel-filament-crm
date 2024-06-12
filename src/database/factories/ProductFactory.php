<?php

namespace Database\Factories;

use App\Models\Brand;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            //
            'name' =>$this->faker->words(3,true),
            'notes'=>$this->faker->text(),
            'id_brand'=>$this->getRandomBrandId(),
            'active' => $this->faker->boolean()
        ];
    }

    private function getRandomBrandId(): int 
    {
        $brand = Brand::inRandomOrder()->first();
        return $brand->id;
    }
}
