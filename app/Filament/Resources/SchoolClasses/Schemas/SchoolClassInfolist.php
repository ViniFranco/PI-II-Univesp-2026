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
                TextEntry::make('name')->label(__('filament/resources/school_class.columns.name')),
                TextEntry::make('year')->label(__('filament/resources/school_class.columns.year'))
                    ->date('Y'),
                TextEntry::make('deleted_at')
                    ->dateTime()
                    ->label(__('filament/common/columns.deleted_at'))
                    ->visible(fn (SchoolClass $record): bool => $record->trashed()),
                TextEntry::make('created_at')
                    ->dateTime()
                    ->label(__('filament/common/columns.created_at'))
                    ->placeholder('-'),
                TextEntry::make('updated_at')
                    ->dateTime()
                    ->label(__('filament/common/columns.updated_at'))
                    ->placeholder('-'),
            ]);
    }
}
