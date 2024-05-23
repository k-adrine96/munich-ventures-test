<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
// use Illuminate\Support\Str;
use Faker\Factory as Faker;
use App\Models\Category;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();

        // Get all category IDs
        $categoryIds = Category::all()->pluck('id')->toArray();

        for ($i = 1; $i <= 20; $i++) {
            DB::table('products')->insert([
                'title' => $faker->word,
                'sku' => $faker->unique()->regexify('[A-Za-z0-9]{8}'),
                'description' => $faker->sentence,
                'price' => $faker->randomFloat(2, 1, 100),
                'category_id' => $faker->randomElement($categoryIds),
                'created_at'  => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at'  => Carbon::now()->format('Y-m-d H:i:s'),
            ]);
        }
    }
}
