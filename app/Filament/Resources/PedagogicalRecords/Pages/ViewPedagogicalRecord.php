<?php

namespace App\Filament\Resources\PedagogicalRecords\Pages;

use App\Filament\Resources\Enrollments\EnrollmentResource;
use App\Filament\Resources\PedagogicalRecords\PedagogicalRecordResource;
use App\Models\PedagogicalRecord;
use Filament\Actions\Action;
use Filament\Actions\EditAction;
use Filament\Resources\Pages\ViewRecord;
use Filament\Support\Icons\Heroicon;

class ViewPedagogicalRecord extends ViewRecord
{
    protected static string $resource = PedagogicalRecordResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Action::make('view-enrollment')
                ->label(__('filament/resources/enrollment.actions.view'))
                ->url(fn(PedagogicalRecord $record): string => EnrollmentResource::getUrl('view', ['record' => $record->enrollment_id]))
                ->icon(Heroicon::Document),
            EditAction::make(),
        ];
    }
}
