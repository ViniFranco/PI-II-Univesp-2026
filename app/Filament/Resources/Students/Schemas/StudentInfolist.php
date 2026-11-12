<?php

namespace App\Filament\Resources\Students\Schemas;

use App\Models\Student;
use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Schema;

class StudentInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextEntry::make('id')
                    ->label('ID'),
                TextEntry::make('name')
                    ->label(__('filament/resources/student.columns.name')),
                TextEntry::make('birth_date')
                    ->label(__('filament/resources/student.columns.birth_date'))
                    ->date(),
                TextEntry::make('guardian.name')
                    ->label(__('filament/resources/student.columns.guardian_id')),
                TextEntry::make('deleted_at')
                    ->dateTime()
                    ->visible(fn (Student $record): bool => $record->trashed()),
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
