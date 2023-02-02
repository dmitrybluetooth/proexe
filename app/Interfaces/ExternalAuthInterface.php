<?php

namespace App\Interfaces;

interface ExternalAuthInterface
{
    public function doLogin(string $login, string $password): bool;
}
