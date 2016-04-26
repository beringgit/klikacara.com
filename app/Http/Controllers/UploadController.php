<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Auth;
use Viraj\Hawkeye\Hawkeye;

class UploadController extends Controller
{
    //

    public function __construct(Hawkeye $uploader){
        $this->uploader = $uploader;
        $this->middleware('auth');
    }
    public function upload(){
        return view('pages.upload');
    }

    public function uploadPost(Request $request){
        dd($request->allFiles());
        $upload = $this->uploader->upload('fileUpload')->resize()->get();
        dd($upload);
    }
}
