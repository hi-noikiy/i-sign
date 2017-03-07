<?php

namespace App\Http\Controllers\Admin\Api;

use App\Models\Bus;
use App\Models\User;
use App\Services\BusUserService;
use App\Transformers\BusTransformer;
use App\Transformers\UserTransformer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class BusController extends ApiController
{

    protected $busUserService;

    public function __construct(BusUserService $busUserService)
    {
        $this->busUserService = $busUserService;
    }

    public function index()
    {
        \Log::alert(Bus::all());
        return $this->responseJsonWithData(Bus::all(), new BusTransformer());
    }

    public function show()
    {

    }

    public function edit()
    {

    }

    public function showBusSignUsers(Request $request)
    {
        $users = Bus::find($request->get('id'))->users()->orderBy('id', 'desc')->get();
        $res = $this->responseJsonWithData($users, new UserTransformer());
        return $res;
    }

    public function store()
    {
        
    }

    public function update()
    {
        
    }


    /**
     * 班车签到 号车
     * @return \Illuminate\Http\JsonResponse|int
     */
    public function userSignByBus(Request $request)
    {

        $params = $request->get('params');
        $res = $this->busUserService->userSignByBus();
        if ($res === -1) {
            Log::alert($res);
            return $this->responseWithError('用户不存在');
        } else if($res === 0) {

            return $this->responseWithError('用户mobile='. $params['mobile'] .'已签过到');
        } else {

            if ($res) {
                return $this->responseWithArray(['msg' => '签到成功']);
            } else {
                return $this->responseWithArray(['msg' => '签到失败']);
            }
        }
    }


}
