<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use DB;
use App\User;
use Box\Spout\Reader\ReaderFactory;
use Box\Spout\Writer\WriterFactory;
use Box\Spout\Common\Type;
use Box\Spout\Writer\Style\StyleBuilder;
use Box\Spout\Writer\Style\Color;
class AdminController extends Controller
{
    //

    public function index(){
    	$orders = $this->makeQuery(2);
    	
    	$ordersArray = $this->makeOrdersArray($orders); //this makes array which unites object as key and values as array of times

        
    	return view('admin.reserve',compact('orders','ordersArray'));
    }




    public function reserved(){
    	return $this->index();
    }

    public function timeover(){
    	$orders = $this->makeQuery(0);
    	
    	$ordersArray = $this->makeOrdersArray($orders); //this makes array which unites object as key and values as array of times


    	return view('admin.timeover',compact('orders','ordersArray'));
    }

    public function bought(){
    	$orders = $this->makeQuery(1);
    	
    	$ordersArray = $this->makeOrdersArray($orders); //this makes array which unites object as key and values as array of times


    	return view('admin.bought',compact('orders','ordersArray'));
    }

   

    private function checkInArray($order_id,$arraykeys){
    	foreach($arraykeys as $orderId){
    		if($orderId==$order_id)return true;
    	}
    }

    private function makeOrdersArray($orders){
    	$finalArray = array();
    	foreach($orders as $order){
			if(!$this->checkInArray($order->order_id,array_keys($finalArray))){
				$forTimes = array();
				array_push($forTimes,$order->time);
				$finalArray[$order->order_id] = $forTimes;
			}
			else{
				$times = $finalArray[$order->order_id];
				array_push($times,$order->time);
				$finalArray[$order->order_id] = $times;
				
			}
		}
		return $finalArray;
    }

    private function makeQuery($active){
    	
        return DB::SELECT("SELECT `schedules`.`time`,`order_schedule`.`order_id`,`schedules`.`day_id`,
                            `orders`.`time` as order_time,`orders`.`people`,`orders`.`user_id` FROM `orders`  JOIN `order_schedule` ON `orders`.`id` = `order_schedule`.`order_id` 
                    JOIN schedules ON schedules.id = order_schedule.schedule_id WHERE orders.active =$active");
    


    }

    public function emails(){
        $filePath = "pricingExcel.xlsx";
        $writer = WriterFactory::create(Type::XLSX);
        $writer->openToBrowser($filePath);

        $columnArray = ['Email','Name','Phone'];
        
        $writer->getCurrentSheet()->setName("User Emails"); 
        $writer->addRow($columnArray);
        $users = User::all();


        foreach($users as $user){
            
            if($user->email!=null){
                 $array_users = [$user->email,$user->username,$user->phone];
                 $writer->addRow($array_users);
             }
        }

        
        $writer->close();
    }


}
