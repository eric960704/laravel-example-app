<?php

namespace App\Services;

use App\Repositories\UserRepository;

class UserService
{
    public function __construct(
        protected UserRepository $user_repository,
    ) {}

    public function getUsers()
    {
        return $this->user_repository->getUsers();
    }

    public function getUser(int $id)
    {
        return $this->user_repository->getUser($id);
    }

    public function createUser(array $params)
    {
        return $this->user_repository->createUser($params);
    }

    public function updateUser(array $params, int $id)
    {
        return $this->user_repository->updateUser($params, $id);
    }
    
    public function deleteUser(int $id)
    {
        return $this->user_repository->deleteUser($id);
    }
}
