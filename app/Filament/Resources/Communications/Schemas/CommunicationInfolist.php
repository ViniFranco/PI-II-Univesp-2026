<?php

namespace App\Filament\Resources\Communications\Schemas;

use App\Enums\CommunicationChannels;
use App\Enums\CommunicationReturnStatus;
use App\Models\Communication;
use Filament\Forms\Components\RichEditor\RichContentRenderer;
use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Schema;

class CommunicationInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextEntry::make('id')
                    ->label('ID'),
                TextEntry::make('student.name')
                    ->label(__('filament/resources/student.label')),
                TextEntry::make('communication_channel')
                    ->label(__('filament/resources/communication.columns.communication_channel'))
                    ->badge()
                    ->formatStateUsing(fn(string $state) => CommunicationChannels::tryFrom($state)->getLabel())
                    ->color(fn(string $state) => CommunicationChannels::tryFrom($state)->getColor())
                    ->icon(fn(string $state) => CommunicationChannels::tryFrom($state)->getIcon()),
                TextEntry::make('communication_return_status')
                    ->label(__('filament/resources/communication.columns.communication_return_status'))
                    ->badge()
                    ->formatStateUsing(fn(int $state) => CommunicationReturnStatus::tryFrom($state)->getLabel())
                    ->color(fn(int $state) => CommunicationReturnStatus::tryFrom($state)->getColor())
                    ->icon(fn(int $state) => CommunicationReturnStatus::tryFrom($state)->getIcon()),
                TextEntry::make('deleted_at')
                    ->label(__('filament/common/columns.deleted_at'))
                    ->dateTime()
                    ->visible(fn(Communication $record): bool => $record->trashed()),
                TextEntry::make('created_at')
                    ->label(__('filament/common/columns.created_at'))
                    ->dateTime()
                    ->placeholder('-'),
                TextEntry::make('updated_at')
                    ->label(__('filament/common/columns.updated_at'))
                    ->dateTime()
                    ->placeholder('-'),
                TextEntry::make('description')
                    ->state(fn(Communication $record) => RichContentRenderer::make($record->description)->toHtml())
                    ->html()
                    ->prose()
                    ->label(__('filament/resources/communication.columns.description'))
                    ->columnSpanFull(),
            ]);
    }
}
