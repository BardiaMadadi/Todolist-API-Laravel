<?php

namespace App\Http\Controllers;

use App\Models\Column;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;


class ColumnController extends Controller
{
    public function add(Request $request)
    {

        try {

            $validator = Validator::make($request->route()->parameters(), [
                'title' => 'String|max:20|required',
                'desc' => 'String|max:255|required',
                'id' => 'String|max:20|exists:users|required'

            ]);
            if (!$validator->fails()) {
                $title = $request['title'];
                $desc = $request['desc'];
                $userId = $request['id'];

                try {

                    $column = new Column();
                    $column->user_id = $userId;
                    $column->title = $title;
                    $column->desc = $desc;
                    $column->saveOrFail();

                    return response(['message' => "Column added !"], 200);

                } catch (Exception $exception) {
                    return response(['message' => "cant insert column !"], 400);

                }


            } else {
                return response(['message' => 'cant validate inputs !'], 400);
            }

        } catch (Exception $exception) {
            return response(["message" => $exception], 400);
        }

    }
}
