<?php

namespace Database\Seeders;

use App\Models\Task;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $users = User::factory(10)->create();

        User::factory()->create([
            'name' => 'hendra',
            'email' => 'hendra@example.com',
            'password' => 'hendra7534'
        ]);

        Task::factory(50)->create([
            'user_id' => fn() => $users->random()->id,
        ]);
    }
}
