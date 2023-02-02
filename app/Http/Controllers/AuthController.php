<?php

namespace App\Http\Controllers;

use App\Services\Auth\AuthService;
use App\Services\Auth\JwtService;
use Illuminate\Contracts\Container\BindingResolutionException;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;
use Symfony\Component\HttpFoundation\JsonResponse;

class AuthController extends Controller
{
    /**
     * @param Request $request
     *
     * @return JsonResponse
     * @throws BindingResolutionException
     * @throws ValidationException
     */
    public function login(Request $request): JsonResponse
    {
        $this->validate($request, [
            'login' => 'required|string|max:255',
            'password' => 'required|min:1',
        ]);

        $login = $request->input('login', '');

        $AuthService= new AuthService($login);

        if ($AuthService->externalAuthService->doLogin($login, $request->input('password'))) {
            $system = rtrim($AuthService->externalAuthService::LOGIN_PREFIX, '_');
            return response()->json([
                'status' => 'success',
                'token' => (new JwtService())->createToken($login, $system),
            ]);
        }

        return response()->json([
            'status' => 'failure',
        ]);
    }
}
