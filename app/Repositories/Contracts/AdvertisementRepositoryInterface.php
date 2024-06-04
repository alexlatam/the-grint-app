<?php

namespace App\Repositories\Contracts;

interface AdvertisementRepositoryInterface
{
    public function store(int $user_id, array $data): void;
}
