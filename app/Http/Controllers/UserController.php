<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
class UserController extends Controller
{
    //Login
    function login(Request $req){
        
        $user= User::where(['email'=>$req->email])->first();
        if(!$user || !Hash::check($req->password,$user->password)){
            return "User name or Password is invalid please try again";
        }
        else{
            $req->session()->put('user',$user);
            return redirect('/');
        }
    }
    

}
