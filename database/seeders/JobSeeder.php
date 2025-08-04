<?php

namespace Database\Seeders;


use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class JobSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();

        // Insert dummy data
        foreach (range(1, 50) as $index) {
            DB::table('jobs')->insert([

                'title' => $faker->jobTitle,
                'description' => $faker->text(200), // You can adjust the text length
                'location' => $faker->city,
                
                'salary' => $faker->randomFloat(2, 30000, 120000), // Salary between 30,000 and 120,000
                 'type' => $faker->randomElement(['full-time', 'part-time', 'remote']),
                 'company_name' => $faker->company,
                  'created_by' => strtolower($faker->userName) . rand(100, 999), 
              
            ]);
        }
    }
}
