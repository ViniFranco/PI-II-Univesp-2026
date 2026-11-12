<?php

namespace App\Filament\Resources\Enrollments\Pages;

use App\Filament\Resources\Enrollments\EnrollmentResource;
use App\Filament\Resources\Students\StudentResource;
use App\Models\Enrollment;
use Filament\Actions\Action;
use Filament\Actions\EditAction;
use Filament\Resources\Pages\ViewRecord;
use Filament\Support\Icons\Heroicon;

class ViewEnrollment extends ViewRecord
{
    protected static string $resource = EnrollmentResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Action::make('view-student')
                ->label(__('filament/resources/student.actions.view'))
                ->url(fn (Enrollment $record): string => StudentResource::getUrl('view', ['record' => $record->student_id]))
                ->icon(Heroicon::User),
            EditAction::make(),
        ];
    }
}
