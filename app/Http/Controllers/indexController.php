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


    public function getMainPage(){
    	$orders = DB::SELECT("SELECT `schedules`.`day_id`, `schedules`.`time`, IF (`order_schedule`.`schedule_id` IS null, 0, 1) booked
    						FROM `schedules`
							LEFT JOIN `order_schedule` ON `schedules`.`id` = `order_schedule`.`schedule_id`
							WHERE `schedules`.`day_id` = DAYOFWEEK(now())
		");

		$weekDayDates = $this->getDates();
		
    	return view('pages.index',compact('orders','weekDayDates'));
    	
    }


    private function getDates(){
    	$weekDayDates = array();
    	$today = date('l');

    	for($i=0;$i<7;$i++){
    		$weekDayDates[$i]['date'] = date("Y-m-d", strtotime("+".$i ."day"));
    		$weekDayDates[$i]['day'] = date('l', strtotime("$today + $i Days"));
    	}	
    	
    	return $weekDayDates;
    }
}


    	