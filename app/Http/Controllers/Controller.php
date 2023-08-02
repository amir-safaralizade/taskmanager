<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    protected function suucessResponce($code , $data , $message=null){
        return response()->json([
            'status' => 'success',
            'message' => $message,
            'data' => $data,
        ],$code);
    }


    protected function failResponce($code , $message=null){
        return response()->json([
            'status' => 'fails',
            'message' => $message,
        ],$code);
    }


}
