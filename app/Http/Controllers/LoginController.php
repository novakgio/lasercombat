<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Auth;
use App\User;
use Illuminate\Support\Facades\Hash;
class LoginController extends Controller
{
    //


    public function checkLogin(Request $request){
    	$error = null;

   		$user = User::where('email','=',$request->email)->first();
   		if($user!=null){
			   if (Hash::check($request->pass, $user->password))
    
            Auth::login($user);
  	   			if(Auth::user()){
  	   				  $error="";
  	   			}
   			}
   			else{
   				$error=$user->password;
   			}
   		}
   		else{
   			$error = "Such user doesn't exist";
   		}
   		
   		return compact('error');
    }
}
