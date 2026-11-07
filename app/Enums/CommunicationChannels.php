<?php

namespace App\Enums;

use BackedEnum;
use Filament\Support\Contracts\HasLabel;
use Filament\Support\Icons\Heroicon;
use Illuminate\Contracts\Support\Htmlable;

enum CommunicationChannels: string implements HasLabel
{
    case EMAIL = 'email';

    case PHONE = 'phone';

    public function getLabel(): string | Htmlable | null
    {
        return __(sprintf('filament/resources/guardian.columns.%s', $this->value));
    }

    public function getColor(): string | array | null
    {
        return 'primary';
    }

    public function getIcon(): string | BackedEnum | Htmlable | null
    {
        return match ($this) {
            self::EMAIL => Heroicon::Envelope,
            self::PHONE => Heroicon::Phone,
        };
    }
}
