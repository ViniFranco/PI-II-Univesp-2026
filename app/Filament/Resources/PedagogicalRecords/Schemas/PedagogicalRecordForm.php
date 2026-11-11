<?php

namespace App\Filament\Resources\PedagogicalRecords\Schemas;

use App\Models\Enrollment;
use Filament\Forms\Components\Hidden;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Schema;
use Illuminate\Support\Facades\Auth;

class PedagogicalRecordForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Hidden::make('user_id')
                    ->default(Auth::id())
                    ->required(),
                Select::make('enrollment_id')
                    ->relationship('enrollment', 'id')
                    ->searchable()
                    ->getSearchResultsUsing(function (string $search): array {
                        return Enrollment::query()
                            ->whereHas(
                                'student',
                                fn($query) =>
                                $query->where('name', 'ilike', "%{$search}%")
                            )
                            ->orWhereHas(
                                'schoolClass',
                                fn($query) =>
                                $query->where('name', 'ilike', "%{$search}%")
                                    ->orWhere('year', 'ilike', "%{$search}%")
                            )
                            ->with(['student', 'schoolClass'])
                            ->limit(50)
                            ->get()
                            ->mapWithKeys(fn($enrollment) => [
                                $enrollment->id => implode(' - ', [
                                    $enrollment->student->name,
                                    $enrollment->schoolClass->name,
                                    $enrollment->schoolClass->year,
                                ]),
                            ])
                            ->toArray();
                    })
                    ->label(__('filament/resources/enrollment.label'))
                    ->columnSpanFull()
                    ->required(),
                Toggle::make('has_medical_report')
                    ->label(__('filament/resources/pedagogical_record.columns.has_medical_report'))
                    ->required(),
                RichEditor::make('content')
                    ->label(__('filament/resources/pedagogical_record.columns.content'))
                    ->toolbarButtons([
                        ['bold', 'italic', 'underline', 'strike', 'subscript', 'superscript'],
                        ['h2', 'h3'],
                        ['alignStart', 'alignCenter', 'alignEnd'],
                        ['blockquote', 'bulletList', 'orderedList'],
                        ['table'],
                        ['undo', 'redo'],
                    ])
                    ->json()
                    ->columnSpanFull()
                    ->required(),
            ]);
    }
}
