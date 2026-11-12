<?php

use App\Enums\Roles;
use App\Filament\Resources\Communications\Pages\ListCommunications;
use App\Models\Communication;
use App\Models\User;

use function Pest\Laravel\actingAs;
use function Pest\Livewire\livewire;

describe('communications', function () {
    it('can list communications', function () {
        actingAs(User::role(Roles::ADMIN)->first());

        $communications = Communication::limit(5)->get();

        livewire(ListCommunications::class)
            ->assertOk()
            ->assertCanSeeTableRecords($communications);
    });
})->group('Feature');
