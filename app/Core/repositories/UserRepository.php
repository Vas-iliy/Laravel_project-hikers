<?php

namespace App\Core\repositories;

use App\Models\User;

class UserRepository
{
    public function getId($id)
    {
        return User::query()->where('id', $id)->first();
    }

    public function getAll()
    {
        return User::query()->orderBy('id', 'desc')->paginate(env('PAGINATE'));
    }
}
