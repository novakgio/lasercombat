
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <meta charset="UTF-8">
    <title>SB Admin 2 - Bootstrap Admin Theme</title>

    <!-- Bootstrap Core CSS -->
    <link href="public/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="public/vendor/metisMenu/metisMenu.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="public/dist/css/sb-admin-2.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="public/vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" type="text/css" href="{{asset('public/css/sweetalert.css')}}" />
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

    <div id="wrapper">
<nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.html">SB Admin v2.0</a>
            </div>
            <!-- /.navbar-header -->

           
            <div class="navbar-default sidebar" role="navigation">
                <div class="sidebar-nav navbar-collapse">
                    <ul class="nav" id="side-menu">
                        <li class="sidebar-search">
                            <div class="input-group custom-search-form">
                            {!! Form::open(array('route' => 'findcode','method'=>'post')) !!}
                                <input type="text" name="userkey" class="form-control" placeholder="Search...">
                                <span class="input-group-btn">
                                <button class="btn btn-default" type="submit">
                                    <i class="fa fa-search"></i>
                                </button>
                            
                            </span>
                            {!! Form::close()!!}
                            </div>
                            <!-- /input-group -->
                        </li>
                        <li>
                            <a href="{{url('reserve')}}"><i class="fa fa-dashboard fa-fw"></i>დაჯავშნილების სია</a>
                        </li>
                       
                        <li>
                            <a href="{{url('bought')}}"><i class="fa fa-table fa-fw"></i>გაყიდულების  სია</a>
                        </li>

                         <li>
                            <a href="{{url('timeover')}}"><i class="fa fa-dashboard fa-fw"></i>ვადაგასულების სია</a>
                        </li>

                        <li>
                            <a href="{{url('addOrder')}}"><i class="fa fa-dashboard fa-fw"></i>დაამატე შეკვეთა</a>
                        </li>
                        <li>
                            <a href="{{url('uploadphoto')}}"><i class="fa fa-dashboard fa-fw"></i>ატვირთე ფოტო</a>
                        </li>
                         <li>
                            <a href="{{url('allphoto')}}"><i class="fa fa-dashboard fa-fw"></i>ყველა ფოტო</a>
                        </li>
                         <li>
                            <a href="{{url('logoutadmin')}}"><i class="fa fa-dashboard fa-fw"></i>გამოსვლა</a>
                        </li>
                    </ul>
                </div>
                <!-- /.sidebar-collapse -->
            </div>
            <!-- /.navbar-static-side -->
        </nav>
       
        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                @if(Session::has('orderDisable'))
                    <h1 class="page-header">{{Session::get('orderDisable')}}</h1>
                @elseif(Session::has('orderDelete'))
                    <h1 class="page-header">{{Session::get('orderDelete')}}</h1>
                @else
                    <h1 class="page-header">ყველა შეკვეთა</h1>
                @endif
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <style>

            .imageadmin{
                width:20px;
                height:20px;
            }

            </style>
            <!-- /.row -->
            <div class="container">
                @yield('content')

            </div>

            
        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- jQuery -->  <script src="https://code.jquery.com/jquery-1.10.2.js"></script>
    <script type="text/javascript" src="{{asset('public/js/sweetalert.min.js')}}"></script>
    <script>

    $(document).ready(function(){
         $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                });


        $("#addorder").on('click',function(){

           goToOrder();

        });
       function getDifferenceTime(start_time,second_time){
                    var day1="01";
                    var day2="01";
                    if(start_time.split(":")[0]=="00" || start_time.split(":")[0]=="01" || start_time.split(":")[0]=="02"){
                        day1="02";
                    }
                    if(second_time.split(":")[0]=="00" || second_time.split(":")[0]=="01" || second_time.split(":")[0]=="02"){
                        day2="02";
                    }
                    var timeStart = new Date("Mon Jan "+day1+" 2007 "+start_time+ " GMT+0530").getTime();
                    var timeEnd = new Date("Mon Jan "+day2+" 2007 "+second_time+" GMT+0530").getTime();
                    var hourDiff = timeStart - timeEnd; //in ms
                    var secDiff = hourDiff / 1000; //in s
                    var minDiff = hourDiff / 60 / 1000; //in minutes
                    var hDiff = hourDiff / 3600 / 1000; //in hours
                    var humanReadable = {};
                    humanReadable.hours = Math.floor(hDiff);
                    humanReadable.minutes = minDiff - 60 * humanReadable.hours;

                    return humanReadable;
                }

        
                 function timeValidation(start_time,end_time){

                    var start_firstTime =   parseInt(start_time.split(":")[0]); // like 14,15,16
                    var start_secondTime = parseInt(start_time.split(":")[1]); // like minutes,20,40,50
                    $min40 = "მინიმუმ შეგიძლიათ შეუკვეთოთ 20 წუთი";
                    $max80 = "მაქსიმუმ შეგიძლიათ შეუკვეთოთ 80 წუთი";
                    $valid = "მიუთითეთ ვალიდური დროები";

                    var end_firstTime = parseInt(end_time.split(":")[0]);
                    var end_secondTime = parseInt(end_time.split(":")[1]);
                    if(start_time.length!=5 || end_time.length!=5) return false;
                    else if(isNaN(start_secondTime) || isNaN(end_secondTime)) return false;


                    
                    if( (start_firstTime>=14 && start_firstTime<=23) || start_firstTime==00 || start_firstTime==01){
                        if( (end_firstTime>=14 && end_firstTime<=23) || end_firstTime==00 || end_firstTime==01 || (end_firstTime==02 && end_secondTime==00)){
                           var humanReadable = getDifferenceTime(end_time,start_time);
                            if(end_secondTime>=60 || start_secondTime>=60) return false;
                            if( (humanReadable.hours==0 && humanReadable.minutes==0) || humanReadable.hours<0) return $valid;
                            if(humanReadable.hours==1 && humanReadable.minutes>20) return $max80;
                            else if(humanReadable.hours==1 && humanReadable.minutes<=20) return true;


                            else if(humanReadable.hours==0 && humanReadable.minutes<20) return $min40;
                            else if(humanReadable.hours==0 && humanReadable.minutes>=20) return true;

                            else return $max80;

                        } else { return false;}
                    } else{return false;}

                    return true;
                }



         function goToOrder(){
                    var start_time = $('#start_time').val();
                    var end_time = $('#end_time').val();
                    var people_range=$('#people_range').val();
                    var week_id = $('#week_id').val();
                    var phone = $('#phone').val();
                    var name = $('#name').val();
                    
                    var validateTime = timeValidation(start_time,end_time);
                    var differenceTime = getDifferenceTime(end_time,start_time);
                    
                    
                    if(start_time=="" || end_time=="" || people_range<4 || name==""){
                        sweetAlert("Oops...", "შეავსეთ ყველა ველი,რათა დაჯავშნოთ", "error");
                    }
                    else if(validateTime==false){
                        sweetAlert("Oops...", "დრო შეგყავთ შემდეგი ფორმატით -  14:40, ღამის 12 საათი ითვლება 00:00,ხოლო ღამის პირველი საათი 01:00", "error");
                        
                    }
                    else if(validateTime!=true && validateTime!=false){
                        sweetAlert("Oops...", validateTime, "error");
                        
                    }
                    else{
                     $.ajax({
                            method: "POST",
                            url: "{{url('checkOrder')}}",
                            data:{start_time:start_time,end_time:end_time,phone:phone,people_range:people_range,week_id:week_id,differenceTime:differenceTime,name:name}
                        }) 
                        .done(function (data){
                            var result = data.error;
                            if(Number.isInteger(parseInt(result))){
                                sweetAlert("ყოჩაღ","შეკვეთა წარმატებით დაემატა ბაზაში",'success')
                            }
                            else{
                                sweetAlert("Oops...", result, "error");
                            }
                        });
                    }
                }








    });



    </script>
    <script src="public/vendor/jquery/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="public/vendor/bootstrap/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="public/vendor/metisMenu/metisMenu.min.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="public/dist/js/sb-admin-2.js"></script>

</body>

</html>
