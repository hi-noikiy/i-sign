<?php

namespace App\Repositories;

use App\Models\User;
use Illuminate\Http\Request;

/**
 * Class UserRepository
 * @package App\Repositories
 */
class UserRepository {


    /**
     * @return \Illuminate\Database\Eloquent\Collection|static[]
     */
    public function fetchUsers()
    {
        return User::where('role_level', '<', 9)->get();
    }

    /**
     * @param $id
     * @return mixed
     */
    public function fetchUser($id)
    {
        return User::find($id);
    }

    public function store(array $data=[])
    {
        $data = array_merge($data, ['password' => \Hash::make($data['mobile'])]);
        return User::create($data) ?: false;
    }
    
    /**
     * @return bool|mixed
     */
    public function updateUserInfo(array $userInfoArray=[])
    {
        $model = User::find($userInfoArray['id']);
        $model->fill($userInfoArray);
        $model->save();

        if ($model->save()) {
            return $model;
        } else {
            return false;
        }
    }

}