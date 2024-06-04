<?php

namespace App\Http\Controllers\API\V1\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\AuthLoginRequest;
use App\Http\Resources\UserResource;
use App\Models\User;
use App\Repositories\Contracts\UserRepositoryInterface;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;
use Symfony\Component\HttpFoundation\Response;

final class AuthLoginController extends Controller
{
    function __construct(private readonly UserRepositoryInterface $userRepository) {}

    public function __invoke(AuthLoginRequest $request): JsonResponse
    {
        $user = $this->userRepository->getUserByEmail($request->email);

        $this->validatePassword($user, $request->password);
        $token = $user->createToken($request->email)->plainTextToken;

        return UserResource::make($user)->additional([
            'access_token' => $token,
            'token_type' => 'Bearer'
        ])->response()->setStatusCode(Response::HTTP_OK);
    }

    private function validatePassword(?User $user, string $password): void
    {
        if (!$user || !Hash::check($password, $user->password)) {
            throw ValidationException::withMessages([
                'email' => ['The provided credentials are incorrect.'],
            ]);
        }
    }
}
