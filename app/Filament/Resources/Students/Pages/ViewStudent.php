<?php

namespace App\Filament\Resources\Students\Pages;

use App\Filament\Resources\Guardians\GuardianResource;
use App\Filament\Resources\Students\StudentResource;;

use App\Models\Student;
use Filament\Actions\Action;
use Filament\Actions\EditAction;
use Filament\Resources\Pages\ViewRecord;
use Filament\Support\Icons\Heroicon;

class ViewStudent extends ViewRecord
{
    protected static string $resource = StudentResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Action::make('view-guardian')
                ->label(__('filament/resources/guardian.actions.view'))
                ->url(fn(Student $record): string => GuardianResource::getUrl('view', ['record' => $record->guardian_id]))
                ->icon(Heroicon::User),
            EditAction::make(),
        ];
    }
}
