<?php

namespace Database\Seeders;

use App\Enums\Roles;
use App\Models\Communication;
use App\Models\Enrollment;
use App\Models\Guardian;
use App\Models\PedagogicalRecord;
use App\Models\SchoolClass;
use App\Models\Student;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            ShieldSeeder::class,
            UserSeeder::class,
        ]);

        $admin = User::role(Roles::ADMIN->value)->firstOrFail();

        SchoolClass::factory()
            ->count(8)
            ->has(
                Enrollment::factory()
                    ->count(10)
                    ->state(fn() => [
                        'student_id' => Student::factory()
                            ->for(Guardian::factory())
                            ->has(Communication::factory()->state(['user_id' => $admin->id]))
                            ->create()
                            ->getKey(),
                    ])
                    ->has(PedagogicalRecord::factory()->state(['user_id' => $admin->id])),
            )
            ->create();
    }
}
