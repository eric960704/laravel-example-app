<?php

namespace App\Transformers;

use App\Models\User;
use Illuminate\Support\Collection;

class UserTransformer
{
    public function transformUsers(Collection $users)
    {
        return $users->transform(function (User $user) {
            return $this->transformUser($user);
        });
    }

    public function transformUser(User $user)
    {
        return [
            'name' => $user->name,
            'email' => $user->email,
        ];
    }
}
