<?php

use App\Enums\CommunicationChannels;
use App\Enums\CommunicationReturnStatus;

return [
    'communication_channels' => [
        CommunicationChannels::MEETING->name => 'Reunião presencial',
        CommunicationChannels::EMAIL->name => 'E-mail',
        CommunicationChannels::PHONE->name => 'Telefone',
        CommunicationChannels::WHATSAPP->name => 'WhatsApp',
    ],
    'communication_return_status' => [
        CommunicationReturnStatus::RESPONSE_PENDING->name => 'Pendente de resposta',
        CommunicationReturnStatus::ANSWERED->name => 'Respondido',
    ],
];
