<?php

namespace App\Services;

use App\Repositories\UserRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BusUserService {


    protected $userRepository;
    protected $request;
    public function __construct(UserRepository $userRepository, Request $request)
    {
        $this->userRepository = $userRepository;
        $this->request = $request;
    }

    /**
     * @return int
     */
    public function userSignByBus()
    {
        /**
         * array (
        'params' =>
        array (
        'mobile' => '18916550105',
        'busId' => 11,
        ),
        )
         */
        $params = $this->request->get('params');
        $user = $this->userRepository->fetchUserByMobile($params['mobile']);
        if (!$user) {
            //用户不存在
            return -1;
        }


        $res = DB::table('bus_user')->where('user_id', $user->id)->get();
        if (count($res) > 0) {
            //用户已签过到
            return 0;
        }

        return DB::table('bus_user')->insert(['bus_id' => $params['busId'], 'user_id' => $user->id]);

    }

}