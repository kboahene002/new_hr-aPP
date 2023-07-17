<?php

namespace App\Http\Controllers\auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function index(){
        if (Auth::check()) {
            return redirect('dashboard'); // Replace '/' with the desired homepage URL
        }
        return view('auth.login');
    }

    public function logout(){
        Auth::logout();
        return $this->index();
    }
}
