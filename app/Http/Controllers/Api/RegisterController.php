<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\Auth\RegisterRequest;
use App\Http\Resources\UserResource;
use App\Models\User;

/**
 * Class RegisterController
 * @package App\Http\Controllers\Api
 */
class RegisterController extends Controller
{
    /**
     * @param RegisterRequest $request
     * @return UserResource
     */
    public function register(RegisterRequest $request)
    {
        $user = User::create($request->validated());

        return (new UserResource($user))->additional([
            'token' => $user->createToken('jumia')->plainTextToken
        ]);
    }
}
