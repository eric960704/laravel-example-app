<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use App\Services\UserService;
use App\Transformers\UserTransformer;
use Illuminate\Http\Response;

class UserController extends Controller
{
    public function __construct(
        protected UserService $user_service,
        protected UserTransformer $user_transformer,
    ) {}

    /**
     * 取得所有使用者
     * 
     * @return Response
     */
    public function getUsers()
    {
        $users = $this->user_service->getUsers();

        return $this->user_transformer->transformUsers($users);
    }

    /**
     * 取得單一使用者
     * 
     * @param  int  $id
     * @return Response
     */
    public function getUser(int $id)
    {
        $user = $this->user_service->getUser($id);

        return $this->user_transformer->transformUser($user);
    }

    /**
     * 新增使用者
     * 
     * @param  UserRequest  $request
     * @return Response
     */
    public function createUser(UserRequest $request)
    {
        return $this->user_service->createUser($request->all());
    }

    /**
     * 更新使用者
     * 
     * @param  UserRequest  $request
     * @param  int  $id
     * @return Response
     */
    public function updateUser(UserRequest $request, string $id)
    {
        $this->user_service->updateUser($request->all(), $id);

        return response()->json(['success']);
    }

    /**
     * 刪除使用者
     * 
     * @param  int  $id
     * @return Response
     */
    public function deleteUser(int $id)
    {
        $this->user_service->deleteUser($id);

        return response()->json(['success']);
    }
}
