<?php

namespace App\Repositories;

use App\Models\Advertisement;
use App\Repositories\Contracts\AdvertisementRepositoryInterface;

class AdvertisementRepository implements AdvertisementRepositoryInterface
{
    public function store(int $user_id, array $data): void
    {
        Advertisement::create([
            'user_id' => $user_id,
            'category_id' => $data['category_id'],
            'title' => $data['title'],
            'description' => $data['description'],
            'price' => $data['price'],
        ]);
    }
}
