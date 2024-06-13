<?php

namespace Database\Seeders;

use App\Models\Practice;
use Faker\Factory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UpdatePracticesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $faker = Factory::create();
        $practices = Practice::all();

        foreach($practices as $practice) {
            $randomDate = $faker->dateTimeBetween('-1 year', 'now')->format('Y-m-d H:i:s');
            
            $practice->update(['created_at'=>$randomDate]);
        }
    }
}
