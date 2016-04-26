<?php
/**
 * Created by PhpStorm.
 * User: Rizqy
 * Date: 4/17/2016
 * Time: 11:53 AM
 */

namespace App\Helper;


class PageDescription
{

    public function __construct(NavigationStatus $status){
        $this->status = $status;
    }

    private $page = [
        'title'         => '',
        'description'   => 'Klikacara.com merupakan sebuah website',
        'author'        => 'Fukicorp.id',
        'keyword'       => 'klikacara.com, event, mediapartners',
//        'status'        => null
    ];

    public function setPage($title){
        $this->page['title']    = $title;
//        $this->page['status'] = $this->status->setStateActive($active_key);
        return $this->page;
    }

    public function getPageData(){
        return $this->page;
    }
}