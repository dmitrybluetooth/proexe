<?php

namespace App\Services\Auth;

use App\Interfaces\ExternalAuthInterface;

class ErrorAuthService implements ExternalAuthInterface
{
    public const LOGIN_PREFIX = 'Error';

    public function doLogin(string $login, string $password): bool
    {
        return false;
    }
}
