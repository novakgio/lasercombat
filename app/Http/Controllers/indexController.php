<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Order;
class indexController extends Controller
{
    //


    public function getMainPage(){
    	$orders = Order::where('day_id','=',1)->get();
    	
    	return view('pages.index',compact('orders'));
    }
}
