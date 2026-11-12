<?php

namespace App\Filament\Resources\Enrollments\Schemas;

use Filament\Forms\Components\Select;
use Filament\Schemas\Schema;

class EnrollmentForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Select::make('student_id')
                    ->relationship('student', 'name')
                    ->native(false)
                    ->searchable()
                    ->label(__('filament/resources/student.columns.name'))
                    ->preload()
                    ->validationAttribute(__('filament/resources/student.columns.name'))
                    ->required(),
                Select::make('school_class_id')
                    ->relationship('schoolClass', 'name')
                    ->native(false)
                    ->preload()
                    ->searchable()
                    ->label(__('filament/resources/school_class.columns.name'))
                    ->validationAttribute(__('filament/resources/school_class.columns.name'))
                    ->getOptionLabelFromRecordUsing(fn ($record) => $record->name.' - '.$record->year)
                    ->required(),
            ]);
    }
}
