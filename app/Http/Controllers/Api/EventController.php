<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Event;
use Illuminate\Http\Request;

class EventController extends Controller
{
    public function index()
    {
        $results = Event::with("user")->get();
        $data = [
            "success" => true,
            "payload" => $results
        ];
        return response()->json($data);
    }

    public function show($id)
    {

        $result = Event::with(["user", "tags"])->where("id", "=", $id)->first();
        if ($result) {
            $data = [
                "success" => true,
                "payload" => $result
            ];
            return response()->json($data);
        }else{
            $data = [
                "success" => false,
                "payload" => "There isn't an event with this id",
            ];
            return response()->json($data);
        }
    }
}
