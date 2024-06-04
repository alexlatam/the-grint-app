<?php

namespace App\Repositories;

use App\Models\User;
use App\Repositories\Contracts\UserRepositoryInterface;

final class UserEloquentRepository implements UserRepositoryInterface
{
    public function getUserByEmail(string $email): ?User
    {
        return User::where('email', $email)->first();
    }

    public function create(array $data): void
    {
        User::create([
            'name' => $data['name'],
            'lastname' => $data['lastname'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
        ]);
    }

    public function getAuthUserId(): int
    {
        return auth()->id();
    }
}
