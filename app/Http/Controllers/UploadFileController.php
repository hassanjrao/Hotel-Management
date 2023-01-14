<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UploadFileController extends Controller
{
    public function store(Request $request){


        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $filename = now()->timestamp . $file->getClientOriginalName();

            $folder = uniqid() . "-" . now()->timestamp;

            $file->storeAs("uploads/temp/$folder", $filename);

            return $folder;
        } else {

            return response()->json([
                "error" => "no file found"
            ], 422);
        }

    }

    public function files(){
        return [
            "http://127.0.0.1:5050/storage/hotels/16736987753_logo.png"
        ];
    }
}
