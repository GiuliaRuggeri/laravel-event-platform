<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Tag;
use Illuminate\Http\Request;

class TagController extends Controller
{
    public function index()
    {
        $results = Tag::with(["events"])->get();
        $data = [
            "success" => true,
            "payload" => $results
        ];
        return response()->json($data);
    }

    public function show($id)
    {

        $result = Tag::with(["events"])->find($id);
        if ($result) {
            $data = [
                "success" => true,
                "payload" => $result
            ];
            return response()->json($data);
        }else{
            $data = [
                "success" => false,
                "payload" => "No tags available",
            ];
            return response()->json($data);
        }
    }
}
