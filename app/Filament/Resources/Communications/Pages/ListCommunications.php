<?php

namespace App\Filament\Resources\Communications\Pages;

use App\Filament\Resources\Communications\CommunicationResource;
use App\Filament\Resources\Communications\Widgets\CommunicationsOverview;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;
use Override;

class ListCommunications extends ListRecords
{
    protected static string $resource = CommunicationResource::class;

    #[Override]
    protected function getHeaderWidgets(): array
    {
        return [
            CommunicationsOverview::class,
        ];
    }

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
