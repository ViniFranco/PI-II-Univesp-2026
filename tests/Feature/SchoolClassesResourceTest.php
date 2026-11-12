<?php

use App\Enums\Roles;
use App\Filament\Resources\SchoolClasses\Pages\ListSchoolClasses;
use App\Models\SchoolClass;
use App\Models\User;

use function Pest\Laravel\actingAs;
use function Pest\Livewire\livewire;

describe('school classes', function () {
    it('can list school classes', function () {
        actingAs(User::role(Roles::ADMIN)->first());

        $schoolClasses = SchoolClass::limit(5)->get();

        livewire(ListSchoolClasses::class)
            ->assertOk()
            ->assertCanSeeTableRecords($schoolClasses);
    });
})->group('Feature');
