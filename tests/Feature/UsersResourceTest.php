<?php

use App\Enums\Roles;
use App\Filament\Resources\Users\Pages\ListUsers;
use App\Models\User;

use function Pest\Laravel\actingAs;
use function Pest\Livewire\livewire;

describe('users', function () {
    it('can list users', function () {
        actingAs(User::role(Roles::ADMIN)->first());

        $users = User::limit(5)->get();

        livewire(ListUsers::class)
            ->assertOk()
            ->assertCanSeeTableRecords($users);
    });
})->group('Feature');
