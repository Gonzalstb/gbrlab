<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Task;
use Faker\Factory as Faker;

class TaskSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();
        $statusOptions = ['to do', 'in progress', 'doing', 'testing', 'done'];
        $users = User::all();

        foreach ($users as $user) {
            for ($i = 0; $i < 2; $i++) {
                $assignedTo = $users->random();
                Task::create([
                    'title' => $faker->sentence(4),
                    'description' => $faker->paragraph(),
                    'due_date' => $faker->dateTimeBetween('now', '+1 month')->format('Y-m-d'),
                    'status' => $faker->randomElement($statusOptions),
                    'user_id' => $user->id,
                    'assigned_to' => $assignedTo->id,
                ]);
            }
        }
    }
}
