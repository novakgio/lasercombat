<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use DB;
use App\Order;
use App\scheduleOrder;
use Auth;
use DateTime;
use App\Http\Controllers\indexController as index;
class OrderController extends Controller 
{
    private static $beforeEvening = 12;
    private static $afterEvening = 15;
    private static $vipDay = 20;

    public  $weekDayArray = array(
        "Sunday"=>1,
        "Monday"=>2,
        "Tuesday"=>3,
        "Wednesday"=>4,
        "Thursday"=>5,
        "Friday"=>6,
        "Saturday"=>7
    );

	private $errors;

    
    public function makeOrder(Request $request){
    	$error="";
        date_default_timezone_set('Asia/Tbilisi');
        $today_day = date('l', strtotime("+0 Days - 2 hours"));
        $interval = $this->getInterval($request->start_time);
        

        if( $interval->h==0 && $this->weekDayArray[$today_day] == $request->week_id){
            $error = "შეკვეთა უნდა აიღო ამ დროიდან მინიმუმ 1 საათის შემდეგ";
        }
        else{
        	//check if order exists
            $checkOrder = $this->checkExistence($request->start_time,$request->end_time,$request->week_id);
            if(!empty($checkOrder)){ $error = "ამ დროის შეკვეთა უკვე არსებობს სამწუხაროდ";}
           
            else{

                //all good,starting to make database inserting
                
                $firstTime = explode(":",$request->start_time)[0];
                $secondTime = explode(":",$request->end_time)[0];
                $scheduleIDs = $this->getScheduleIDs($firstTime,$secondTime,$request->start_time,$request->end_time,$request->week_id);


                $order = new Order();
    			$order->user_id = Auth::user()->id;
    			$order->time = $this->getUserDate($request->week_id);
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

    

    

    // roca davsjavshni gamis 12-is mere,ra tarigit unda chaiweros dajavshna?


    private function getUserDate($week_id){
        
       date_default_timezone_set('Asia/Tbilisi');
        $today_day = date('l', strtotime("+0 Days - 2 hours"));

        $indexController = new index();
        $today_id = $indexController->weekDayArray[$today_day];
        if($week_id-$today_id>0) $userDate = $week_id-$today_id;
        else if ( $week_id-$today_id<0 ) $userDate = 7-$today_id+$week_id;
        else $userDate = 0;
        
        return date("Y-m-d H:i:s", strtotime("+".$userDate ." day - 2 hours"));
    }

   

    private function getInterval($start_time){
        date_default_timezone_set('Asia/Tbilisi');
        $date1 = new DateTime($start_time);
        $date2 = new DateTime(date('H:i'));
        $interval = $date1->diff($date2);
        return $interval;
    }



    //Queries

    private function checkExistence($start_time,$end_time,$day_id){
        return  DB::SELECT("SELECT * FROM  `schedules` JOIN order_schedule ON order_schedule.schedule_id=schedules.id
                                    JOIN `orders` ON `orders`.`id`=`order_schedule`.`order_id`
                                    WHERE `schedules`.`time`>'$start_time' AND `orders`.`active`!=0 AND `schedules`.`time`<='$end_time' and day_id='$day_id'"
                            );
    }


    private function getScheduleIDs($firstTime,$secondTime,$start_time,$end_time,$day_id){
        $query = "SELECT * FROM  `schedules`
                        WHERE time>='$start_time' AND time<='$end_time' 
                        and day_id='$day_id'";


        if($firstTime=="23" && $secondTime=="00"){
                $query = "SELECT * FROM  `schedules`
                        WHERE (time>='$firstTime' AND time<='23:50' 
                        OR (time>='00:00' AND time<='$end_time')) AND day_id='$day_id'";
        }
     
                
        return DB::SELECT($query);
    }

    





}
