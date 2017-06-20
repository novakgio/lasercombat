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
    // mysql time zone not working
    // send mails
	private $errors;
    public function makeOrder(Request $request){
    	$error="";
        $price=20;
    	$checkOrder = DB::SELECT("SELECT * FROM  `schedules` JOIN order_schedule ON order_schedule.schedule_id=schedules.id
                                JOIN `orders` ON `orders`.`id`=`order_schedule`.`order_id`
								WHERE `schedules`.`time`>'$request->start_time' AND `orders`.`active`!=0 AND `schedules`.`time`<='$request->end_time' and day_id='$request->week_id'"
						);
        
    	if(!empty($checkOrder)){
    		$error = "ამ დროის შეკვეთა უკვე არსებობს სამწუხაროდ";
    	}
    	else{
           
    		$scheduleIDs = DB::SELECT("SELECT * FROM  `schedules`
								WHERE time>='$request->start_time' AND time<='$request->end_time' and day_id='$request->week_id'"
							);
			$user_id = Auth::user()->id;
			$order = new Order();
			$order->user_id = $user_id;
			
			date_default_timezone_set('Asia/Tbilisi');


            $howManyDays = $this->getUserDate($request->week_id);


		    $order->time = date("Y-m-d H:i:s", strtotime("+".$howManyDays ." day"));
            $order->people = $request->people_range;
            $order->active = 2; //2 or 1 or 3 later implementation
            $order->save();
        
			foreach($scheduleIDs as $schedule){
				$schedule_order = new scheduleOrder();
				$schedule_order->order_id = $order->id;
				$schedule_order->schedule_id = $schedule->id;
				
				if($schedule_order->save()) {$error = $order->id;}
                else{ $error="შეკვეთა ვერ მივიღეთ";}


			}
            
    	}

    	return compact('error','price');
    	
    }
    private function getUserDate($week_id){
        $today = date('l');
        $today_day = date('l', strtotime("$today + 0 Days"));


        $indexController = new index();
        $today_id = $indexController->weekDayArray[$today_day];
        if($week_id-$today_id>0) $userDate = $week_id-$today_id;
        else if ( $week_id-$today_id<0 ) $userDate = 7-$today_id+$week_id;
        else $userDate = 0;
        
        return $userDate;
    }

    





}
