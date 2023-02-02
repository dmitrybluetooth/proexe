<?php

namespace App\Services\Auth;

use App\Interfaces\ExternalAuthInterface;
use External\Foo\Auth\AuthWS;
use External\Foo\Exceptions\AuthenticationFailedException;

class FooAuthService extends AuthWS implements ExternalAuthInterface
{
    public const LOGIN_PREFIX = 'FOO_';

    public function doLogin(string $login, string $password): bool
    {
        try {
            $this->authenticate($login, $password);
        } catch (AuthenticationFailedException $e) {
            return false;
        }

        return true;
    }
}
