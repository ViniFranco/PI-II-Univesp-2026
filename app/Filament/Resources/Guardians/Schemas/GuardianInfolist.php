<?php

namespace App\Filament\Resources\Guardians\Schemas;

use App\Models\Guardian;
use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Schema;

class GuardianInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextEntry::make('id')
                    ->label('ID'),
                TextEntry::make('name'),
                TextEntry::make('email')
                    ->label('Email address'),
                TextEntry::make('phone'),
                TextEntry::make('street'),
                TextEntry::make('number'),
                TextEntry::make('complement')
                    ->placeholder('-'),
                TextEntry::make('neighborhood'),
                TextEntry::make('city'),
                TextEntry::make('state'),
                TextEntry::make('zip_code'),
                TextEntry::make('birth_date')
                    ->date(),
                TextEntry::make('deleted_at')
                    ->dateTime()
                    ->visible(fn (Guardian $record): bool => $record->trashed()),
                TextEntry::make('created_at')
                    ->dateTime()
                    ->placeholder('-'),
                TextEntry::make('updated_at')
                    ->dateTime()
                    ->placeholder('-'),
            ]);
    }
}
