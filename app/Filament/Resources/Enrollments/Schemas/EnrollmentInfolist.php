<?php

namespace App\Filament\Resources\Enrollments\Schemas;

use App\Models\Enrollment;
use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Schema;

class EnrollmentInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextEntry::make('id')
                    ->label('ID'),
                TextEntry::make('student.name')
                    ->label(__('filament/resources/student.columns.name')),
                TextEntry::make('schoolClass.name')
                    ->label(__('filament/resources/school_class.columns.name')),
                TextEntry::make('deleted_at')
                    ->dateTime()
                    ->label(__('filament/common/columns.deleted_at'))
                    ->visible(fn (Enrollment $record): bool => $record->trashed()),
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
