<?php

namespace App\Enums;

use BackedEnum;
use Filament\Support\Contracts\HasLabel;
use Filament\Support\Icons\Heroicon;
use Illuminate\Contracts\Support\Htmlable;

enum CommunicationReturnStatus: int implements HasLabel
{
    case RESPONSE_PENDING = 1;

    case ANSWERED = 2;

    public function getLabel(): string|Htmlable|null
    {
        return __(sprintf('filament/common/enums.communication_return_status.%s', $this->name));
    }

    public function getIcon(): string|BackedEnum|Htmlable|null
    {
        return match ($this) {
            self::RESPONSE_PENDING => Heroicon::Clock,
            self::ANSWERED => Heroicon::Check,
        };
    }

    public function getColor(): string|array|null
    {
        return match ($this) {
            self::RESPONSE_PENDING => 'danger',
            self::ANSWERED => 'success',
        };
    }
}
