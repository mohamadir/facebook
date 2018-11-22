<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
class UserController extends Controller
{
    //
    public function getUsers(Request $request){
     return User::get();   
    }
    public function addUser(Request $request){
        
       $user = new User();
       
       $user->email = $request->email;
       $user->password = $request->password;
       $user->name = $request->name;
       $user->save();


       return response()->json(
           [
            'status' => 200,
            'message' => 'success',
            'data'=> $user
            ]
        );



    }
}
