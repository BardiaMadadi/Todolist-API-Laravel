<?php

namespace App\Http\Controllers;

use App\Models\Row;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;


class RowController extends Controller
{
    public function add(Request $request)
    {

        try {

            $validator = Validator::make($request->route()->parameters(), [
                'title' => 'String|max:50|required',
                'id' => 'Int|exists:columns|required',
            ]);
            if (!$validator->fails()) {
                $title = $request['title'];
                $column_id = $request['id'];


                try {

                    $row = new Row();
                    $row->title = $title;
                    $row->column_id = $column_id;
                    $row->saveOrFail();

                    return response(['message' => "Row added !"], 200);

                } catch (Exception $exception) {
                    return response(['message' => "cant insert Row !"], 400);

                }


            } else {
                return response(['message' => 'cant validate inputs !'], 400);
            }

        } catch (Exception $exception) {
            return response(["message" => $exception], 400);
        }

    }

    public function get(Request $request)
    {
        $id = $request['id'];
        $column_id = $request['columnid'];


        if (isset($id)) {
            $row = Row::find($id);
            if ($row != null) {
                return $row;
            } else {
                return response(["message" => "there is not any response with that id"], 400);
            }
        } elseif (isset($column_id)) {
            $row = Row::where('column_id', $column_id)->get();
            if (count($row) > 0) {
                return $row;
            } else {
                return response(["message" => "there is not any response with that id"], 400);
            }
        } else {
            $row = Row::all();
            if (count($row) > 0) {
                return $row;
            } else {
                return response(["message" => "there is not any response"], 400);
            }
        }


    }

}
