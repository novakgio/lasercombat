<?php


/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', 'indexController@getMainPage');

Route::post('/register','RegistrationController@store');


Route::post('login','LoginController@checkLogin');

Route::get('/login',function(){

	

});


Route::get('/tbcpayment/{order_id}','TbcController@startPayment');

Route::get('/useremailexcel','AdminController@emails');
Route::get('/admin','AdminController@index');


Route::get('/reserve','AdminController@reserved');
Route::get('/bought','AdminController@bought');
Route::get('/timeover','AdminController@timeover');

Route::post('emailsend','indexController@emailsend');

Route::get('/test',function(){
		$ch = curl_init("http://141.170.228.129:59055/<nameservice>getktypeforvrmdatacar</nameservice><emailclient>vlookup@inetserv-global.com</emailclient><vrmnum>E11AYC</vrmnum><securecode>4F5A0AAF827EA375753715070F04C2D8</securecode>"); // such as http://example.com/example.xml
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HEADER, 0);
        $data = (string)curl_exec($ch);
        curl_close($ch);

        var_dump($data);
	
});

Route::get('/afteruserpayment','paymentController@ok');
Route::post('checkOrder','OrderController@makeOrder');
Route::post('dayOrder','indexController@getDayOrders');

Route::post('getUserOrder','indexController@getUserOrder');
Route::get('/check',function(){
	
	for($i=1;$i<8;$i++){
		
		for($a=14;$a<24;$a++){
			for($z=0;$z<60;$z=$z+10){
				$order = new Order();
				$order->day_id = $i;
				$order->reserved = 0;
				if($z==0) {
					$order->time = $a.":"."00";
				}
				else{
					$order->time = $a.":".$z;
				}
				$order->save();
				
				
			}
		}

		$order = new Order();
		$order->day_id = $i;
		$order->reserved = 0;
		$order->time = "00:00";
		$order->save();
		$order = new Order();
		$order->day_id = $i;
		$order->reserved = 0;
		$order->time = "00:10";
		$order->save();
		$order = new Order();
		$order->day_id = $i;
		$order->reserved = 0;
		$order->time = "00:20";
		$order->save();
		$order = new Order();
		$order->day_id = $i;
		$order->reserved = 0;
		$order->time = "00:30";
		$order->save();
		$order = new Order();
		$order->day_id = $i;
		$order->reserved = 0;
		$order->time = "00:40";
		$order->save();
		$order = new Order();
		$order->day_id = $i;
		$order->reserved = 0;
		$order->time = "00:50";
		$order->save();
		$order = new Order();
		$order->day_id = $i;
		$order->reserved = 0;
		$order->time = "01:00";
		$order->save();
		$order = new Order();
		$order->day_id = $i;
		$order->reserved = 0;
		$order->time = "01:10";
		$order->save();
		$order = new Order();
		$order->day_id = $i;
		$order->reserved = 0;
		$order->time = "01:20";
		$order->save();
		$order = new Order();
		$order->day_id = $i;
		$order->reserved = 0;
		$order->time = "01:30";
		$order->save();
		$order = new Order();
		$order->day_id = $i;
		$order->reserved = 0;
		$order->time = "01:40";
		$order->save();
		$order = new Order();
		$order->day_id = $i;
		$order->reserved = 0;
		$order->time = "01:50";
		$order->save();
		$order = new Order();
		$order->day_id = $i;
		$order->reserved = 0;
		$order->time = "02:00";
		$order->save();

		

	}


});
Route::get('/logout','RegistrationController@logout')->name('logout');



Route::get('/loginfacebook', 'facebookController@redirectToProvider');
Route::get('/callback', 'facebookController@handleProviderCallback');