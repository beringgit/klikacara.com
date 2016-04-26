<?php

namespace App\Http\Controllers;

use App\Helper\PageDescription;
use Illuminate\Http\Request;

use App\Http\Requests;

class DashboardController extends Controller
{

    public function __construct(PageDescription $page){
        $this->page = $page;
    }


    public function home(){
        return view('pages.dashboard.home')->with([
            'page' => $this->page->setPage('Dash board')
        ]);
    }
}
