<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Faker\Provider\it_IT\Person as PersonIt;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Customer>
 */
class CustomerFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $this->faker->locale('it_IT');
        return [
            'email' => $this->faker->email,
            'address' => $this->faker->address,
            'phone' => $this->faker->phoneNumber,
            'fiscal_name' => $this->faker->company,
            'fiscal_code' => $this->faker->ean8,
            'vat' => $this->generateVATNumber(),
            'city' => $this->faker->city,
            'mobile' => $this->faker->phoneNumber,
            'insert_date' => $this->faker->date,
            'zip' => $this->faker->postcode,
            'state' => $this->faker->state,
            'region' => $this->faker->country,
            'confirmed' => $this->faker->boolean,
            'confirmed_at' => $this->faker->dateTime,
            'confirmed_by' => $this->faker->name,
            'name' => $this->faker->firstName,
            'surname' => $this->faker->lastName,
            'codice_ateco' => $this->faker->word,
            'pec' => $this->faker->safeEmail,
            'codice_univoco' => $this->faker->word,
            'type' => $this->faker->word,
            'deleted_by' => $this->faker->name,
            'insert_by' => $this->faker->name,
            'created_at' => $this->faker->dateTime,
            'updated_at' => $this->faker->dateTime,
        ];
    }

    /**
     * Generate a random VAT number.
     *
     * @return string
     */
    protected function generateVATNumber()
    {
        // This is just a placeholder, you might need to implement a proper VAT number generator
        return 'IT' . $this->faker->randomNumber(9, true);
    }
}
