<?php

use App\Enums\Roles;
use App\Filament\Resources\PedagogicalRecords\Pages\ListPedagogicalRecords;
use App\Models\PedagogicalRecord;
use App\Models\User;

use function Pest\Laravel\actingAs;
use function Pest\Livewire\livewire;

describe('pedagogical records', function () {
    it('can list pedagogical records', function () {
        actingAs(User::role(Roles::ADMIN)->first());

        $pedagogicalRecords = PedagogicalRecord::limit(5)->get();

        livewire(ListPedagogicalRecords::class)
            ->assertOk()
            ->assertCanSeeTableRecords($pedagogicalRecords);
    });
})->group('Feature');
