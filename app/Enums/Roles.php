<?php

namespace App\Enums;

enum Roles: string
{
    case ADMIN = 'Administrador';

    case MANAGER = 'Gestor';

    case TEACHER = 'Professor';

    case TUTOR = 'Tutor';
}
