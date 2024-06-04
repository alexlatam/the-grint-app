<?php

namespace App\Http\Controllers\API\V1\Advertisement;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreAdvertisementRequest;
use App\Repositories\Contracts\AdvertisementRepositoryInterface;
use App\Repositories\Contracts\UserRepositoryInterface;
use Illuminate\Http\JsonResponse;

final class StoreAdvertisementController extends Controller
{
    function __construct(
        private readonly AdvertisementRepositoryInterface $advertisementRepository,
        private readonly UserRepositoryInterface $userRepository
    ) {}

    public function __invoke(StoreAdvertisementRequest $request): JsonResponse
    {
        $user_id = $this->userRepository->getAuthUserId();
        $this->advertisementRepository->store($user_id, $request->all());

        return response()->json([
            'message' => 'Advertisement created successfully',
        ], 201);
    }
}
