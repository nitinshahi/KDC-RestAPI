<?php

namespace App\Http\Controllers\api;

use App\Models\Message;
use App\Http\Controllers\Controller;
use App\Http\Requests\MessageStoreRequest;

class MessageController extends Controller
{
    public function index(){
        //code...
    }

    public function store(MessageStoreRequest $request){
        try 
        {
            Message::create($request);
            return response()->json([
                'status' => "sucess!!",
                'message' => 'Message Added Sucessfully!'
            ],200);
        } catch (\Exception $e) {
            //Return Json Response
            return response()->json([
                'status' => "failed!!",
                'messge' => "Something Went Wrong!!!"
            ],500);
        }
    }

}
