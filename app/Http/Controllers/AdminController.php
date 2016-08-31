<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\UserLogin;
use App\Http\Requests\EditPost;
use App\Http\Requests;

use App\Post;
use App\User;

class AdminController extends Controller
{   
    public function dashboard() {
        
        $posts = Post::with('Author')->orderBy('created_at', 'DESC')->paginate(10);
        
        $this->data['page_title'] = 'Admin Dashboard' . PAGE_TITLE;
        $this->data['posts'] = $posts;
        
        return view('admin.dashboard', $this->data);
    }
    
    public function postLogin(UserLogin $request) {
        
        if(\Auth::attempt(['email' => $request->get('email'), 'password' => $request->get('password')])) {
            return redirect()->route('admin');
        }
        
        return redirect()->back()->withInput()->withErrors('Invalid email/password.');
    }
    
    public function createPost() {
        $users = User::lists('name', 'id');
        
        $this->data['page_title'] = 'Create new post: ' . PAGE_TITLE;
        $this->data['users'] = $users;
        
        return view('posts.create', $this->data);
    }
    
    public function storePost(EditPost $request) {
        $post = Post::create($request->all());
        $post->published_at = date('Y-m-d H:i:s');
        $post->save();
        
        if($post->id) {
            return redirect()->route('post.edit', $post->id)->withInfo('New post created');
        }
        
        return redirect()->back()->withError('There was something wrong when trying to save your new post. Please try again.')->withInput();
    }
    
    public function editPost($id) {
        $post = Post::whereId($id)->first();
        $users = User::lists('name', 'id');
        
        $this->data['page_title'] = 'Edit post: ' . $post->title . PAGE_TITLE;
        $this->data['users'] = $users;
        $this->data['post'] = $post;
        
        return view('posts.edit', $this->data);
    }
    
    public function updatePost($id, EditPost $request) {
        
        $post = Post::whereId($id)->update($request->except('_token'));
        
        return redirect()->route('post.edit', $id)->withInfo('Post updated');
    }
    
    public function deletePost($id) {
        Post::whereId($id)->delete();
        
        return redirect()->route('admin')->withInfo('Post deleted');
    }
    
    public function logout() {
        \Auth::logout();
        
        return redirect()->route('home');
    }
}
