<?php

namespace App\Filament\Resources\Guardians\Schemas;

use App\Enums\StateEnum;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Utilities\Set;
use Filament\Schemas\Schema;
use Leandrocfe\FilamentPtbrFormFields\Cep;
use Leandrocfe\FilamentPtbrFormFields\Enums\CepFieldMode;
use Leandrocfe\FilamentPtbrFormFields\PhoneNumber;
use Leandrocfe\FilamentPtbrFormFields\Providers\ViaCepProvider;

class GuardianForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('name')
                    ->label(__('filament/resources/guardian.columns.name'))
                    ->validationAttribute(__('filament/resources/guardian.columns.name'))
                    ->required(),
                TextInput::make('email')
                    ->label('Email address')
                    ->email()
                    ->label(__('filament/resources/guardian.columns.email'))
                    ->validationAttribute(__('filament/resources/guardian.columns.email'))
                    ->required(),
                PhoneNumber::make('phone')
                    ->label(__('filament/resources/guardian.columns.phone'))
                    ->validationAttribute(__('filament/resources/guardian.columns.phone'))
                    ->required(),
                TextInput::make('street')
                    ->label(__('filament/resources/guardian.columns.street'))
                    ->validationAttribute(__('filament/resources/guardian.columns.street'))
                    ->required(),
                TextInput::make('number')
                    ->label(__('filament/resources/guardian.columns.number'))
                    ->validationAttribute(__('filament/resources/guardian.columns.number'))
                    ->required(),
                TextInput::make('complement')
                    ->label(__('filament/resources/guardian.columns.complement'))
                    ->validationAttribute(__('filament/resources/guardian.columns.complement')),
                TextInput::make('neighborhood')
                    ->label(__('filament/resources/guardian.columns.neighborhood'))
                    ->validationAttribute(__('filament/resources/guardian.columns.neighborhood'))
                    ->required(),
                TextInput::make('city')
                    ->label(__('filament/resources/guardian.columns.city'))
                    ->validationAttribute(__('filament/resources/guardian.columns.city'))
                    ->required(),
                Select::make('state')
                    ->label(__('filament/resources/guardian.columns.state'))
                    ->validationAttribute(__('filament/resources/guardian.columns.state'))
                    ->required()
                    ->options(StateEnum::options())
                    ->searchable()
                    ->native(false),
                Cep::make('zip_code')
                    ->label(__('filament/resources/guardian.columns.zip_code'))
                    ->validationAttribute(__('filament/resources/guardian.columns.zip_code'))
                    ->mode(CepFieldMode::SUFFIX)
                    ->api(ViaCepProvider::class, function (Set $set, ?array $response) {
                        $set('street', data_get($response, 'logradouro'));
                        $set('neighborhood', data_get($response, 'bairro'));
                        $set('city', data_get($response, 'localidade'));
                        $set('state', data_get($response, 'uf'));
                    })
                    ->required(),
                DatePicker::make('birth_date')
                    ->displayFormat('d/m/Y')
                    ->label(__('filament/resources/guardian.columns.birth_date'))
                    ->validationAttribute(__('filament/resources/guardian.columns.birth_date'))
                    ->native(false)
                    ->beforeOrEqual(now()->subYears(18))
                    ->required(),
            ]);
    }
}
