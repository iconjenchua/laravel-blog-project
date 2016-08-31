<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\UserLogin;
use App\Http\Requests;

class AdminController extends Controller
{
    public function postLogin(UserLogin $request) {
        
        if(\Auth::attempt(['email' => $request->get('email'), 'password' => $request->get('password')])) {
            return 'okay!';
        }
        
        return redirect()->back()->withInput()->withErrors('Invalid email/password.');
    }
    
    public function dashboard() {
        return 'dashboard';
    }
}
