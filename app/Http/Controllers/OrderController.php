<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use DB;
use App\Order;
use App\scheduleOrder;
use Auth;
use App\Http\Controllers\indexController as index;
class OrderController extends Controller 
{
    //

	private $errors;
    public function makeOrder(Request $request){
    	$error="";
    	$checkOrder = DB::SELECT("SELECT * FROM  `schedules` JOIN order_schedule ON order_schedule.schedule_id=schedules.id
								WHERE time>='$request->start_time' AND time<='$request->end_time' and day_id='$request->week_id'"
						);

    	if(!empty($checkOrder)){
    		$error = "ამ დროის შეკვეთა უკვე არსებობს სამწუხაროდ";
    	}
    	else{
            $secondOrder = Order::where('user_id','=',Auth::user()->id)->where('active','!=',0)->first();
            if($secondOrder!=null){
                $error = "მეორე შეკვეთას ვერ გააკეთებთ";
            }
            else{
        		$scheduleIDs = DB::SELECT("SELECT * FROM  `schedules`
    								WHERE time>='$request->start_time' AND time<='$request->end_time' and day_id='$request->week_id'"
    							);
    			$user_id = Auth::user()->id;
    			$order = new Order();
    			$order->user_id = $user_id;
    			// $order->time = $this->getUserOrderDate($request->week_id);
    			date_default_timezone_set('Asia/Tbilisi');
    			$order->time = date('Y-m-d H:i:s');
    			$order->people = $request->people_range;
                $order->active = 2; //2 or 1 or 3 later implementation
                $order->save();

    			foreach($scheduleIDs as $schedule){
    				$schedule_order = new scheduleOrder();
    				$schedule_order->order_id = $order->id;
    				$schedule_order->schedule_id = $schedule->id;
    				$schedule_order->active = 2;
    				if($schedule_order->save())$error = "შეკვეთა მიღებულია";

    			}
            }
    	}

    	return compact('error');
    	
    }

    private function getUserOrderDate($week_id){
    	$indexController = new index();
    	$weekDayArray = $indexController->getDates();
    	foreach($weekDayArray as $eachDay){
    		if($eachDay['id']==$week_id)
    			return $eachDay['date'];
    	}
    }


}
