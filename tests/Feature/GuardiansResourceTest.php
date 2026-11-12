<?php

use App\Enums\Roles;
use App\Filament\Resources\Guardians\Pages\ListGuardians;
use App\Models\Guardian;
use App\Models\User;

use function Pest\Laravel\actingAs;
use function Pest\Livewire\livewire;

describe('guardians', function () {
    it('can list guardians', function () {
        actingAs(User::role(Roles::ADMIN)->first());

        $guardians = Guardian::limit(5)->get();

        livewire(ListGuardians::class)
            ->assertOk()
            ->assertCanSeeTableRecords($guardians);
    });
})->group('Feature');
