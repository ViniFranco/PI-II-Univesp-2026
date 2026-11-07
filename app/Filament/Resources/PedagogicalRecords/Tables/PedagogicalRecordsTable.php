<?php

namespace App\Filament\Resources\PedagogicalRecords\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Actions\ForceDeleteBulkAction;
use Filament\Actions\RestoreBulkAction;
use Filament\Actions\ViewAction;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\TrashedFilter;
use Filament\Tables\Table;

class PedagogicalRecordsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('id')
                    ->label('ID')
                    ->visible(false)
                    ->searchable(),
                TextColumn::make('enrollment.student.name')
                    ->label(__('filament/resources/student.label'))
                    ->searchable(),
                TextColumn::make('enrollment.schoolClass.name')
                    ->label(__('filament/resources/school_class.columns.name'))
                    ->searchable(),
                TextColumn::make('enrollment.schoolClass.year')
                    ->label(__('filament/resources/school_class.columns.year'))
                    ->searchable(),
                IconColumn::make('has_medical_report')
                    ->label(__('filament/resources/pedagogical_record.columns.has_medical_report'))
                    ->boolean(),
                TextColumn::make('deleted_at')
                    ->dateTime()
                    ->sortable()
                    ->label(__('filament/common/columns.deleted_at'))
                    ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->label(__('filament/common/columns.created_at')),
                TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->label(__('filament/common/columns.updated_at'))
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                TrashedFilter::make(),
            ])
            ->recordActions([
                ViewAction::make(),
                EditAction::make(),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                    ForceDeleteBulkAction::make(),
                    RestoreBulkAction::make(),
                ]),
            ]);
    }
}
