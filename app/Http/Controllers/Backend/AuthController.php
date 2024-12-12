<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function index()
    {
        if (!empty(Auth::check())) {
            return redirect()->route('admin.dashboard');
        }
        return view('backend.auth.login');
    }

    public function loginUser(Request $request)
    {
        // dd(Hash::make('12345'));
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);


        $remember = !empty($request->remember) ? true : false;

        if (Auth::attempt($credentials, $remember)) {
            return redirect()->route('admin.dashboard');
        } else {
            return redirect()->route('admin.login')->with('error', 'Invalid credentials!');
        }
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('admin.login');
    }
}
