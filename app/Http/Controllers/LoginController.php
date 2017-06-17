<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Auth;
use App\User;
use Hash;
class LoginController extends Controller
{
    //


    public function checkLogin(Request $request){
    	$error = null;

   		$user = User::where('email','=',$request->email)->first();
   		if($user!=null){
			   if (Hash::check($request->pass, $user->password)){
    
            Auth::login($user);
  	   			if(Auth::user()){
  	   				  $error="";
  	   			}
   			}
   			  else{
          $error="პაროლი არასწორია";
        }
      }
      else{
        $error = "ესეთი იუზერი არ არსებობს";
      }
      
      return compact('error');
    }
}
