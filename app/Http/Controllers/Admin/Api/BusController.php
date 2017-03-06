<?php

namespace App\Http\Controllers\Admin\Api;

use App\Models\Bus;
use App\Transformers\BusTransformer;
use App\Transformers\UserTransformer;
use Illuminate\Http\Request;

class BusController extends ApiController
{

    public function index()
    {
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
        return $this->responseJsonWithData(Bus::find($request->get('id'))->users()->orderBy('id', 'desc')->get(), new UserTransformer());
    }

    public function store()
    {
        
    }

    public function update()
    {
        
    }


    public function userSignByBus(Request $request)
    {
        \Log::alert($request);
    }


}
