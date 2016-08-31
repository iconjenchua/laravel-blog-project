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
        $posts = Post::with('Author')->orderBy('published_at', 'DESC')->paginate(5);
        
        $this->data['posts'] = $posts;
        $this->data['page_title'] = PAGE_TITLE . 'Home Page';
        
        return view('home', $this->data);
    }
    
    public function show($id) {
        // get the post by post id
        $post = Post::whereId($id)->with('Author')->first();
        
        // get related posts
        $related_posts = Post::where('id', '!=', $post->id)->with('Author')->limit(3)->inRandomOrder()->get();
        
        $this->data['page_title'] = $post->title . ' | ' . SITE_TITLE;
        $this->data['related_posts'] = $related_posts;
        $this->data['post'] = $post;
        
        return view('post', $this->data);
    }
}
