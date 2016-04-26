<?php

namespace App\Http\Controllers;

use App\Helper\PageDescription;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Auth;
use Viraj\Hawkeye\Hawkeye;

class AttachmentController extends Controller
{
    public function __construct(Hawkeye $uploader,PageDescription $page){
        $this->uploader = $uploader;
        $this->page = $page;
        $this->middleware('admin',['except' => ['get']]);
    }

    public function get(Request $request){
        $hash = $request->get('hash');
        $hashPath = $this->uploader->generateFullImagePathFor($hash);
        return response()->file($hashPath);
    }

    public function showAllAttachments(){
        $admin = Auth::guard('admin')->user();
        $attachments_image = [];
        foreach($admin->articles()->get() as $article) {
            foreach($article->attachments->all() as $image_url){
                array_push($attachments_image,$this->uploader->generateDirectoryPathFromName($image_url->name));
            }
        }
        dd($attachments_image);
        return view('pages.attachments.attachments-show-all')->with([
            'page' => $this->page->setPage('All Attachment'),
            'attachments' => $attachments_image
        ]);
    }
}
