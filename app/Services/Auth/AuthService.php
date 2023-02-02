<?php

namespace App\Services\Auth;

use App\Interfaces\ExternalAuthInterface;
use Illuminate\Contracts\Container\BindingResolutionException;
use Illuminate\Support\Str;

class AuthService
{
    /**
     * @var ExternalAuthInterface
     */
    public ExternalAuthInterface $externalAuthService;

    /**
     * @throws BindingResolutionException
     */
    public function __construct($login)
    {
        $this->externalAuthService = self::getExternalAuthService($login);
    }

    /**
     * @throws BindingResolutionException
     */
    private function getExternalAuthService($login)
    {
        if (Str::startsWith($login, BarAuthService::LOGIN_PREFIX)) {
            return app()->make(BarAuthService::class);
        } else if (Str::startsWith($login, BazAuthService::LOGIN_PREFIX)) {
            return app()->make(BazAuthService::class);
        } else if (Str::startsWith($login, FooAuthService::LOGIN_PREFIX)) {
            return app()->make(FooAuthService::class);
        }
        return new ErrorAuthService();
    }
}
