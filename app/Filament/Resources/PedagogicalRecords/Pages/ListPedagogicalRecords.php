<?php

namespace App\Filament\Resources\PedagogicalRecords\Pages;

use App\Filament\Resources\PedagogicalRecords\PedagogicalRecordResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListPedagogicalRecords extends ListRecords
{
    protected static string $resource = PedagogicalRecordResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
