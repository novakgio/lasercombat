<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use DB;
class AdminController extends Controller
{
    //

    public function index(){
    	$orders = DB::SELECT("SELECT *
    						FROM `schedules` JOIN `order_schedule` ON `schedules`.`id` = `order_schedule`.`schedule_id`
    						JOIN `orders`  ON `order_schedule`.`order_id` = `orders`.`id`
    						WHERE `orders`.`user_id` = 1 AND `orders`.`active`!=0 
		");

  //   	$finalArray = array();
  //   	$finalArray['2'] = "gio";
		// foreach($orders as $order){
		// 	var_dump(array_key_exists($order->order_id,array_keys($finalArray)));
		// 	if(!array_key_exists($order->order_id,array_keys($finalArray))){
		// 		$forTimes = array();
		// 		array_push($forTimes,$order->time);
		// 		$finalArray[$order->order_id] = $forTimes;
		// 		var_dump('ha');
		// 	}
		// 	else{
		// 		$times = $finalArray[$order->order_id];
		// 		array_push($times,$order->time);
		// 		$finalArray[$order->order_id] = $times;
		// 		var_dump("haha");
		// 	}
		// }
		return array_keys($finalArray);
    	return view('admin.reserveearly');
    }


    public function reserveLate(){
    	return view('admin.reservelate');
    }

    public function reserveEarly(){
    	return view('admin.reserveearly');
    }

    public function boughtEarly(){
    	return view('admin.boughtearly');
    }

    public function boughtLate(){
    	return view('admin.boughtlate');
    }
}
