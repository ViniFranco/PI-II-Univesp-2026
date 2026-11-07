<?php

namespace App\Filament\Resources\PedagogicalRecords;

use App\Filament\Resources\PedagogicalRecords\Pages\CreatePedagogicalRecord;
use App\Filament\Resources\PedagogicalRecords\Pages\EditPedagogicalRecord;
use App\Filament\Resources\PedagogicalRecords\Pages\ListPedagogicalRecords;
use App\Filament\Resources\PedagogicalRecords\Pages\ViewPedagogicalRecord;
use App\Filament\Resources\PedagogicalRecords\Schemas\PedagogicalRecordForm;
use App\Filament\Resources\PedagogicalRecords\Schemas\PedagogicalRecordInfolist;
use App\Filament\Resources\PedagogicalRecords\Tables\PedagogicalRecordsTable;
use App\Models\PedagogicalRecord;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use Illuminate\Contracts\Support\Htmlable;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class PedagogicalRecordResource extends Resource
{
    protected static ?string $model = PedagogicalRecord::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    public static function form(Schema $schema): Schema
    {
        return PedagogicalRecordForm::configure($schema);
    }

    public static function infolist(Schema $schema): Schema
    {
        return PedagogicalRecordInfolist::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return PedagogicalRecordsTable::configure($table);
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
            'index' => ListPedagogicalRecords::route('/'),
            'create' => CreatePedagogicalRecord::route('/create'),
            'view' => ViewPedagogicalRecord::route('/{record}'),
            'edit' => EditPedagogicalRecord::route('/{record}/edit'),
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
        return __('filament/resources/pedagogical_record.label');
    }

    public static function getPluralModelLabel(): string
    {
        return __('filament/resources/pedagogical_record.plural');
    }

    public static function getNavigationGroup(): ?string
    {
        return __('filament/common/navigation.academic');
    }

    public static function getNavigationIcon(): string | BackedEnum | Htmlable | null
    {
        return Heroicon::ArchiveBox;
    }
}
