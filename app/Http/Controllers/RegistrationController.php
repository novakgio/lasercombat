<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\User;
use Auth;

class RegistrationController extends Controller
{
    


   public function store(Request $request){
   		$error = null;
   		$user = User::where('email','=',$request->email)->first();
   		if($user!=null){
   			$error = "such user already exists,try another";
   			
   		}
   		else{
   			$user = new User();
   			$user->email = $request->email;
   			$user->name = $request->name;
   			$user->phone = $request->phone;
   			$user->password =bcrypt($request->password);
   			$user->save();
   			Auth::login($user);
   			if(Auth::user()){
   				  $error="";
   			}
   		}

   		return compact('error');
   }


   public function logout(){
   		Auth::logout();
   		return redirect('/');
   }
}
