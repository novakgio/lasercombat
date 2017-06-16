<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Order;
use App\Schedule;
use DB;
class indexController extends Controller
{
    //

	private static $weekDayArray = array(
		"Sunday"=>1,
		"Monday"=>2,
		"Tuesday"=>3,
		"Wednesday"=>4,
		"Thursday"=>5,
		"Friday"=>6,
		"Saturday"=>7
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




    public function getMainPage(){
    	$orders = DB::SELECT("SELECT `schedules`.`day_id`, `schedules`.`time`, IF (`order_schedule`.`schedule_id` IS null, 0, 1) booked
    						FROM `schedules`
							LEFT JOIN `order_schedule` ON `schedules`.`id` = `order_schedule`.`schedule_id`
							WHERE `schedules`.`day_id` = DAYOFWEEK(now())
		");

		$weekDayDates = $this->getDates();
		$today_id = self::$weekDayArray[date('l')];
		$orders = [
			'orders'=>$orders

		];

		$orderTable = view('pages.orderTable')->with($orders);
		
    	return view('pages.index',compact('orderTable','weekDayDates','today_id'));
    	
    }

    public function getDayOrders(Request $request){
    	$orders = DB::SELECT("SELECT `schedules`.`day_id`, `schedules`.`time`, IF (`order_schedule`.`schedule_id` IS null, 0, 1) booked
    						FROM `schedules`
							LEFT JOIN `order_schedule` ON `schedules`.`id` = `order_schedule`.`schedule_id`
							WHERE `schedules`.`day_id` =$request->week_id");
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
    	$today = date('l');

    	for($i=0;$i<7;$i++){
    		$weekDayDates[$i]['date'] = date("Y-m-d", strtotime("+".$i ."day"));
    		$weekDayDates[$i]['day'] = date('l', strtotime("$today + $i Days"));
    		$weekDayDates[$i]['id'] = self::$weekDayArray[$weekDayDates[$i]['day']];
    	}	
    	
    	return $weekDayDates;
    }
}


    	