<?php

namespace App\Filament\Resources\SchoolClasses\RelationManagers;

use App\Filament\Resources\PedagogicalRecords\PedagogicalRecordResource;
use Filament\Actions\CreateAction;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables\Table;

class PedagogicalRecordsRelationManager extends RelationManager
{
    protected static string $relationship = 'pedagogicalRecords';

    protected static ?string $relatedResource = PedagogicalRecordResource::class;

    public function table(Table $table): Table
    {
        return $table
            ->headerActions([
                CreateAction::make(),
            ]);
    }
}
