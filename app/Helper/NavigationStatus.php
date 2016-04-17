<?php
/**
 * Created by PhpStorm.
 * User: Rizqy
 * Date: 4/17/2016
 * Time: 11:50 AM
 */

namespace App\Helper;


class NavigationStatus
{
    private $navigation_state = [
        'home'  => false,
        'service'   => false,
        'order'     => false,
        'events'    => false,
        'about'     => false,
        'contact'   => false
    ];

    public function setStateActive($key){
        $this->navigation_state[$key] = 'active';
        return $this->navigation_state;
    }

    public function getStatus(){
        return $this->navigation_state;
    }
}