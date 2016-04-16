<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class PageController extends Controller
{

    public $navigation_status = [
        'home'  => false,
        'service'   => false,
        'order'     => false,
        'events'    => false,
        'about'     => false,
        'contact'   => false
    ];

    public $page = [
        'description'   => 'Klikacara.com merupakan sebuah website',
        'author'        => 'Fukicorp.id',
        'keyword'       => 'klikacara.com, event, mediapartners'
    ];

    public function home(){
        $this->navigation_status['home'] = 'active';
        $data_responses = [
            'url' => '',
            'title' => 'Klikacara.com - your event partners',
            'description' => $this->page['description'],
            'author' => $this->page['author'],
            'keyword' => $this->page['keyword'],
            'status' => $this->navigation_status,
        ];
        return view('pages.home')->with($data_responses);
    }

    public function about(){
        $this->navigation_status['about'] = 'active';
        return view('pages.about')->with([
            'url'   => 'about',
            'title' => 'Tentang klikacara.com',
            'description' => $this->page['description'],
            'author'      => $this->page['author'],
            'keyword'     => $this->page['keyword'],
            'status'      => $this->navigation_status
        ]);
    }

    public function contact(){
        $this->navigation_status['contact'] = 'active';
        return view('pages.contact')->with([
            'url'   => 'contact',
            'title' => 'Kontak klikacara.com',
            'description' => $this->page['description'],
            'author'      => $this->page['author'],
            'keyword'     => $this->page['keyword'],
            'status'      => $this->navigation_status
        ]);
    }

    public function events(){
        $this->navigation_status['events'] = 'active';
        return view('pages.events')->with([
            'url'   => 'events',
            'title' => 'Cari Events',
            'description' => $this->page['description'],
            'author'      => $this->page['author'],
            'keyword'     => $this->page['keyword'],
            'status'      => $this->navigation_status,
        ]);
    }

    public function events_show($event){
        $this->navigation_status['events'] = 'active';
        return view('pages.events-show')->with([
            'url'   => 'events/'.$event,
            'title' => 'Young On Top National Conference 2016',
            'description' => $this->page['description'],
            'author'      => $this->page['author'],
            'keyword'     => $this->page['keyword'],
            'status'      => $this->navigation_status
        ]);
    }

    public function services(){
        $this->navigation_status['service'] = 'active';
        return view('pages.services')->with([
            'url'   => 'services',
            'title' => 'Pelayanan Kami',
            'description' => $this->page['description'],
            'author'      => $this->page['author'],
            'keyword'     => $this->page['keyword'],
            'status'      => $this->navigation_status
        ]);
    }

    public function order(){
        $this->navigation_status['events'] = 'active';
        return view('pages.base-page')->with([
            'url'   => 'order',
            'title' => 'Cara Order',
            'description' => $this->page['description'],
            'author'      => $this->page['author'],
            'keyword'     => $this->page['keyword'],
            'status'      => $this->navigation_status
        ]);
    }
}
