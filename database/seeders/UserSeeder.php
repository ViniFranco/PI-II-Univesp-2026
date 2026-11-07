<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::factory()
            ->afterCreating(function (User $user) {
                $user->assignRole('admin');
            })
            ->createOne([
                'name' => 'Admin',
                'email' => 'admin@example.com',
            ]);

        User::factory()
            ->afterCreating(function (User $user) {
                $user->assignRole('manager');
            })
            ->createOne([
                'name' => 'Gestor Teste',
                'email' => 'gestor@example.com',
            ]);

        User::factory()
            ->afterCreating(function (User $user) {
                $user->assignRole('tutor');
            })
            ->createOne([
                'name' => 'Tutor Teste',
                'email' => 'tutor@example.com',
            ]);

        User::factory()
            ->afterCreating(function (User $user) {
                $user->assignRole('teacher');
            })
            ->createOne([
                'name' => 'Professor Teste',
                'email' => 'professor@example.com',
            ]);
    }
}
