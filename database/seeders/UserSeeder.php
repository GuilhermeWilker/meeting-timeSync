<?php

namespace Database\Seeders;

use Faker\Factory;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Factory::create('pt_BR');
        for ($i = 0; $i <= 5; ++$i) {
            DB::table('users')->insert([
                'name' => $faker->firstName(),
                'lastname' => $faker->lastName(),
                'email' => $faker->email(),
                'password' => bcrypt('123'),
                ]);
        }
    }
}
