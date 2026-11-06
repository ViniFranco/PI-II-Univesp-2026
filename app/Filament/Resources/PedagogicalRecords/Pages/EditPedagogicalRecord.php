<?php

namespace App\Filament\Resources\PedagogicalRecords\Pages;

use App\Filament\Resources\PedagogicalRecords\PedagogicalRecordResource;
use Filament\Actions\DeleteAction;
use Filament\Actions\ForceDeleteAction;
use Filament\Actions\RestoreAction;
use Filament\Actions\ViewAction;
use Filament\Resources\Pages\EditRecord;

class EditPedagogicalRecord extends EditRecord
{
    protected static string $resource = PedagogicalRecordResource::class;

    protected function getHeaderActions(): array
    {
        return [
            ViewAction::make(),
            DeleteAction::make(),
            ForceDeleteAction::make(),
            RestoreAction::make(),
        ];
    }
}
