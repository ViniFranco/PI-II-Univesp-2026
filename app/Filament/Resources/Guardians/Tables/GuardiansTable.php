<?php

namespace App\Filament\Resources\Guardians\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Actions\ForceDeleteBulkAction;
use Filament\Actions\RestoreBulkAction;
use Filament\Actions\ViewAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\TrashedFilter;
use Filament\Tables\Table;

class GuardiansTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('id')
                    ->label('ID')
                    ->visible(false)
                    ->searchable(),
                TextColumn::make('name')
                    ->label(__('filament/resources/guardian.columns.name'))
                    ->sortable()
                    ->searchable(),
                TextColumn::make('email')
                    ->label('Email address')
                    ->sortable()
                    ->label(__('filament/resources/guardian.columns.email'))
                    ->searchable(),
                TextColumn::make('phone')
                    ->label(__('filament/resources/guardian.columns.phone'))
                    ->searchable(),
                TextColumn::make('street')
                    ->visible(false)
                    ->searchable(),
                TextColumn::make('number')
                    ->visible(false)
                    ->searchable(),
                TextColumn::make('complement')
                    ->visible(false)
                    ->searchable(),
                TextColumn::make('neighborhood')
                    ->visible(false)
                    ->searchable(),
                TextColumn::make('city')
                    ->visible(false)
                    ->searchable(),
                TextColumn::make('state')
                    ->visible(false)
                    ->searchable(),
                TextColumn::make('zip_code')
                    ->visible(false)
                    ->searchable(),
                TextColumn::make('birth_date')
                    ->visible(false)
                    ->date()
                    ->sortable(),
                TextColumn::make('deleted_at')
                    ->visible(false)
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->visible(false)
                    ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->visible(false)
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
