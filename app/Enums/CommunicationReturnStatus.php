<?php

namespace App\Enums;

enum CommunicationReturnStatus: int
{
    case RESPONSE_PENDING = 1;
    case ANSWERED = 2;
}
