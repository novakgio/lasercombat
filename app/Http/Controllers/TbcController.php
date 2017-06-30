<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Session;
use Auth;
use Curl\Curl;
use Hash;

use App\Http\Controllers\OrderController as order;
class TbcController extends Controller
{
    //


	public function fail(){

		return "veerr gadaixada oe";
	}
	public function ok(){
		$certpath = public_path().'/certificate/cert.pem';
  		$certpass = 'Gkluyro0756kjyDJGYrj';
  		$ip = $_SERVER['REMOTE_ADDR'];
	    $tid = $_REQUEST['trans_id'];


	    $post_fields = array(
    		'command' => 'c',
	      	'trans_id' => $tid,
	      	'client_ip_addr' => $ip,
   		);
   		$submit_url = "https://securepay.ufc.ge:18443/ecomm2/MerchantHandler";
	    $string = $this->build_query_string($post_fields);
    	$result = $this->curl($string,$certpass,$certpath,$submit_url);
    	$parsed = $this->parse_result($result);
    	return var_dump($parsed);

	    // $array = explode(" ", $curl->response);
	    // if($array[1] == "FAILED") {
	    //   $error = "ვერ მოხერხდა თანხის დამუშავება/გადახდა";
	    //   return view('pages.fail',compact('error'));
	    // } else {
	    // 	$userArray = Session::get('userOrder');
	    // 	return var_dump($userArray);
	    // 	$OrderController = new order;
		   //  $order = new Order();
	    //     $order->user_id = Auth::user()->id;
	    //     $key =  substr(crc32(substr(Hash::make(Auth::user()->phone),54,6)),2);
	    //     $order->userKey =$key;
	    //     $order->phone = Auth::user()->phone;
	    //     $order->time = $OrderController->getUserDate($userArray[3]);
	    //     $order->people = $userArray[4];
	    //     $order->active = 1; //means it's bought

	    //     $firstTime = explode(":",$userArray[1])[0];
     //        $secondTime = explode(":",$userArray[2])[0];
            
     //        $scheduleIDs = $OrderController->getScheduleIDs($firstTime,$secondTime,$userArray[1],$userArray[2],$userArray[3]);


     //        foreach($scheduleIDs as $schedule){
    	// 		$schedule_order = new scheduleOrder();
    	// 		$schedule_order->order_id = $order->id;
    	// 		$schedule_order->schedule_id = $schedule->id;
    	// 		$schedule_order->save();
     //        }

     //        $error = "ტრანზაქცია წარმატებით დასრულდა! თქვენ გადამისამართდებით რამდენიმე წამში...";
     //        Session::forget('userOrder');
     //        return view('pages.ok',compact('error'));

	      
    	// }







	}
    public function startPayment($price,$start_time_first,$start_time_second,$end_time_first,$end_time_second,$week_id,$people){
    	$currency = 981;
  		$price = (int)$price*100;
  		$description = "dada";
  		$lang = 'GE';
  		$type = 'SMS';
  		$submit_url = 'https://securepay.ufc.ge:18443/ecomm2/MerchantHandler';

  		$certpath = public_path().'/certificate/cert.pem';
  		$certpass = 'Gkluyro0756kjyDJGYrj';
  		$ip = $_SERVER['REMOTE_ADDR'];


  		$userArray=[];
  		$userArray[] = $price;
  		$userArray[]=$start_time_first.":".$start_time_second;
  		$userArray[]=$end_time_first.":".$end_time_second;
  		$userArray[]=$week_id;
  		$userArray[]=$people;
  
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
