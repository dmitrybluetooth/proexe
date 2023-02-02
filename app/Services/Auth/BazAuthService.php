<?php

namespace App\Services\Auth;

use App\Interfaces\ExternalAuthInterface;
use External\Baz\Auth\Authenticator;
use External\Baz\Auth\Responses\Success;

class BazAuthService extends Authenticator implements ExternalAuthInterface
{
    public const LOGIN_PREFIX = 'BAZ_';

    public function doLogin(string $login, string $password): bool
    {
        return $this->auth($login, $password) instanceof Success;
    }
}
