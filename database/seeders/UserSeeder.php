<?php

namespace Database\Seeders;

use App\Enums\Roles;
use App\Models\User;
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
                $user->assignRole(Roles::ADMIN->value);
            })
            ->createOne([
                'name' => 'Admin',
                'email' => 'admin@example.com',
            ]);

        User::factory()
            ->afterCreating(function (User $user) {
                $user->assignRole(Roles::MANAGER->value);
            })
            ->createOne([
                'name' => 'Gestor Teste',
                'email' => 'gestor@example.com',
            ]);

        User::factory()
            ->afterCreating(function (User $user) {
                $user->assignRole(Roles::TUTOR->value);
            })
            ->createOne([
                'name' => 'Tutor Teste',
                'email' => 'tutor@example.com',
            ]);

        User::factory()
            ->afterCreating(function (User $user) {
                $user->assignRole(Roles::TEACHER->value);
            })
            ->createOne([
                'name' => 'Professor Teste',
                'email' => 'professor@example.com',
            ]);
    }
}
