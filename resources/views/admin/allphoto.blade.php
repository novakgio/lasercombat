<?php use App\User;?>
<!DOCTYPE html>
<html lang="en">

<head>


    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>SB Admin 2 - Bootstrap Admin Theme</title>

    <!-- Bootstrap Core CSS -->
     <link href="public/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="public/vendor/metisMenu/metisMenu.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="public/dist/css/sb-admin-2.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="public/vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

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

            
            <!-- /.navbar-top-links -->

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
 
 <a href="{{url('useremailexcel')}}">გადმოწერე იმეილების ექსელი</a>
  <table class="table table-bordered">
    <thead>
      <tr>
       <th>სურათი</th>
        <th>წაშლა</th>
      
      </tr>
    </thead>
   <tbody>
  <style>
   .img{
    width:70px;
    height:70px;
   }
   </style>
        @foreach($photos as $photo)
        <tr>
        <td><img class="img" src="public/galleryimages/<?php echo $photo->img;?>"></td>
        <td><a  href="{{ url('/deletephoto', [$photo->id]) }}" class="btn btn-danger">წაშალე სურათი</a></td>
        </tr>
        @endforeach
   
    
    </tbody>
  </table>
</div>

            
        </div>
        <!-- /#page-wrapper -->

    </div>

    <!-- jQuery -->
     <script src="public/vendor/jquery/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="public/vendor/bootstrap/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="public/vendor/metisMenu/metisMenu.min.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="public/dist/js/sb-admin-2.js"></script>
</body>

</html>
