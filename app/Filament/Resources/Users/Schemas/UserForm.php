<?php

namespace App\Filament\Resources\Users\Schemas;

use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;
use Illuminate\Support\Facades\Hash;

class UserForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('name')
                    ->label(__('filament/resources/student.columns.name'))
                    ->validationAttribute(__('filament/resources/student.columns.name'))
                    ->maxLength(255)
                    ->required(),
                TextInput::make('email')
                    ->label('Email address')
                    ->label(__('filament/resources/guardian.columns.email'))
                    ->validationAttribute(__('filament/resources/guardian.columns.email'))
                    ->email()
                    ->unique(ignoreRecord: true)
                    ->required(),
                TextInput::make('password')
                    ->label(__('filament/common/columns.password'))
                    ->validationAttribute(__('filament/common/columns.password'))
                    ->password()
                    ->minLength(8)
                    ->dehydrateStateUsing(fn($state) => Hash::make($state))
                    ->dehydrated(fn($state) => filled($state))
                    ->confirmed()
                    ->required(fn(string $context): bool => $context === 'create'),
                TextInput::make('password_confirmation')
                    ->label(__('filament/common/columns.password_confirmation'))
                    ->validationAttribute(__('filament/common/columns.password_confirmation'))
                    ->password()
                    ->dehydrated(false)
                    ->required(fn(string $context): bool => $context === 'create'),
                Select::make('roles')
                    ->relationship('roles', 'name')
                    ->label(__('filament/resources/user.relationships.roles'))
                    ->validationAttribute(__('filament/resources/user.relationships.roles'))
                    ->preload()
                    ->searchable()
                    ->required(),
            ]);
    }
}
