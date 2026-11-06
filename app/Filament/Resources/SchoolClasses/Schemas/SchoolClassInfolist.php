<?php

namespace App\Filament\Resources\SchoolClasses\Schemas;

use App\Models\SchoolClass;
use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Schema;

class SchoolClassInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextEntry::make('id')
                    ->label('ID')
                    ->visible(false),
                TextEntry::make('name'),
                TextEntry::make('year')
                    ->date('Y'),
                TextEntry::make('deleted_at')
                    ->dateTime()
                    ->visible(fn(SchoolClass $record): bool => $record->trashed()),
                TextEntry::make('created_at')
                    ->dateTime()
                    ->placeholder('-'),
                TextEntry::make('updated_at')
                    ->dateTime()
                    ->placeholder('-'),
            ]);
    }
}
