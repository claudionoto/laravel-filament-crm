<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Account>
 */
class AccountFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->firstName,
            'surname' => $this->faker->lastName,
            'username' => $this->faker->userName,
            'password' => Hash::make('password'),
            'email' => $this->faker->email,
            'level' => 'agente',
            'agent_code' => strtoupper($this->faker->bothify('A###')),
            'commercial_profile' => $this->faker->text,
            'area' => $this->faker->city,
            'team_leader' => $this->faker->randomElement(['SI', 'NO']),
            'assigned_operators' => $this->faker->text,
            'assigned_agents' => $this->faker->text,
            'extractor' => $this->faker->randomElement(['SI', 'NO']),
            'enabled' => $this->faker->randomElement(['SI', 'NO']),
            'remember_token' => $this->faker->md5,
            'last_login_date' => $this->faker->dateTime,
            'last_logout_date' => $this->faker->dateTime,
            'login_ip_address' => $this->faker->ipv4,
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
