<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use DB;
use App\Order;
use App\scheduleOrder;
use Auth;
use Hash;
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


    private function validateOrder($week_id,$start_time){
        date_default_timezone_set('Asia/Tbilisi');
        $today_day = date('l', strtotime("+0 Days - 2 hours"));
        
        $day = (date('H')=="00" || date('H')=="01") ? 14 :13;

        $order_time = strtotime("2008-12-13 ".$start_time);
        $now_time = strtotime("2008-12-".$day." ".date('H:i'));

        if(round($order_time-$now_time)<60 && $this->weekDayArray[$today_day] == $week_id) return false;
        return true;

    }
    
    public function makeOrder(Request $request){
    	$error="";
        $key="";
       
        

        $validateOrder = $this->validateOrder($request->week_id,$request->start_time);
        if(!$validateOrder){
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
                $secondTimeMinutes = explode(":",$request->end_time)[1];
                $secondFirstTime= explode(":",$request->start_time)[1];

                $finalMinutes=$secondTimeMinutes;
                if($secondTimeMinutes=="00") {$finalMinutes = "10";}
                else if($secondTimeMinutes=="50") {$finalMinutes=="00";}
                else {$finalMinutes=(int)$finalMinutes+10;}


                $request->end_time = $secondTime.":".$finalMinutes;

                $scheduleIDs = $this->getScheduleIDs($firstTime,$secondTime,$request->start_time,$request->end_time,$request->week_id);


                $order = new Order();
                if(!$request->name){
                    $order->user_id = Auth::user()->id;
                    $key = substr(crc32(substr(Hash::make(Auth::user()->phone),54,6)),2);
                    $order->userkey = $key;
                }
                else{
                    $order->user_id = null;
                    $key =  substr(crc32(substr(Hash::make($request->phone),54,6)),2);
                    $order->userKey =$key;
                    $order->phone = $request->phone;
                    $order->name = $request->name;


                }

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


    		    $fivePercent = round(($total-$personPrice)*95/100);

                $tenPercent = round($total*90/100);
            }
        }


    	if(!$request->name){
            return compact('error','total','personPrice','fivePercent','tenPercent','key');
        }
        else{
            return compact('error','key');
        }
    	
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


    public function getMinuteDifference($start_time,$end_time){
        $day_number=13;
        if( (int) explode(":",$start_time)[1]>=60 || (int) explode(":",$end_time)[1]>=60) return 0;


        if(explode(":",$start_time)[0] == "23" && explode(":",$end_time)[0]=="00"){
            $day_number = 14;
        }
        $to_time = strtotime("2008-12-13 ".$start_time);
        $from_time = strtotime("2008-12-".$day_number." ".$end_time);
        return round(abs($from_time - $to_time) / 60);

    }
    public function priceGetter(Request $request){
        $minutes = $this->getMinuteDifference($request->start_time,$request->end_time);
        $onePerson = $this->calculatePrice($request->start_time,$request->end_time,$request->week_id);
        $onePerson = round($minutes * $onePerson/20);
        //$onePerson=$onePerson*$minutes;
        return compact('onePerson');
    }

    public function calculateEachPrice(Request $request){

        $minutes = $this->getMinuteDifference($request->start_time,$request->end_time);

        $personPrice =  round($minutes * $this->calculatePrice($request->start_time,$request->end_time,$request->week_id)/20);
        $total=$personPrice*$request->people_range;
        $fivePercent = round(($total)*95/100-$personPrice);
        $tenPercent = round($total*90/100);

        $userPhone=0;
        if(Auth::user()->phone==null){
            $userPhone = Auth::user()->id;
        }
        $error="";
        $key="";
        $validateOrder = $this->validateOrder($request->week_id,$request->start_time);
        if(!$validateOrder){
            $error = "შეკვეთა უნდა აიღო ამ დროიდან მინიმუმ 1 საათის შემდეგ";
        }
        else{
            //check if order exists
            $checkOrder = $this->checkExistence($request->start_time,$request->end_time,$request->week_id);
            if(!empty($checkOrder)){ $error = "ამ დროის შეკვეთა უკვე არსებობს სამწუხაროდ";}
        }

        return compact('total','personPrice','fivePercent','tenPercent','error','userPhone');
    }
    
    

    

    // roca davsjavshni gamis 12-is mere,ra tarigit unda chaiweros dajavshna?


    public function getUserDate($week_id){
        
       date_default_timezone_set('Asia/Tbilisi');
        $today_day = date('l', strtotime("+0 Days - 2 hours"));

        $indexController = new index();
        $today_id = $indexController->weekDayArray[$today_day];
        if($week_id-$today_id>0) $userDate = $week_id-$today_id;
        else if ( $week_id-$today_id<0 ) $userDate = 7-$today_id+$week_id;
        else $userDate = 0;
        
        return date("Y-m-d H:i:s", strtotime("+".$userDate ." day"));
    }

   

    



    //Queries

    private function checkExistence($start_time,$end_time,$day_id){
        return  DB::SELECT("SELECT * FROM  `schedules` JOIN order_schedule ON order_schedule.schedule_id=schedules.id
                                    JOIN `orders` ON `orders`.`id`=`order_schedule`.`order_id`
                                    WHERE `schedules`.`time`>'$start_time' AND `orders`.`active`!=0 AND `schedules`.`time`<='$end_time' and day_id='$day_id'"
                            );
    }


    public function getScheduleIDs($firstTime,$secondTime,$start_time,$end_time,$day_id){
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
