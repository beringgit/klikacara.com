<?php

namespace App\Http\Controllers;

use App\Helper\PageDescription;
use Illuminate\Http\Request;

use App\Http\Requests;

class AdminController extends Controller
{
    //

    public function __construct(PageDescription $page){
        $this->middleware('admin');
        $this->page = $page;
    }

    public function index(){
        return 'admin';
    }

    public function login(){
        dd('sasasasas');
        return view('pages.admin.auth.login')->with('page',$this->page->setPage('Login',''));
    }
}
