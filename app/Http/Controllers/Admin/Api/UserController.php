<?php

namespace App\Http\Controllers\Admin\Api;

use App\Services\UserService;
use App\Transformers\UserTransformer;
use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;

class UserController extends ApiController
{
    /**
     * @var UserService
     */
    protected $userService;

    /**
     * UserController constructor.
     * @param UserService $userService
     */
    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }


    /**
     * @return \Illuminate\Http\JsonResponse
     */
    public function fetchUsers()
    {
        $users = $this->userService->fetchUsers();
        return $this->responseJsonWithData($users, new UserTransformer());
    }


    /**
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function fetchUser($id)
    {
        $user = $this->userService->fetchUser($id);
        return $this->responseJsonWithData($user, new UserTransformer());
    }

    /**
     * @return \Illuminate\Http\JsonResponse
     */
    public function fetchMe()
    {
        return $this->responseJsonWithData(Auth::user(), new UserTransformer());
    }


    public function store(Request $request)
    {

        $this->validate($request, [
            'user.name' => 'required',
            'user.mobile' => 'required',
            'user.sex' => 'required',
            'user.company' => 'required',
            'user.position' => 'required'
        ]);
        $user = $this->userService->storeUser();
        return $this->responseJsonWithData($user, new UserTransformer());
    }
    
    /**
     * @return \Illuminate\Http\JsonResponse
     */
    public function update() {

        $res = $this->userService->updateUser();
        if ($res) {

            return $this->responseJsonWithData($res, new UserTransformer());
        } else {

            return $this->responseWithError('修改用户信息失败！');
        }
    }

}
