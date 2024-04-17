<?php

namespace App\Repositories;

use App\Models\User;

class UserRepository
{
    public function getUsers()
    {
        return User::all();
    }

    public function getUser(int $id)
    {
        return User::find($id);
    }

    public function createUser(array $params)
    {
        return User::create($params);
    }

    public function updateUser(array $params, int $id)
    {
        return User::where('id', $id)->update($params);
    }
    
    public function deleteUser(int $id)
    {
        return User::where('id', $id)->delete();
    }
}
