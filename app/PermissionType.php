<?php

namespace App\Enums;

enum PermissionType: int
{
    case ACCOUNT = 0;
    case POST = 1;

    public static function values(): array
    {
        return [
            self::ACCOUNT->value => 'Account',
            self::POST->value => 'Post',
        ];
    }
}