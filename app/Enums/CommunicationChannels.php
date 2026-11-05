<?php

namespace App\Enums;

enum CommunicationChannels: string
{
    case EMAIL = 'email';
    case PHONE = 'phone';
    case WHATSAPP = 'whatsapp';
}
