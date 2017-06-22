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
    private static $beforeEvening = 12;
    private static $afterEvening = 15;
    private static $vipDay = 20;



	private $errors;
    public function makeOrder(Request $request){
    	$error="";
        
    	$checkOrder = DB::SELECT("SELECT * FROM  `schedules` JOIN order_schedule ON order_schedule.schedule_id=schedules.id
                                JOIN `orders` ON `orders`.`id`=`order_schedule`.`order_id`
								WHERE `schedules`.`time`>'$request->start_time' AND `orders`.`active`!=0 AND `schedules`.`time`<='$request->end_time' and day_id='$request->week_id'"
						);
        
    	if(!empty($checkOrder)){
    		$error = "ამ დროის შეკვეთა უკვე არსებობს სამწუხაროდ";
    	}
    	else{
            $firstTime = explode(":",$request->start_time)[0];
            $secondTime = explode(":",$request->end_time)[0];

            
            if($firstTime=="23" && $secondTime=="00"){
                $query = "SELECT * FROM  `schedules`
                                    WHERE (time>='$firstTime' AND time<='23:50' 
                                    OR (time>='00:00' AND time<='$request->end_time')) AND day_id='$request->week_id'";
            }
            else{
                $query = "SELECT * FROM  `schedules`
                                    WHERE time>='$request->start_time' AND time<='$request->end_time' 
                                    and day_id='$request->week_id'";
            }
            
    		$scheduleIDs = DB::SELECT($query);


			date_default_timezone_set('Asia/Tbilisi');


			$order = new Order();
			$order->user_id = Auth::user()->id;
			
			

            $howManyDays = $this->getUserDate($request->week_id);
            $order->time = date("Y-m-d H:i:s", strtotime("+".$howManyDays ." day"));
            

            $order->people = $request->people_range;
            $order->active = 2; //means it's reserved

            $personPrice = $this->calculatePrice($request->start_time,$request->end_time,$request->week_id);
            $total = $request->people_range* $personPrice;

            $order->price = $total;

            $order->save();
        
           
			foreach($scheduleIDs as $schedule){
				$schedule_order = new scheduleOrder();
				$schedule_order->order_id = $order->id;
				$schedule_order->schedule_id = $schedule->id;
				
				if($schedule_order->save()) {$error = $order->id;}
                else{ $error="შეკვეთა ვერ მივიღეთ";}


			}
            $fivePercent = $total-10;
            $tenPercent = $total*90/100;

            

            
    	}

    	return compact('error','total','fivePercent','tenPercent');
    	
    }


    private function calculatePrice($start_time,$end_time,$week_id){
        if($start_time[0]=="0" && $week_id>=2 && $week_id<=5){
            return self::$afterEvening;
        }
        else if($start_time[0]=="0" && ($week_id==6 && $week_id==7 || $week_id==1)){
            return self::$vipDay;

        }
        else if($start_time < "18:00" && $week_id>=2 && $week_id<=6){
            return self::$beforeEvening;
        }
        else if($start_time>="18:00" && $week_id>=2 && $week_id<=5){
            return self::$afterEvening;
        }
        else if( ($start_time>="18:00" && $week_id==6) || $week_id==7 || $week_id==1){
            return self::$vipDay;
        }


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
