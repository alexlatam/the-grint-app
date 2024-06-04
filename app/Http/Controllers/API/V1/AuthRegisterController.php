<?php

namespace App\Http\Controllers\API\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\AuthRegisterRequest;
use App\Repositories\Contracts\UserRepositoryInterface;
use Illuminate\Http\JsonResponse;
use Symfony\Component\HttpFoundation\Response;

final class AuthRegisterController extends Controller
{
    function __construct(private readonly UserRepositoryInterface $userRepository) {}

    public function __invoke(AuthRegisterRequest $request): JsonResponse
    {
        $this->userRepository->create($request->all());

        return response()->json([
            'message' => 'User created successfully',
        ], Response::HTTP_CREATED);
    }
}
