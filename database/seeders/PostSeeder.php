<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = \App\Models\User::all();

        for($i = 0; $i <= 100; $i++){
            $user = $users->random();

            \App\Models\Post::factory()->create([
                'user_id' => $user->id
            ]);
        }
    }
}
