<?php

declare(strict_types=1);

namespace App\Enum;

enum CommentStatusEnum: string
{
    case ACTIVE = 'active';
    case WAITING = 'waiting';
    case REJECTED = 'rejected';
}
