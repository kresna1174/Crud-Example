<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login() {
        if (Auth::attempt(['name' => request('username'), 'password' => request('password')])) {
            return redirect()->route('tabungan');
        } else {
            return redirect()->route('login')->with('errorMessage', 'Username atau password salah');
        }
    }
}
