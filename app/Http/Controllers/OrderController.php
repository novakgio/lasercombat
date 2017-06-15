<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use DB;
use App\Order;
use App\scheduleOrder;
class OrderController extends Controller
{
    //

	private $errors;
    public function makeOrder(Request $request){
    	$error="";
    	$checkOrder = DB::SELECT("SELECT * FROM  `schedules` JOIN order_schedule ON order_schedule.schedule_id=schedules.id
								WHERE time>='$request->start_time' AND time<='$request->end_time' and day_id='5'"
						);

    	if(!empty($checkOrder)){
    		$error = "This order is not possible,it's already made";
    	}
    	else{
    		$scheduleIDs = DB::SELECT("SELECT * FROM  `schedules`
								WHERE time>='14:00' AND time<='14:40' and day_id='2'"
							);
			$user_id = Auth::user()->id;
			$order = new Order();
			$order->user_id = $user_id;
			$order->save();

			foreach($scheduleIDs as $schedule){
				$schedule_order = new scheduleOrder();
				$schedule_order->order_id = $order->id;
				$schedule_order->schedule_id = $schedule->id;
			}
    	}

    	return compact('error');
    	
    }
}
