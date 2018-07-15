<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\Exam;
use App\Score;

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
            $usr = User::where('username', $name)->get();
            $user = $usr[0];
            session(['user'=>$user]);
            for($i=1; $i<=6; $i++){
                $score = new Score();
                $score->user_id = $user['id'];
                $score->exam_id = $i;
                $score->status = 0;
                $score->count = 0;
                $score->save();
            }
            return redirect('/exam');
        }
    }

    public function logout(){
        Auth::logout();
        session()->forget('user');
        return redirect('/');
    }
}
