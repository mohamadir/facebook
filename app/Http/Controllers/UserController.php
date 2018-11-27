<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
class UserController extends Controller
{
    //

    public function show(){
         $isLogged =session('logged_in',false);

            if($isLogged == false){  
            return view('login');
            }
            return view('welcome');

    }

    public function getUsers(Request $request){
     return User::get();   
    }
    public function register(Request $request){
        
       $user = new User();
       
       $user->email = $request->email;
       $user->password = $request->password;
       $user->name = $request->name;
       $user->save();
       
       return view('login');
    }
     public function login(Request $request){
        
        $user = User::where('email',$request->email)->where('password',$request->password)->first();
        // dd($user);
        if($user){
            // session(['logged' => true]);
            session(['logged_in' => true]);
            return view('welcome',['user' => $user]);   
        }
            return redirect('/login');
    }
}
