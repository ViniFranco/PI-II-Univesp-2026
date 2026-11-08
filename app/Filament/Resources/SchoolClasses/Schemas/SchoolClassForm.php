<?php

namespace App\Filament\Resources\SchoolClasses\Schemas;

use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class SchoolClassForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('name')
                    ->label(__('filament/resources/school_class.columns.name'))
                    ->validationAttribute(__('filament/resources/school_class.columns.name'))
                    ->required(),
                TextInput::make('year')
                    ->numeric()
                    ->minValue(today()->format('Y'))
                    ->default(today()->format('Y'))
                    ->label(__('filament/resources/school_class.columns.year'))
                    ->validationAttribute(__('filament/resources/school_class.columns.year'))
                    ->rules(['date_format:Y'])
                    ->afterOrEqual(today()->format('Y'))
                    ->required(),
            ]);
    }
}
