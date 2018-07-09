<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;

class UserController extends Controller
{
    public function register()
    {
        return view('register');
    }

    public function save(Request $request)
    {
        $user = new User();
        $user->username = $request->username;
        $user->password = bcrypt($request->password);
        $user->save();
        return redirect('/');
    }

    public function login(Request $request)
    {
        $credentials = $request->only('username', 'password');
        if (Auth::attempt($credentials)) {
            $name = $credentials["username"];
            $user = User::where('username', $name)->get();
            session(['user'=>$user]);
            return redirect('/exam');
        }
    }

    public function logout(){
        Auth::logout();
        session()->forget('user');
        return redirect('/');
    }
}
