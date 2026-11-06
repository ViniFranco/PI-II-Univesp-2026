<?php

namespace App\Filament\Resources\PedagogicalRecords\Pages;

use App\Filament\Resources\PedagogicalRecords\PedagogicalRecordResource;
use Filament\Actions\EditAction;
use Filament\Resources\Pages\ViewRecord;

class ViewPedagogicalRecord extends ViewRecord
{
    protected static string $resource = PedagogicalRecordResource::class;

    protected function getHeaderActions(): array
    {
        return [
            EditAction::make(),
        ];
    }
}
