<?php

namespace App\Filament\Resources\Students\Schemas;

use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class StudentForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('name')
                    ->label(__('filament/resources/student.columns.name'))
                    ->required(),
                DatePicker::make('birth_date')
                    ->format('d/m/Y')
                    ->displayFormat('d/m/Y')
                    ->label(__('filament/resources/student.columns.birth_date'))
                    ->native(false)
                    ->required(),
                Select::make('guardian_id')
                    ->relationship('guardian', 'name')
                    ->label(__('filament/resources/student.columns.guardian_id'))
                    ->native(false)
                    ->searchable()
                    ->required(),
            ]);
    }
}
