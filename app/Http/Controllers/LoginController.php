<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Auth;
use App\User;
class LoginController extends Controller
{
    //


    public function checkLogin(Request $request){
    	$error = null;

   		
   		$error = $request->email.bcrypt($request->pass);
   		return compact('error');
    }
}
