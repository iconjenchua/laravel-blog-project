<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesResources;

class Controller extends BaseController
{
    use AuthorizesRequests, AuthorizesResources, DispatchesJobs, ValidatesRequests;
    
    public $data;
    
    public function __construct() {
        if( ! defined('SITE_TITLE') ) define('SITE_TITLE', 'Laravel Blog');
        if( ! defined('PAGE_TITLE') ) define('PAGE_TITLE', ' :: Laravel Blog');
    }
}
