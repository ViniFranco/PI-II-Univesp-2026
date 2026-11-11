<?php

namespace App\Filament\Resources\Communications\Widgets;

use App\Enums\CommunicationReturnStatus;
use App\Models\Communication;
use Filament\Widgets\StatsOverviewWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;
use Override;

class CommunicationsOverview extends StatsOverviewWidget
{
    #[Override]
    protected function getHeading(): ?string
    {
        return __('filament/resources/communication.widgets.overview');
    }

    protected function getStats(): array
    {
        return [
            Stat::make(__('filament/common/glossary.all_records'), Communication::count()),
            Stat::make(
                CommunicationReturnStatus::RESPONSE_PENDING->getLabel(),
                Communication::returnStatus(CommunicationReturnStatus::RESPONSE_PENDING)->count(),
            )
                ->icon(CommunicationReturnStatus::RESPONSE_PENDING->getIcon()),
            Stat::make(
                CommunicationReturnStatus::ANSWERED->getLabel(),
                Communication::returnStatus(CommunicationReturnStatus::ANSWERED)->count(),
            )
                ->icon(CommunicationReturnStatus::ANSWERED->getIcon()),
        ];
    }
}
