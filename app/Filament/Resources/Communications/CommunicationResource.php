<?php

namespace App\Filament\Resources\Communications;

use App\Filament\Resources\Communications\Pages\CreateCommunication;
use App\Filament\Resources\Communications\Pages\EditCommunication;
use App\Filament\Resources\Communications\Pages\ListCommunications;
use App\Filament\Resources\Communications\Pages\ViewCommunication;
use App\Filament\Resources\Communications\Schemas\CommunicationForm;
use App\Filament\Resources\Communications\Schemas\CommunicationInfolist;
use App\Filament\Resources\Communications\Tables\CommunicationsTable;
use App\Models\Communication;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use Illuminate\Contracts\Support\Htmlable;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class CommunicationResource extends Resource
{
    protected static ?string $model = Communication::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    public static function form(Schema $schema): Schema
    {
        return CommunicationForm::configure($schema);
    }

    public static function infolist(Schema $schema): Schema
    {
        return CommunicationInfolist::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return CommunicationsTable::configure($table);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => ListCommunications::route('/'),
            'create' => CreateCommunication::route('/create'),
            'view' => ViewCommunication::route('/{record}'),
            'edit' => EditCommunication::route('/{record}/edit'),
        ];
    }

    public static function getRecordRouteBindingEloquentQuery(): Builder
    {
        return parent::getRecordRouteBindingEloquentQuery()
            ->withoutGlobalScopes([
                SoftDeletingScope::class,
            ]);
    }

    public static function getModelLabel(): string
    {
        return __('filament/resources/communication.label');
    }

    public static function getPluralModelLabel(): string
    {
        return __('filament/resources/communication.plural');
    }

    public static function getNavigationIcon(): string | BackedEnum | Htmlable | null
    {
        return Heroicon::EnvelopeOpen;
    }
}
