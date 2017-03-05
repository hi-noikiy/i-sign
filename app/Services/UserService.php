<?php

namespace App\Services;

use App\Repositories\UserRepository;
use Illuminate\Http\Request;

/**
 * Class UserService
 * @package App\Services
 */
class UserService {

    /**
     * @var UserRepository
     */
    protected $userRepository;

    protected $request;
    /**
     * UserService constructor.
     */
    public function __construct(UserRepository $userRepository, Request $request)
    {
        $this->userRepository = $userRepository;
        $this->request = $request;
    }


    /**
     * @return \Illuminate\Database\Eloquent\Collection|static[]
     */
    public function fetchUsers()
    {
        return $this->userRepository->fetchUsers();
    }

    /**
     * @param $id
     * @return mixed
     */
    public function fetchUser($id)
    {
        return $this->userRepository->fetchUser($id);
    }

    public function storeUser()
    {
        $data = $this->request->get('user');
        return $this->userRepository->store($data);
    }

    /**
     * @return bool|mixed
     */
    public function updateUser()
    {
        return $this->userRepository->updateUserInfo($this->request->get('user'));
    }

}