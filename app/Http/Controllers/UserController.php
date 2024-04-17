<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use App\Services\UserService;
use App\Transformers\UserTransformer;

class UserController extends Controller
{
    public function __construct(
        protected UserService $user_service,
        protected UserTransformer $user_transformer,
    ) {}

    public function getUsers()
    {
        $users = $this->user_service->getUsers();

        return $this->user_transformer->transformUsers($users);
    }

    public function getUser(int $id)
    {
        $user = $this->user_service->getUser($id);

        return $this->user_transformer->transformUser($user);
    }

    public function createUser(UserRequest $request)
    {
        return $this->user_service->createUser($request->all());
    }

    public function updateUser(UserRequest $request, string $id)
    {
        return $this->user_service->updateUser($request->all(), $id);
    }

    public function deleteUser(int $id)
    {
        $this->user_service->deleteUser($id);

        return response()->json(['success']);
    }
}
