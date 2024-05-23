<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Faker\Factory as Faker;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();

        for ($i = 1; $i <= 10; $i++) {
            DB::table('categories')->insert([
                'title'       => $faker->word(),
                'description' => $faker->sentence(),
                'created_at'  => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at'  => Carbon::now()->format('Y-m-d H:i:s'),
            ]);
        }
    }
}
