<?php

namespace App\Enums;

use BackedEnum;
use Filament\Support\Contracts\HasLabel;
use Filament\Support\Icons\Heroicon;
use Illuminate\Contracts\Support\Htmlable;

enum CommunicationChannels: string implements HasLabel
{
    case MEETING = 'meeting';

    case EMAIL = 'email';

    case PHONE = 'phone';

    case WHATSAPP = 'whatsapp';

    public function getLabel(): string | Htmlable | null
    {
        return __(sprintf('filament/common/enums.communication_channels.%s', $this->name));
    }

    public function getColor(): string | array | null
    {
        return 'primary';
    }

    public function getIcon(): string | BackedEnum | Htmlable | null
    {
        return match ($this) {
            self::MEETING => Heroicon::UserGroup,
            self::EMAIL => Heroicon::Envelope,
            self::PHONE => Heroicon::Phone,
            self::WHATSAPP => Heroicon::ChatBubbleLeft,
        };
    }
}
