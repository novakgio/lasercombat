<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use DB;
use App\Order;
use Session;
use App\User;
use App\scheduleOrder;
use Hash;
use App\Photo;
use Auth;
use Box\Spout\Reader\ReaderFactory;
use Box\Spout\Writer\WriterFactory;
use Box\Spout\Common\Type;
use Box\Spout\Writer\Style\StyleBuilder;
use Box\Spout\Writer\Style\Color;

class AdminController extends Controller
{
    //

     public  $weekDayGeorgian = array(
        "Sunday"=>'კვირა',
        "Monday"=>'ორშაბათი',
        "Tuesday"=>'სამშაბათი',
        "Wednesday"=>'ოთხშაბათი',
        "Thursday"=>'ხუთშაბათი',
        "Friday"=>'პარასკევი',
        "Saturday"=>'შაბათი'
    );

      public  $weekDayArray = array(
        "Sunday"=>1,
        "Monday"=>2,
        "Tuesday"=>3,
        "Wednesday"=>4,
        "Thursday"=>5,
        "Friday"=>6,
        "Saturday"=>7
    );


    public function index(){
    	
        if(Auth::user()){
            if(Auth::user()->name=="laserlaser123"){
                return redirect('/reserve');
            }
        }
        return view('admin.login');
    }




    public function reserved(){
    	$orders= $this->makeQuery(2);
        $ordersArray = $this->makeOrdersArray($orders);
        return view('admin.reserve',compact('orders','ordersArray'));
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
    	
        return DB::SELECT("SELECT `schedules`.`time`,`order_schedule`.`order_id`,`orders`.`name`,`orders`.`phone`,
            `orders`.`trans_id`,`orders`.`phone`,`orders`.`remaining`,
            `orders`.`success`,`orders`.`userkey`,`schedules`.`day_id`,`orders`.`active`,
                            `orders`.`time` as order_time,`orders`.`people`,`orders`.`price`,`orders`.`id`,`orders`.`user_id` FROM `orders`  JOIN `order_schedule` ON `orders`.`id` = `order_schedule`.`order_id` 
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

    public function disableOrder($id){
        $order = Order::findOrFail($id);
        $order->active = 0;

        if($order->save()){
            Session::flash('orderDisable','ორდერი წარმატებით გაუქმდა');
        }
        return redirect('/reserve');
    }

    public function deleteOrder($id){
        $order = Order::findOrFail($id);
        if($order){
            $deleteSchedules = scheduleOrder::where('order_id','=',$order->id)->delete();
            $order = $order->delete();
            if($order && $deleteSchedules){
                Session::flash('deleteOrder','ორდერი წარმატებით წაიშალა');
            }
        }
        return redirect('/reserve');
    }

    public function successpayment($id){
        $order = Order::findOrFail($id);
        if($order){
            $order->success=1;
            $order->save();
        }
        return redirect('/reserve');
    }


    public function addOrder(){
        $weekDayDates = $this->getDates();
        return view('admin.addorder',compact('weekDayDates'));
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

    public function findcode(Request $request){
        $orders =  DB::SELECT("SELECT `schedules`.`time`,`order_schedule`.`order_id`,`orders`.`name`,`orders`.`success`,`orders`.`phone`,`orders`.`price`,`orders`.`userkey`,`orders`.`active`,`schedules`.`day_id`,
            `orders`.`trans_id`,`orders`.`phone`,`orders`.`remaining`,
                            `orders`.`time` as order_time,`orders`.`people`,`orders`.`price`,`orders`.`id`,`orders`.`user_id` FROM `orders`  JOIN `order_schedule` ON `orders`.`id` = `order_schedule`.`order_id` 
                    JOIN schedules ON schedules.id = order_schedule.schedule_id WHERE orders.userkey ='$request->userkey'");
        $ordersArray = $this->makeOrdersArray($orders);
        return view('admin.uniqueresult',compact('orders','ordersArray'));
    }


    public function checkAdmin(Request $request){
        $adminUser = User::where('name','=','laserlaser123')->first();


        if(Hash::check($request->password,$adminUser->password)){
            Auth::login($adminUser);
            return redirect('/reserve');
        }
        else{
            Session::flash('incorrect','არასწორი ლოგინი ან პაროლი');
            return back();
        }

    }

    public function logoutAdmin(){
        Auth::logout();
        return redirect('/');
    }

    public function photoUpload(){
        return view('admin.uploadphotos');
    }

    public function uploadPhoto(Request $request){
        if($request->file('image')==""){
            Session::flash('choosephoto','მიუთითე ფოტო');
            return back();
        }
        else{
            $fileName = time().'.'.$request->file('image')->getClientOriginalExtension();
            $destinationPath = public_path('galleryimages');
            $request->file('image')->move($destinationPath,$fileName);
            $photo = new Photo();
            $photo->img = $fileName;
            $photo->save();

            Session::flash('choosephoto','წარმატებით აიტვირთა');
            return back();
        }

    
    }

    public function getAllPhotos(){
        $photos = Photo::all();
        return view('admin.allphoto',compact('photos'));
    }

    public function deletePhoto($id){
        $photo = Photo::findOrFail($id);
        $photo->delete();
        return back();
    }
}
