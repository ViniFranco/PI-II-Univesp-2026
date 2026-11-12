<?php

use App\Enums\Roles;
use App\Filament\Resources\Enrollments\Pages\ListEnrollments;
use App\Models\Enrollment;
use App\Models\User;

use function Pest\Laravel\actingAs;
use function Pest\Livewire\livewire;

describe('enrollments', function () {
    it('can list enrollments', function () {
        actingAs(User::role(Roles::ADMIN)->first());

        $enrollments = Enrollment::limit(5)->get();

        livewire(ListEnrollments::class)
            ->assertOk()
            ->assertCanSeeTableRecords($enrollments);
    });
})->group('Feature');
