<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Role;
use Illuminate\Support\Facades\Hash;
use Faker\Factory as Faker;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();
        $adminRole = Role::where('name', 'admin')->first();
        $memberRole = Role::where('name', 'member')->first();

        // Usuario admin
        User::create([
            'name' => 'Administrador',
            'email' => 'admin@test.com',
            'password' => Hash::make('Test1111'),
            'role_id' => $adminRole->id,
        ]);

        // 6 usuarios miembros
        for ($i = 1; $i <= 6; $i++) {
            User::create([
                'name' => $faker->name(),
                'email' => $faker->unique()->safeEmail(),
                'password' => Hash::make('password'),
                'role_id' => $memberRole->id,
            ]);
        }
    }
}
