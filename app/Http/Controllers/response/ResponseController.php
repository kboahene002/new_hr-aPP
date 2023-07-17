<?php

namespace App\Http\Controllers\response;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ResponseController extends Controller
{
    //

    public function response($status , $message , $data){
        return response()->json([
            'status-code' => $status,
            'message' => $message , 
            'data' => $data
        ] , 400);
    }
}
