<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\Auth\LoginRequest;
use App\Http\Resources\UserResource;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Hash;

/**
 * Class LoginController
 * @package App\Http\Controllers\Api
 */
class LoginController extends Controller
{
    /**
     * @param LoginRequest $request
     * @return UserResource|JsonResponse
     */
    public function login(LoginRequest $request)
    {
        $user = User::where('email', $request['email'])->first();

        if (!$user or !Hash::check($request['password'], $user->password)) {
            return response()->json(['error' => __('auth.failed')], 401);
        }

        return (new UserResource($user))->additional([
            'token' => $user->createToken('jumia')->plainTextToken
        ]);
    }
}
