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
            $validator = Validator::make($request->route()->parameters(), [
                'username' => 'String|max:20|required',
                'pwd' => 'String|max:40|required',
                'email' => 'required|email|unique:users'

            ]);

            if (!$validator->fails()) {
                User::create(
                    [
                        'username' => $request['username'],
                        'pwd' => $request['pwd'],
                        'email' => $request['email']
                    ]
                );
                return response(['message' => "User Added !"], 200);

            } else {
                return response(['message' => "Cant Validate request !"], 400);
            }

        } catch (Exception $exception) {

            return response(['message' => "there is problem with Database / Controller"], 400);

        }


    }

    public function get(Request $request)
    {
        try {

            $id = $request['id'];
            if (isset($id)) {

                try {

                    $user = User::find($id);

                    if ($user != null) {
                        return $user;

                    } else {
                        return response(['message' => 'There is not any User with that id'], 400);
                    }


                } catch (Exception $exception) {
                    return response(['message' => 'cant get user from table !'], 400);
                }


            } else {

                try {
                    $user = User::all();
                    if ($user != null) {
                        return User::all();
                    } else {
                        return response(['message' => 'There is not any User with that id'], 400);
                    }

                } catch (Exception $exception) {
                    return response(['message' => 'cant get all users from table !'], 400);
                }

            }
        } catch (Exception $exception) {
            return response(['message' => 'There is problem with controler / db'], 400);
        }

    }

    public function update(Request $request)
    {
        $id = $request['id'];
        $username = $request['username'];
        $pwd = $request['pwd'];
        $email = $request['email'];


        $validator = Validator::make($request->all(), [
            'id' => 'max:20|exists:users|required',
            'username' => 'String|max:20|required',
            'pwd' => 'String|max:40|required',
            'email' => 'email|required'

        ]);
        if (!$validator->fails()) {
            $user = User::find($id);
            if ($user != null) {
                $user->username = $username;
                $user->pwd = $pwd;
                $user->email = $email;

                $user->saveOrFail();
                return response(["message" => " user updated !"], 200);
            } else {
                return response(["message" => "there is not any response with that id"], 400);
            }
        } else {
            return response(["message" => "there is not any response with inserted data"], 400);

        }

    }

}
