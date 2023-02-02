<?php

namespace App\Services\Auth;

use App\Interfaces\ExternalAuthInterface;
use External\Bar\Auth\LoginService;

class BarAuthService extends LoginService implements ExternalAuthInterface
{
    public const LOGIN_PREFIX = 'BAR_';

    public function doLogin(string $login, string $password): bool
    {
        return $this->login($login, $password);
    }
}
