<?php

namespace App\Filament\Resources\PedagogicalRecords\Schemas;

use App\Models\PedagogicalRecord;
use Filament\Forms\Components\RichEditor\RichContentRenderer;
use Filament\Infolists\Components\IconEntry;
use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Schema;

class PedagogicalRecordInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextEntry::make('id')
                    ->label('ID'),
                TextEntry::make('enrollment.student.name')
                    ->label(__('filament/resources/student.label')),
                TextEntry::make('enrollment.schoolClass.name')
                    ->label(__('filament/resources/school_class.columns.name')),
                TextEntry::make('enrollment.schoolClass.year')
                    ->label(__('filament/resources/school_class.columns.year')),
                IconEntry::make('has_medical_report')
                    ->label(__('filament/resources/pedagogical_record.columns.has_medical_report'))
                    ->boolean(),
                TextEntry::make('deleted_at')
                    ->dateTime()
                    ->label(__('filament/common/columns.deleted_at'))
                    ->visible(fn (PedagogicalRecord $record): bool => $record->trashed()),
                TextEntry::make('created_at')
                    ->dateTime()
                    ->label(__('filament/common/columns.created_at'))
                    ->placeholder('-'),
                TextEntry::make('updated_at')
                    ->dateTime()
                    ->label(__('filament/common/columns.updated_at'))
                    ->placeholder('-'),
                TextEntry::make('content')
                    ->state(fn (PedagogicalRecord $record) => RichContentRenderer::make($record->content)->toHtml())
                    ->html()
                    ->prose()
                    ->label(__('filament/resources/pedagogical_record.columns.content'))
                    ->columnSpanFull(),
            ]);
    }
}
