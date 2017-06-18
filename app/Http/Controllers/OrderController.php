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
    //
    // mysql time zone not working
    // send mails
	private $errors;
    public function makeOrder(Request $request){
    	$error="";
    	$checkOrder = DB::SELECT("SELECT * FROM  `schedules` JOIN order_schedule ON order_schedule.schedule_id=schedules.id
                                JOIN `orders` ON `orders`.`id`=`order_schedule`.`order_id`
								WHERE `schedules`.`time`>='$request->start_time' AND `orders`.`active`!=0 AND `schedules`.`time`<='$request->end_time' and day_id='$request->week_id'"
						);

    	if(!empty($checkOrder)){
    		$error = "ამ დროის შეკვეთა უკვე არსებობს სამწუხაროდ";
    	}
    	else{
           
    		$scheduleIDs = DB::SELECT("SELECT * FROM  `schedules`
								WHERE time>='$request->start_time' AND time<='$request->end_time' and day_id='$request->week_id'"
							);
			$user_id = Auth::user()->id;
			$order = new Order();
			$order->user_id = $user_id;
			// $order->time = $this->getUserOrderDate($request->week_id);
			date_default_timezone_set('Asia/Tbilisi');
			$order->time = date('Y-m-d H:i:s');
			$order->people = $request->people_range;
            $order->active = 2; //2 or 1 or 3 later implementation
            $order->save();

			foreach($scheduleIDs as $schedule){
				$schedule_order = new scheduleOrder();
				$schedule_order->order_id = $order->id;
				$schedule_order->schedule_id = $schedule->id;
				
				if($schedule_order->save())$error = "შეკვეთა მიღებულია";

			}
            
    	}

    	return compact('error');
    	
    }

    private function getUserOrderDate($week_id){
    	$indexController = new index();
    	$weekDayArray = $indexController->getDates();
    	foreach($weekDayArray as $eachDay){
    		if($eachDay['id']==$week_id)
    			return $eachDay['date'];
    	}
    }
    public function test(){
      $amount = $cart->price * 100;
      $amount = (string)$amount;
      $currency = '840';
      $description = $cart->price.'||'.$cart->link;
      $lang = 'GE';
      $type = 'SMS';

      $certpath = getcwd().'/andadasi/certificate/certificate.pem';
      $certpass = 'KLjfio76rkHGCKyrio';
      $ip = $_SERVER['REMOTE_ADDR'];

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
        'amount' => $amount,
        'currency' => $currency,
        'client_ip_addr' => $ip,
        'description' => $description,
        'language' => $lang,
        'msg_type' => $type,
      ));

      if ($curl->error) {
        echo 'Error: ' . $curl->errorCode . ': ' . $curl->errorMessage . "\n";
      } else {
        $tid = substr($curl->response, 16);
        session(['cid' => $cart->id]);
        return view('user.order', compact('tid'));
      }
  }


  public function cron(){
        require '../../vendor/autoload.php';

        use \Curl\Curl;

        date_default_timezone_set('Asia/Tbilisi');

        $certpath = '/data/www/onlinesh/public_html/public/andadasi/certificate/certificate.pem';
        $certpass = 'KLjfio76rkHGCKyrio';

        $curl = new Curl();
        $curl->setOpt(CURLOPT_SSLCERT, $certpath);
        $curl->setOpt(CURLOPT_SSLKEY, $certpath);
        $curl->setOpt(CURLOPT_SSLKEYPASSWD, $certpass);
        $curl->setOpt(CURLOPT_SSL_VERIFYPEER, 0);
        $curl->setOpt(CURLOPT_SSL_VERIFYHOST, 0);
        $curl->setOpt(CURLOPT_TIMEOUT, 120);
        $curl->post('https://securepay.ufc.ge:18443/ecomm2/MerchantHandler', array(
          'command' => 'b',
        ));

        if ($curl->error) {
          echo 'Error: ' . $curl->errorCode . ': ' . $curl->errorMessage . "\n";
        } else {
          echo 'Response:';
          echo $curl->response."<br>";
        }
          }

}
