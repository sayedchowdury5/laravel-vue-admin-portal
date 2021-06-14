<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\fileUpload;
use Validator;

class FileUploadController extends Controller
{
    public function upload(Request $request){

      $validator = Validator::make($request->all(),[
              'file' => 'required|mimes:doc,docx,pdf,txt,csv,jpeg,png|max:2048',
      ]);
      if($validator->fails()) {
            return response()->json(['error'=>$validator->errors()], 401);
      }
      
      if ($file = $request->file('file')) {
            $path = $file->store('public/files');
            $name = $file->getClientOriginalName();

            //store your file into directory and db
            $save = new fileUpload();
            $save->user_name = $request->user_name;
            $save->name = $file;
            $save->path= $path;
            $save->save();

            return response()->json([
                "success" => true,
                "message" => "Upload successfully",
                "file" => $file
            ]);

        }
    }

}
