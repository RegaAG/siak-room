<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class LoginController extends Controller
{
    public function index(){
        return view('login.index');
    }

    public function dashboard(){
        return view('admin.index');
    }

    public function login(Request $request): RedirectResponse
    {
        $login = $request->validate([
            'username' => 'required',
            'password' => 'required'
        ]);

        if(Auth::attempt($login)){
            $request->session()->regenerate();
            return redirect()->intended('/');
        }
        return back()->with('loginErorr','Email atau Password Salah')->withInput($request->except('password'));
    }

    public function logout(){
        Auth::logout();
        return redirect('/');
    }
    
}
