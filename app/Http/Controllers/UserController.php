<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public  function login(Request $request){
        //return User::where(['email'=>$request->email])->first();

        $user = User::where(['email'=>$request->email])->first();
        if (!$user || !Hash::check($request->password,$user->password)){
            return "Username or Password is not matched";
        }
        else{
            $request->session()->put('user', $user);
            return redirect('/');
        }
    }
}
