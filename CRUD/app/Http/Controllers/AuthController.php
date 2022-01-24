<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function index() {
        return view('auth.login');
    }

    public function login() {
        if (Auth::attempt(['name' => request('username'), 'password' => request('password')])) {
            return redirect()->route('barang');
        } else {
            return redirect()->route('login')->with('errorMessage', 'Username atau password salah!!');
        }
    }

    public function logout() {
        Auth::logout();
        return redirect()->route('login');
    }
}
