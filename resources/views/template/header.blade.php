
	@section('headerinf')
	<head>
	<title>Sales</title>
	<meta name="_token" content="{{csrf_token()}}">
	<link rel="stylesheet" type="text/css" href="{{ URL::asset('boot/css/bootstrap.min.css') }}">
		<link rel="stylesheet" type="text/css" href="{{ URL::asset('css/bootstrap-datetimepicker.css') }}">
		<link rel="stylesheet" type="text/css" href="{{ URL::asset('css/style.css') }}">
	<script type="text/javascript" src="{{ URL::asset('js/jquery-1.12.0.min.js') }}"></script>
	<script type="text/javascript" src="{{ URL::asset('boot/js/bootstrap.min.js') }}"></script>
	  <script type="text/javascript" src="{{ URL::asset('js/moment.min.js') }}"></script>
	  <script type="text/javascript" src="{{ URL::asset('js/bootstrap-datetimepicker.min.js') }}"></script>
	  <script type="text/javascript" src="{{ URL::asset('js/script.js') }}"></script>
	  
</head>

<body class="container">
	@endsection


@section('navigation')
	<!-- Navigation bar -->
	<nav class="navbar navbar-inverse" id="navlog">
		  <div class="container-fluid">
		    <div class="navbar-header">
          <button class="navbar-toggle collapsed" aria-expanded="false" aria-controls="bs-navbar" data-target="#bs-navbar" data-toggle="collapse" type="button">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            </button>

		      <a class="navbar-brand" href="#" style="color:white;font-weight:bolder;font-size:20px;">Sales</a>
		    </div>
        <nav id="bs-navbar" class="collapse navbar-collapse" style="z-index:10000000;">
		    <ul class="nav navbar-nav" style="margin-left: 20% ;color:white">
		      
		           @if(Session::get('fname'))
		           <li><a href="{{URL('seeproduct')}}" class="classactive glyphicon glyphicon-home"> Home |</a></li>
		           @else
		           <li><a  href="{{URL('Home')}}" class="classactive glyphicon glyphicon-home"> Home |</a></li>
		           @endif
		      @if(Session::get('fname'))
		       <li><a href="{{URL('seecart')}}" class="classactive glyphicon glyphicon-shopping-cart"> Cart |</a></li>
		      <li><a href="{{URL('packagebought')}}" class="classactive glyphicon glyphicon-earphone"> See Products Bought |</a></li>
		      @endif
		      @if(Session::get('is_admin'))
		      <li class="dropdown">
		      	<a href="#" class="dropdown-toggle classactive glyphicon glyphicon-user" data-toggle="dropdown">Admin<span class="badge note"></span> |</a>
		     	 <ul class="dropdown-menu">
		          <li><a href="{{URL('productcreate')}}" class="classactive" style="color:black">Create Package</a></li>
		         
		        </ul>
		      </li> 
		      @endif
		      
		    </ul>
        
       <!--  <div class="class-xs-12 dropdown" style="width: 100;height:40">
       // @if(Session::get('img')!="")
      <img id="navuser" class="dropdown-toggle" data-toggle="dropdown" src="">
     // @else    
      <img id="navuser" class="dropdown-toggle" data-toggle="dropdown" src="">
 // @endif-->
 @if(Session::get('fname'))
  <div id="navbarlogin" class="navbar-right" style="">
<a class="btn btn-danger pull-right" href="{{URL('logout')}}">Logout</a>
<a style="color:white;font-size:18px;" class="pull-right btn">Welcome {{Session::get('fname')}}</a>
		</div>
 @else
    <div id="navbarlogin" class="navbar-right" style="">
<a class="btn btn-info pull-right" href="{{URL('login')}}">Login</a>
<a class="btn btn-info pull-right" href="{{URL('signup')}}">Signup</a>
		</div>
		@endif
    
  </div> 
  
  </ul>
      </nav>

		    
		  </div>

	</nav>
	  @endsection
	<!-- end of navigation bar -->