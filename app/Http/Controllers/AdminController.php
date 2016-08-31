<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\UserLogin;
use App\Http\Requests;

use App\Post;
use App\User;

class AdminController extends Controller
{
    public function postLogin(UserLogin $request) {
        
        if(\Auth::attempt(['email' => $request->get('email'), 'password' => $request->get('password')])) {
            return 'okay!';
        }
        
        return redirect()->back()->withInput()->withErrors('Invalid email/password.');
    }
    
    public function dashboard() {
        
        $posts = Post::with('Author')->paginate(10);
        
        $this->data['page_title'] = 'Admin Dashboard' . PAGE_TITLE;
        $this->data['posts'] = $posts;
        
        return view('admin.dashboard', $this->data);
    }
    
    public function editPost($id) {
        $post = Post::whereId($id);
        $users = User::lists('name', 'id');
        
        $this->data['page_title'] = 'Edit post: ' . $post->title . PAGE_TITLE;
        $this->data['users'] = $users;
        
        return view('posts.edit', $this->data);
    }
}
