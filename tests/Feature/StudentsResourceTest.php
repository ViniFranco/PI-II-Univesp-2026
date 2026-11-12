<?php

use App\Enums\Roles;
use App\Filament\Resources\Students\Pages\ListStudents;
use App\Models\Student;
use App\Models\User;

use function Pest\Laravel\actingAs;
use function Pest\Livewire\livewire;

describe('students', function () {
    it('can list students', function () {
        actingAs(User::role(Roles::ADMIN)->first());

        $students = Student::limit(5)->get();

        livewire(ListStudents::class)
            ->assertOk()
            ->assertCanSeeTableRecords($students);
    });
})->group('Feature');
