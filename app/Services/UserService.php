<?php

namespace App\Services;

use App\Repositories\UserRepository;
use Illuminate\Database\Eloquent\Collection;
use App\Models\User;

class UserService
{
    public function __construct(
        protected UserRepository $user_repository,
    ) {}

    /**
     * 取得所有使用者
     * 
     * @return Collection
     */
    public function getUsers()
    {
        return $this->user_repository->getUsers();
    }

    /**
     * 取得使用者
     * 
     * @param int $id
     * @return User
     */
    public function getUser(int $id)
    {
        return $this->user_repository->getUser($id);
    }

    /**
     * 建立使用者
     * 
     * @param array $params
     * @return Collection
     */
    public function createUser(array $params)
    {
        return $this->user_repository->createUser($params);
    }

    /**
     * 更新使用者
     * 
     * @param array $params
     * @param int $id
     * @return void
     */
    public function updateUser(array $params, int $id)
    {
        $this->user_repository->updateUser($params, $id);
    }
    
    /**
     * 刪除使用者
     * 
     * @param int $id
     * @return void
     */
    public function deleteUser(int $id)
    {
        $this->user_repository->deleteUser($id);
    }
}
