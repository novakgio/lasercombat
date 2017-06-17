<?php

use App\Order;
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

Route::get('/admin','AdminController@index');


Route::get('/reservelate','AdminController@reserveLate');
Route::get('/reserveearly','AdminController@reserveEarly');
Route::get('/boughtlate','AdminController@boughtLate');
Route::get('/boughtearly','AdminController@boughtEarly');

Route::post('emailsend','indexController@emailsend');

Route::get('/test',function(){
	$orders = DB::SELECT("SELECT *
    						FROM `schedules` JOIN `order_schedule` ON `schedules`.`id` = `order_schedule`.`schedule_id`
    						JOIN `orders`  ON `order_schedule`.`order_id` = `orders`.`id`
    						WHERE `orders`.`user_id` = 1 AND `orders`.`active`!=0 
		");

	return $orders;

	
});
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