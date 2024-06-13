<?php

namespace Database\Factories;

use App\Models\Account;
use App\Models\Customer;
use App\Models\Practice;
use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Practice>
 */
class PracticeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'id_account' => $this->getRandomAccount(),
            'status' => $this->getRandomStatus(),
            'customer_id' => $this->getRandomCustomer(),
            'product_id' => $this->getRandomProduct(),
            'notes' => $this->faker->text(100)
        ];
    }

    private function getRandomAccount(): int {
        $account=Account::where('level','agente')->inRandomOrder()->first();
        return $account->id;
    }

    private function getRandomStatus(): string {
        $statuses = Practice::getPracticeStatuses();
        return array_rand($statuses,1);
    }

    private function getRandomCustomer(): int {
        $customer=Customer::inRandomOrder()->first();
        return $customer->id;
    }

    private function getRandomProduct(): int {
        $product=Product::inRandomOrder()->first();
        return $product->id;
    }
}
