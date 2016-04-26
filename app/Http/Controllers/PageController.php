<?php

namespace App\Http\Controllers;

use App\Helper\NavigationStatus;
use App\Helper\PageDescription;
use Illuminate\Http\Request;

use App\Http\Requests;

class PageController extends Controller
{

    public function __construct(PageDescription $page){
        $this->page = $page;
    }

    public function home(){
        return view('pages.home')->with('page',$this->page->setPage('Klikacara.com - your events partner'));
    }

    public function about(){
        return view('pages.about')->with('page',$this->page->setPage('Tentang klikacara.com'));
    }

    public function contact(){
        return view('pages.contact')->with('page',$this->page->setPage('Kontak kami'));

    }

    public function events(){
        return view('pages.events')->with('page',$this->page->setPage('Cari Events'));
    }


    public function events_show($event){
        return view('pages.events-show')->with('page',$this->page->setPage('Young On Top National Conference 2016'));

    }

    public function services(){
        return view('pages.services')->with('page',$this->page->setPage('Pelayanan Kami'));
    }

    public function order(){
        return view('pages.events-show')->with('page',$this->page->setPage('Cara order'));
    }

    public function getPageDescription(){
        return $this->page;
    }
}
