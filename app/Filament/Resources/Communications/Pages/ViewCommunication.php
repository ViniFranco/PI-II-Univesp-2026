<?php

namespace App\Filament\Resources\Communications\Pages;

use App\Filament\Resources\Communications\CommunicationResource;
use App\Filament\Resources\Students\StudentResource;
use App\Models\Communication;
use Filament\Actions\Action;
use Filament\Actions\EditAction;
use Filament\Resources\Pages\ViewRecord;
use Filament\Support\Icons\Heroicon;

class ViewCommunication extends ViewRecord
{
    protected static string $resource = CommunicationResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Action::make('view-guardian')
                ->label(__('filament/resources/student.actions.view'))
                ->url(fn (Communication $record): string => StudentResource::getUrl('view', ['record' => $record->student_id]))
                ->icon(Heroicon::User),
            EditAction::make(),
        ];
    }
}
