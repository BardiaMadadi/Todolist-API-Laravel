<?php

namespace App\Http\Controllers;

use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;


class UserController extends Controller
{

    public function add(Request $request)
    {

        try {
            $validator = Validator::make($request->all(), [
                'username'=>'String|max:20|required',
                'pwd'=> 'String|max:40|required',
                'email'=> 'required|email|unique:users'

            ]);

            if(!$validator->fails()){
                User::create(
                    [
                        'username'=>$request['username'],
                        'pwd'=>$request['pwd'],
                        'email'=> $request['email']
                    ]
                );
                return response(['message'=>"User Added !"],200);

            }else{
                return response(['message'=>"Cant Validate request !"],400);
            }

        } catch (Exception $exception) {

            return response(['message'=>"there is problem with Database / Controller"],400);

        }


    }


}
