<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class FeedbackSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();

        // Get user IDs
        $userIds = DB::table('users')->pluck('id')->toArray();

        // Define categories
        $categories = ['bug report', 'feature request', 'improvement', 'suggestion'];

        for ($i = 0; $i < 3; $i++) {
            DB::table('feedbacks')->insert([
                'user_id' => $faker->randomElement($userIds),
                'title' => $faker->sentence,
                'description' => $faker->paragraph,
                'category' => $faker->randomElement($categories),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
