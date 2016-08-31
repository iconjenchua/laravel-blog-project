<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Post;
use App\User;

class BlogController extends Controller
{
    public function homepage() {
        
        // get the blog posts
        $posts = Post::with('Author')->paginate(10);
        
        $this->data['page_title'] = PAGE_TITLE . 'Home Page';
        
        return view('main', $this->data);
    }
}
