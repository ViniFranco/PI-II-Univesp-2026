<?php

namespace App\Filament\Resources\Guardians\Schemas;

use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class GuardianForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('name')
                    ->required(),
                TextInput::make('email')
                    ->label('Email address')
                    ->email()
                    ->required(),
                TextInput::make('phone')
                    ->tel()
                    ->required(),
                TextInput::make('street')
                    ->required(),
                TextInput::make('number')
                    ->required(),
                TextInput::make('complement'),
                TextInput::make('neighborhood')
                    ->required(),
                TextInput::make('city')
                    ->required(),
                TextInput::make('state')
                    ->required(),
                TextInput::make('zip_code')
                    ->required(),
                DatePicker::make('birth_date')
                    ->required(),
            ]);
    }
}
