<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Order;
use App\Schedule;
use DB;
use Mailgun\Mailgun;
use Auth;
use Mail;
class indexController extends Controller
{
    //

    public  $weekDayArray = array(
        "Sunday"=>1,
        "Monday"=>2,
        "Tuesday"=>3,
        "Wednesday"=>4,
        "Thursday"=>5,
        "Friday"=>6,
        "Saturday"=>7
    );

    public  $weekDayGeorgian = array(
        "Sunday"=>'კვირა',
        "Monday"=>'ორშაბათი',
        "Tuesday"=>'სამშაბათი',
        "Wednesday"=>'ოთხშაბათი',
        "Thursday"=>'ხუთშაბათი',
        "Friday"=>'პარასკევი',
        "Saturday"=>'შაბათი'
    );





    private static $daysByIDs = array(
        1=>'Sunday',
        2=>'Monday',
        3=>'Tuesday',
        4=>'Wednesday',
        5=>'Thursday',
        6=>'Friday',
        7=>'Saturday'
    );


    // 0 -shekveta gauqmda dge gadavida shemdegshi
    // 1 -shekveta nayidia
    // 2 - shekveta dajavshnilia
    // 3 - shekveta aris free
    //null vabshe araa order_scheduleshi
    // 0  order scheduleshia tumca ordershi ukve 0-ia
    //xan 0 xan 2, order_scheduleshi orivea da titos sxvadasxva active aqvs orders tableshi

    public function getMainPage(){
        date_default_timezone_set('Asia/Tbilisi');
        $weekDay_ID = $this->weekDayArray[date('l', strtotime("+0 Days - 2 hours"))];
        $orders = DB::SELECT("SELECT * FROM `orders` JOIN order_schedule on orders.id = order_schedule.order_id and orders.active!=0   right join schedules on order_schedule.schedule_id = schedules.id  where schedules.day_id=$weekDay_ID and schedules.time!='02:00'");
       	
        $weekDayDates = $this->getDates();
        $today_id = $this->weekDayArray[date('l', strtotime("+0 Days - 2 hours"))];
        $orders = [
            'orders'=>$orders

        ];


         // $orders = DB::SELECT("SELECT * FROM
         //                    ( SELECT * FROM `orders`  JOIN `order_schedule` ON `orders`.`id` = `order_schedule`.`order_id` WHERE orders.active!=0)AS example
         //                    RIGHT JOIN `schedules` ON example.schedule_id=`schedules`.`id` WHERE `schedules`.`day_id` ='$weekDay_ID' AND `schedules`.`time`!='02:00'");
        
         

        $orderTable = view('pages.orderTable')->with($orders);
        
        return view('pages.index',compact('orderTable','weekDayDates','today_id'));
        
    }

    

    public function getDayOrders(Request $request){
        // $orders = DB::SELECT("SELECT * FROM
        // 					( SELECT * FROM `orders`  JOIN `order_schedule` ON `orders`.`id` = `order_schedule`.`order_id` WHERE orders.active!=0)AS example
        // 					RIGHT JOIN `schedules` ON example.schedule_id=`schedules`.`id` WHERE `schedules`.`day_id` ='$request->week_id' AND `schedules`.`time`!='14:00'");


        $orders = DB::SELECT("SELECT * FROM `orders` JOIN order_schedule on orders.id = order_schedule.order_id and orders.active!=0   right join schedules on order_schedule.schedule_id = schedules.id  where schedules.day_id=$request->week_id and schedules.time!='02:00'");
        
        $weekDayDates = $this->getDates();
        $orders = [
            'orders'=>$orders

        ];
        $orderTable = view('pages.orderTable')->with($orders)->render();
        return compact('orderTable');
    }

    
    public function getDates(){
        date_default_timezone_set('Asia/Tbilisi');
        $weekDayDates = array();
        

        for($i=0;$i<7;$i++){
            $day= date('l', strtotime("+$i Days -2 hours"));
            $weekDayDates[$i]['date'] = date("Y-m-d", strtotime("+".$i ."day - 2 hours"));
            $weekDayDates[$i]['day'] = $this->weekDayGeorgian[date('l', strtotime("+$i Days - 2 hours"))];
            $weekDayDates[$i]['id'] = $this->weekDayArray[$day];
        }   
        
        return $weekDayDates;
    }


    
    public function emailsend(Request $request){
         $user = Auth::user();
    	 $emailabout = $request->emailabout;
    	 $from = "LaserCombat No Email";
    	 if($user!=null && $user->email!=null){
    	 	$from = $user->email;
    	 }
         $sendEmail = Mail::send('pages.emails', ['text'=>$request->emailtext,'about'=>$request->emailabout], function($message) use($from,$emailabout){
                $message->from("gioskofieldsara@gmail.com", $from );

                $message->to('glagh14@freeuni.edu.ge', 'Name')->subject( $emailabout );
         });
         if($sendEmail){
         	$error = "იმეილი წარმატებით გაიგზავნა. გმადლობთ თქვენი აზრის დაფიქსირებისთვის";
         }
         else{
         	$error = "იმელის გაგზავნა ვერ მოხერხდა, სცადეთ მოგვიანებით";
         }
         return compact('error');

    }

    // Gets User's reservation or bought ticket in profile page
    public function getUserOrder(Request $request){
        $user_id= Auth::user()->id;
        $orders = DB::SELECT("SELECT `orders`.`time`, `orders`.`people`,`orders`.`price`,`schedules`.`time` as schedule_time,`orders`.`active`
                            FROM `schedules` JOIN `order_schedule` ON `schedules`.`id` = `order_schedule`.`schedule_id`
                            JOIN `orders`  ON `order_schedule`.`order_id` = `orders`.`id`
                            WHERE `orders`.`user_id` = $user_id AND `orders`.`active`!=0
        ");
        $timeArray = array();
        $i=1;

        foreach($orders as $order){

            if($i==1){ $start_time = $order->schedule_time;}
            if($i==count($orders)) {$end_time=$order->schedule_time;};
            $i++;
            $date = $order->time;
            $people = $order->people;
            $price = $order->price;
        }



        if( count($orders) != 0){

            $orders = [
                'count'=>count($orders),
                'date'=>$date,
                'people'=>$people,
                'start_time'=>$start_time,
                'end_time'=>$end_time,
                'active'=>$orders[0]->active,
                'price'=>$price
            ];

            $userOrder = view('pages.userticket')->with($orders)->render();
            
            return compact('userOrder');
        }
        else{
            $error = "თქვენ არ გაქვთ არცეთი ბილეთი";
            return compact('error');
        }
    }



    


}


        