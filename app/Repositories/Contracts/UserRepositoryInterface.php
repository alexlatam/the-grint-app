<?php

namespace App\Repositories\Contracts;

use App\Models\User;

interface UserRepositoryInterface
{
    public function getUserByEmail(string $email): ?User;

    public function create(array $data): void;
}
