<?php

namespace App\Repositories;

use App\Models\User;

class UserRepository
{
    /**
     * 取得所有使用者
     * 
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function getUsers()
    {
        return User::all();
    }

    /**
     * 根據id取得使用者
     * 
     * @param int $id
     * @return \App\Models\User
     */
    public function getUser(int $id)
    {
        return User::find($id);
    }

    /**
     * 新增使用者
     * 
     * @param array $params
     * @return \App\Models\User
     */
    public function createUser(array $params)
    {
        return User::create($params);
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
        User::where('id', $id)->update($params);
    }
    
    /**
     * 刪除使用者
     * 
     * @param int $id
     * @return void
     */
    public function deleteUser(int $id)
    {
        User::where('id', $id)->delete();
    }
}
