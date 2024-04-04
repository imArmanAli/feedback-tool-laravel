<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class CommentSeeder extends Seeder
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

        // Get feedback IDs
        $feedbackIds = DB::table('feedbacks')->pluck('id')->toArray();

        foreach ($feedbackIds as $feedbackId) {
            DB::table('comments')->insert([
                'user_id' => $faker->randomElement($userIds),
                'feedback_id' => $feedbackId,
                'content' => $faker->paragraph,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
