<?php

namespace App\Repositories\User;

use App\Models\User;

class EloquentUserRepository implements UserRepositoryInterface
{
    public function create(array $params): User
    {
        $user = new User($params);
        $user->save();
        return $user;
    }
}
