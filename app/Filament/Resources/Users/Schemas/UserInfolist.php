<?php

namespace App\Filament\Resources\Users\Schemas;

use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Schema;

class UserInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextEntry::make('id')
                    ->label('ID'),
                TextEntry::make('name')
                    ->label(__('filament/resources/student.columns.name')),
                TextEntry::make('email')
                    ->label(__('filament/resources/guardian.columns.email')),
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
