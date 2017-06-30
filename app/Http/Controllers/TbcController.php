<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Session;
use Auth;
use Curl\Curl;
use App\Order;
use Hash;
use App\scheduleOrder;

use App\Http\Controllers\OrderController as orderControl;
class TbcController extends Controller
{
    //


 

	
	public function ok(){
		$certpath = public_path().'/certificate/cert.pem';
  		$certpass = 'Gkluyro0756kjyDJGYrj';
  		$ip = $_SERVER['REMOTE_ADDR'];
	    $tid = $_REQUEST['trans_id'];
	    $error;


	    
	    $post_fields = array(
    		'command' => 'c',
	      	'trans_id' => $tid,
	      	'client_ip_addr' => $ip,
   		);
   		$submit_url = "https://securepay.ufc.ge:18443/ecomm2/MerchantHandler";
	    $string = $this->build_query_string($post_fields);
    	$result = $this->curl($string,$certpass,$certpath,$submit_url);
    	$parsed = $this->parse_result($result);
    	if($parsed['RESULT']=="FAILED"){
    		$error="სამწუხაროდ გადახდა წარუმატებლად დასრულდა";
    		return view('pages.fail',compact('error'));
    	}
    	else {
		    	$userArray = Session::get('userOrder');
		    	
		    	$OrderController = new orderControl;
			    $order = new Order();
		        $order->user_id = Auth::user()->id;
		        $key =  substr(crc32(substr(Hash::make(Auth::user()->phone),54,6)),2);
		        $order->userkey =$key;
		        $order->phone = Auth::user()->phone;
		        $order->time = $OrderController->getUserDate($userArray[4]);
		        $order->people = $userArray[5];
		        $order->active = 1; //means it's bought
		        $order->trans_id = $tid;
		        $order->paid = $userArray[0];
		        $order->remaining = ($userArray[0] == $userArray[1]) ? 0 : $userArray[1];

		        $saveOrder = $order->save();



		        $firstTime = explode(":",$userArray[2])[0];
	            $secondTime = explode(":",$userArray[3])[0];
				    $scheduleIDs = $OrderController->getScheduleIDs($firstTime,$secondTime,$userArray[2],$userArray[3],$userArray[4]);


	            foreach($scheduleIDs as $schedule){
	    			$schedule_order = new scheduleOrder();
	    			$schedule_order->order_id = $order->id;
	    			$schedule_order->schedule_id = $schedule->id;
	    			$schedule_order->save();
	            }
	            if($saveOrder){
					$error = "ტრანზაქცია წარმატებით დასრულდა! ";
	            }
	            else{
	            	$error = "სამწუხაროდ შეკვეთის დაფიქსირება ვერ მოხერხდა. გთხოვთ მობრძანდეთ თქვენი უნიკალური კოდით";
	            }
	            Session::forget('userOrder');
	            return view('pages.ok',compact('error','key'));

		      
	    }







	}
    public function startPayment($price,$remaining,$start_time_first,$start_time_second,$end_time_first,$end_time_second,$week_id,$people){
    	$userArray=[];
  		$userArray[] = $price;
  		$userArray[] = $remaining;
  		$userArray[]=$start_time_first.":".$start_time_second;
  		$userArray[]=$end_time_first.":".$end_time_second;
  		$userArray[]=$week_id;
  		$userArray[]=$people;


    	$currency = 981;
  		// $price = (int)$price*100;
      $price=5;
  		$description = "dada";
  		$lang = 'GE';
  		$type = 'SMS';
  		$submit_url = 'https://securepay.ufc.ge:18443/ecomm2/MerchantHandler';

  		$certpath = public_path().'/certificate/cert.pem';
  		$certpass = 'Gkluyro0756kjyDJGYrj';
  		$ip = $_SERVER['REMOTE_ADDR'];


  		
  
	  	$post_fields = array(
    		'command'        => 'v', // identifies a request for transaction registration
    		'amount'         => $price,
    		'currency'       => $currency,
    		'client_ip_addr' => $ip,
    		'description'    => $description,
    		'language'       => $lang,
    		'msg_type'       => 'SMS'
   		);
  		$string = $this->build_query_string($post_fields);
    	$result = $this->curl($string,$certpass,$certpath,$submit_url);
    	$parsed = $this->parse_result($result);
    	Session::set('userOrder', $userArray);

		

		$trans_id = ($parsed['TRANSACTION_ID']);
		return view('pages.tbcview',compact('trans_id'));

	      
		

    }

    private function build_query_string($post_fields){
        return http_build_query($post_fields);
    }


   	private function curl($query_string,$certpass,$certpath,$submit_url)
    {
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_POSTFIELDS, $query_string);
        curl_setopt($curl, CURLOPT_VERBOSE, 1);
        curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, 2);
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, 1);
        curl_setopt($curl, CURLOPT_CAINFO, $certpath); // because of Self-Signed certificate at payment server.
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($curl, CURLOPT_SSLCERT, $certpath);
        curl_setopt($curl, CURLOPT_SSLKEY, $certpath);
        curl_setopt($curl, CURLOPT_SSLKEYPASSWD, $certpass);
        curl_setopt($curl, CURLOPT_URL, $submit_url);
        $result = curl_exec($curl);
        return $result;
    }


    private function parse_result($string)
    {
        $array1 = explode(PHP_EOL, trim($string));
        $result = array();
        foreach ($array1 as $key => $value) {
            $array2 = explode(':', $value);
            $result[ $array2[0] ] = trim($array2[1]);
        }
        return $result;
    }



}
