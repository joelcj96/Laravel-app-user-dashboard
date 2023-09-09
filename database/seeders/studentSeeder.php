<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Faker\Factory as Faker;

class StudentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
    //    $faker = Faker::create();

    //    DB::table('students')->insert([
    //        'name' => $faker->name(),
    //        'email' => $faker->safeEmail(),
    //        'phone_no' => $faker->phoneNumber(),
    //        'age' => $faker->numberBetween(18, 30), 
    //        'gender' => $faker->randomElement(['male', 'female']),
    //    ]);
    }
}
