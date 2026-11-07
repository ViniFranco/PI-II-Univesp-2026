<?php

namespace App\Filament\Resources\Communications\Tables;

use App\Enums\CommunicationChannels;
use App\Enums\CommunicationReturnStatus;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Actions\ForceDeleteBulkAction;
use Filament\Actions\RestoreBulkAction;
use Filament\Actions\ViewAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\TrashedFilter;
use Filament\Tables\Table;

class CommunicationsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('student.name')
                    ->label(__('filament/resources/student.label'))
                    ->searchable(),
                TextColumn::make('communication_channel')
                    ->label(__('filament/resources/communication.columns.communication_channel'))
                    ->badge()
                    ->formatStateUsing(fn(string $state) => CommunicationChannels::tryFrom($state)->getLabel())
                    ->color(fn(string $state) => CommunicationChannels::tryFrom($state)->getColor())
                    ->icon(fn(string $state) => CommunicationChannels::tryFrom($state)->getIcon())
                    ->searchable(),
                TextColumn::make('communication_return_status')
                    ->label(__('filament/resources/communication.columns.communication_return_status'))
                    ->badge()
                    ->formatStateUsing(fn(int $state) => CommunicationReturnStatus::tryFrom($state)->getLabel())
                    ->color(fn(int $state) => CommunicationReturnStatus::tryFrom($state)->getColor())
                    ->icon(fn(int $state) => CommunicationReturnStatus::tryFrom($state)->getIcon())
                    ->searchable(),
                TextColumn::make('deleted_at')
                    ->label(__('filament/common/columns.deleted_at'))
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('created_at')
                    ->label(__('filament/common/columns.created_at'))
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('updated_at')
                    ->label(__('filament/common/columns.updated_at'))
                    ->dateTime()
                    ->sortable()
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
