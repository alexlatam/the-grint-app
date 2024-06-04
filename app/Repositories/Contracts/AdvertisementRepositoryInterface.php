<?php

namespace App\Repositories\Contracts;

interface AdvertisementRepositoryInterface
{
    public function store(int $user_id, array $data): void;
    public function cancel(int $advertisement_id): void;
}
