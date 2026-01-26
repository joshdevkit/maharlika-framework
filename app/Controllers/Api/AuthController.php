<?php

namespace App\Controllers\Api;

use Maharlika\Http\JsonResponse;
use Maharlika\Http\Request;
use Maharlika\Routing\Attributes\ApiRoute;
use Maharlika\Routing\Attributes\HttpPost;
use Maharlika\Routing\Attributes\Middleware;
use Maharlika\Routing\Controller;

#[ApiRoute(prefix: "api/v1/auth/users")]
class AuthController extends Controller
{
    #[Middleware(['api.token'])]
    public function index(Request $request): JsonResponse
    {
        /**
         * @var App\Models\User
         */
        $user = $request->user();

        $tokens = $user->tokens()->get();

        return new JsonResponse([
            'tokens' => $tokens
        ]);
    }

    #[HttpPost("/login")]
    public function login(Request $request): JsonResponse
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (!auth()->attempt($credentials)) {
            return new JsonResponse([
                'message' => 'Invalid credentials'
            ], 401);
        }

        $user = auth()->user();

        $result = $user->createToken('web-api');

        return new JsonResponse([
            'token' => $result['token'],
            'user' => $user,
        ]);
    }

    #[HttpPost("/logout")]
    #[Middleware(['api.token'])]
    public function logout(Request $request): JsonResponse
    {
        /**
         * @var App\Models\User
         */
        $user = $request->user();

        $user->revokeCurrentToken();

        return new JsonResponse([
            'message' => 'Logged out successfully'
        ]);
    }
}
