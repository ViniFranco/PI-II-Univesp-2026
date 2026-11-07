<?php

use App\Enums\CommunicationReturnStatus;

return [
    'communication_return_status' => [
        CommunicationReturnStatus::RESPONSE_PENDING->name => 'Pendente de resposta',
        CommunicationReturnStatus::ANSWERED->name => 'Respondido',
    ],
];
