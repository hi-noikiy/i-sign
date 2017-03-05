<?php

namespace App\Http\Controllers\Admin\Api;

use App\Models\User;
use Cyvelnet\Laravel5Fractal\Facades\Fractal;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Response;
use League\Fractal\Pagination\PagerfantaPaginatorAdapter;

class ApiController extends Controller
{

    private $state = 200;

    /**
     * 未登录，禁止访问
     */
    const CODE_UN_AUTHENTICATION = 'FORBIDDEN_UN_AUTHENTICATION';

    /**
     * 未授权
     */
    const CODE_UNAUTHORIZED = 'USER_UNAUTHORIZED';


    /*
     * 未知请求
     */
    const CODE_UN_KNOW_REQUEST = 'UN_KNOW_REQUEST';

    /*
     * 失败
     */
    const CODE_ERROR = 'ERROR';

    /**
     * @return mixed
     */
    public function getState()
    {
        return $this->state;
    }

    /**
     * @param mixed $state
     * @return $this
     */
    public function setState($state)
    {
        $this->state = $state;
        return $this;
    }

    /**
     * @param $data
     * @param $transformer
     * @param array $includes
     * @return \Illuminate\Http\JsonResponse
     */
    public function responseJsonWithData($data, $transformer, $includes=[])
    {

        if (!\Auth::user()) {
            //未登录
            return $this->responseWithUnAuthentication();

        } elseif (\Auth::user()->role_level != 9) {
            //未授权
            return $this->responseWithUnauthorized();

        } elseif ($data instanceof Model) {
            //请求单个模型

            return $this->responseWithItem($data, $transformer, $includes);

        } elseif ($data instanceof Collection || $data instanceof PagerfantaPaginatorAdapter) {
            //请求模型集合
            return $this->responseWithCollection($data, $transformer, $includes);

        } else {
            //未知请求
            return $this->errorInternetError();
        }
    }


    public function errorInternetError($message = 'Internet error!')
    {
        return $this->setState(500)->responseWithError($message, self::CODE_UN_KNOW_REQUEST);
    }

    /**
     * @param $data
     * @param $transformer
     * @param array $includes
     * @return \Cyvelnet\Laravel5Fractal\Adapters\ScopeDataAdapter|\Illuminate\Contracts\Routing\ResponseFactory|\Symfony\Component\HttpFoundation\Response
     * @internal param null $resourceKey
     */
    protected function responseWithItem($data, $transformer, $includes = [])
    {
        return Fractal::includes($includes)->item($data, $transformer)->responseJson();
    }

    protected function responseWithCollection($data, $transformer, $includes = []) {
        return Fractal::includes($includes)->collection($data, $transformer)->responseJson();
    }

    /**
     * @param string $msg
     * @return \Illuminate\Http\JsonResponse
     */
    public function responseWithUnAuthentication($msg = '未登录,请登录之后再试')
    {
        return $this->setState('403')->responseWithError($msg , static::CODE_UN_AUTHENTICATION);
    }

    /**
     * @param string $msg
     * @return \Illuminate\Http\JsonResponse
     */
    public function responseWithUnauthorized($msg = '未授权，请联系管理员之后再试') {
        return $this->setState('401')->responseWithError($msg , static::CODE_UNAUTHORIZED);
    }


    /**
     * @param $message
     * @param $errorCode
     * @return \Illuminate\Http\JsonResponse
     */
    public function responseWithError($message, $errorCode = self::CODE_ERROR) {
        return $this->responseWithArray([
            'error' => [
                'code' => $errorCode,
                'http_code' => $this->state,
                'message' => $message
            ]
        ]);
    }


    /**
     * @param array $array
     * @param array $header
     * @return \Illuminate\Http\JsonResponse
     */
    protected function responseWithArray(array $array, array $header=[]) {

        return Response::json($array, $this->state, $header);
    }
}
