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

	public function ok(){
		$certpath = getcwd().'/public/certificate/lasercertificate.pem';
	    $certpass = 'Gkluyro0756kjyDJGYrj';
	    $ip = $_SERVER['REMOTE_ADDR'];
	    $tid = $_REQUEST['trans_id'];

	    $curl = new Curl();
	    $curl->setOpt(CURLOPT_SSLCERT, $certpath);
	    $curl->setOpt(CURLOPT_SSLKEY, $certpath);
	    $curl->setOpt(CURLOPT_SSLKEYPASSWD, $certpass);
	    $curl->setOpt(CURLOPT_SSL_VERIFYPEER, 0);
	    $curl->setOpt(CURLOPT_SSL_VERIFYHOST, 0);
	    $curl->setOpt(CURLOPT_TIMEOUT, 120);
	    $curl->post('https://securepay.ufc.ge:18443/ecomm2/MerchantHandler', array(
	      'command' => 'c',
	      'trans_id' => $tid,
	      'client_ip_addr' => $ip,
	    ));


	    $array = explode(" ", $curl->response);
	    if($array[1] == "FAILED") {
	      $error = "ვერ მოხერხდა თანხის დამუშავება/გადახდა";
	      return view('pages.fail',compact('error'));
	    } else {
	    	$userArray = Session::get('userOrder');
	    	return var_dump($userArray);
	    	$OrderController = new order;
		    $order = new Order();
	        $order->user_id = Auth::user()->id;
	        $key =  substr(crc32(substr(Hash::make("555105655"),54,6)),2);
	        $order->userKey =$key;
	        $order->phone = "555105655";
	        $order->time = $OrderController->getUserDate($userArray[3]);
	        $order->people = $userArray[4];
	        $order->active = 1; //means it's bought

	        $firstTime = explode(":",$userArray[1])[0];
            $secondTime = explode(":",$userArray[2])[0];
            
            $scheduleIDs = $OrderController->getScheduleIDs($firstTime,$secondTime,$userArray[1],$userArray[2],$userArray[3]);


            foreach($scheduleIDs as $schedule){
    			$schedule_order = new scheduleOrder();
    			$schedule_order->order_id = $order->id;
    			$schedule_order->schedule_id = $schedule->id;
    			$schedule_order->save();
            }

            $error = "ტრანზაქცია წარმატებით დასრულდა! თქვენ გადამისამართდებით რამდენიმე წამში...";
            Session::forget('userOrder');
            return view('pages.ok',compact('error'));

	      
    }







	}
    public function startPayment($price,$start_time,$end_time,$week_id,$people){
    	$currency = '840';
	      $description = "თამაშის განრიგი";
	      $lang = 'GE';
	      $type = 'SMS';

	      $certpath = getcwd().'/public/certificate/lasercertificate.pem';
	      $certpass = 'Gkluyro0756kjyDJGYrj';
	      $ip = $_SERVER['REMOTE_ADDR'];

	      $userArray=[];
	      $userArray[] = $price;
	      $userArray[]=$start_time;
	      $userArray[]=$end_time;
	      $userArray[]=$week_id;
	      $userArray[]=$people;
	      //curl
	      $curl = new Curl();
	      $curl->setOpt(CURLOPT_SSLCERT, $certpath);
	      $curl->setOpt(CURLOPT_SSLKEY, $certpath);
	      $curl->setOpt(CURLOPT_SSLKEYPASSWD, $certpass);
	      $curl->setOpt(CURLOPT_SSL_VERIFYPEER, 0);
	      $curl->setOpt(CURLOPT_SSL_VERIFYHOST, 0);
	      $curl->setOpt(CURLOPT_TIMEOUT, 120);
	      $curl->post('https://securepay.ufc.ge:18443/ecomm2/MerchantHandler', array(
	        'command' => 'v',
	        'amount' => $price,
	        'currency' => $currency,
	        'client_ip_addr' => $ip,
	        'description' => $description,
	        'language' => $lang,
	        'msg_type' => $type,
	      ));

	      if ($curl->error) {
	      	return view('pages.fail',compact('სერვერული ხარვეზი'));
	      } else {
	        $tid = substr($curl->response, 16);
	        
	       	Session::put('userOrder',$userArray);
	        return view('pages.tbcview', compact('tid'));
	      }
		
		

    }
}
