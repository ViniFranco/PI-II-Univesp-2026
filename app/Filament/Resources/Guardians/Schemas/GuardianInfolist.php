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
                TextEntry::make('name')->label(__('filament/resources/guardian.columns.name')),
                TextEntry::make('email')
                    ->label(__('filament/resources/guardian.columns.email')),
                TextEntry::make('phone')->label(__('filament/resources/guardian.columns.phone')),
                TextEntry::make('street')->label(__('filament/resources/guardian.columns.street')),
                TextEntry::make('number')->label(__('filament/resources/guardian.columns.number')),
                TextEntry::make('complement')
                    ->label(__('filament/resources/guardian.columns.complement'))
                    ->placeholder('-'),
                TextEntry::make('neighborhood')->label(__('filament/resources/guardian.columns.neighborhood')),
                TextEntry::make('city')->label(__('filament/resources/guardian.columns.city')),
                TextEntry::make('state')->label(__('filament/resources/guardian.columns.state')),
                TextEntry::make('zip_code')->label(__('filament/resources/guardian.columns.zip_code')),
                TextEntry::make('birth_date')
                    ->label(__('filament/resources/guardian.columns.birth_date'))
                    ->date(),
                TextEntry::make('deleted_at')
                    ->label(__('filament/common/columns.deleted_at'))
                    ->dateTime()
                    ->visible(fn(Guardian $record): bool => $record->trashed()),
                TextEntry::make('created_at')
                    ->label(__('filament/common/columns.created_at'))
                    ->dateTime()
                    ->placeholder('-'),
                TextEntry::make('updated_at')
                    ->label(__('filament/common/columns.updated_at'))
                    ->dateTime()
                    ->placeholder('-'),
            ]);
    }
}
