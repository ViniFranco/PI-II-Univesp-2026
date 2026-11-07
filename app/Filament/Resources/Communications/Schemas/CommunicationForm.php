<?php

namespace App\Filament\Resources\Communications\Schemas;

use App\Enums\CommunicationChannels;
use App\Enums\CommunicationReturnStatus;
use Filament\Forms\Components\Hidden;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Select;
use Filament\Schemas\Schema;
use Illuminate\Support\Facades\Auth;

class CommunicationForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Select::make('student_id')
                    ->label(__('filament/resources/student.label'))
                    ->relationship('student', 'name')
                    ->preload()
                    ->searchable()
                    ->columnSpanFull()
                    ->required(),
                Hidden::make('user_id')
                    ->default(Auth::id())
                    ->required(),
                Select::make('communication_channel')
                    ->label(__('filament/resources/communication.columns.communication_channel'))
                    ->native(false)
                    ->options(CommunicationChannels::class)
                    ->default(CommunicationChannels::PHONE)
                    ->required(),
                Select::make('communication_return_status')
                    ->label(__('filament/resources/communication.columns.communication_return_status'))
                    ->options(CommunicationReturnStatus::class)
                    ->default(CommunicationReturnStatus::RESPONSE_PENDING)
                    ->native(false)
                    ->required(),
                RichEditor::make('description')
                    ->label(__('filament/resources/communication.columns.description'))
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
