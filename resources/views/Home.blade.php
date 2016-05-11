@extends('pages')

     
      @yield('headerinf')

 @section('content')
<!-- Carousel beginning -->
				<div id="myCarousel" class="carousel slide" data-ride="carousel">
  <!-- Indicators -->
  <ol class="carousel-indicators">
    <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
    <li data-target="#myCarousel" data-slide-to="1"></li>
    <li data-target="#myCarousel" data-slide-to="2"></li>
  </ol>

  <!-- Wrapper for slides -->
  <div class="carousel-inner" role="listbox">
    <div class="item active" id="firstimg">
      <img src="{{ URL::asset('sales/book1.jpg') }}" class="sliders" style="width:100%;height:425px" alt="Chania">
      <div class="carousel-caption">
        <h3>Welcome to our business</h3>
        <p>Here we are eager to give you the best service</p>
      </div>
    </div>

    <div class="item">
      <img src="{{  URL::asset('sales/book2.jpg') }}" class="sliders" style="width:100%;height:425px" alt="Chania">
      <div class="carousel-caption">
        <h3>Our aim</h3>
        <p>We are aimed at providing you with some of the best services possible</p>
      </div>
    </div>

    <div class="item">
      <img src="{{ URL::asset('sales/book3.jpg') }}" class="sliders" style="width:100%;height:425px" alt="Flower">
      <div class="carousel-caption">
        <h3>Our goal</h3>
        <p>Make you the best at what you do</p>
      </div>
    </div>
  </div>

  <!-- Left and right controls -->
 <!--  <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
    <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
    <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a> -->
</div>
		<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
		<!-- end of ccarousel -->

		<!-- summar start -->
		<div class="row">
      <div class="row jumbotron" style="background-color:white;"><h1><center>Our Products</center></h1></div>
		<div class="col-lg-3">
			<div class="card card-block">
	        <h3 class="card-title cardhead"><center class="">Kitchen Supplies</center></h3>
	        <hr>
	        <p class="card-text">
          Consectetuer adipiscing elit. Nam pede erat, porta eu, lobortis eget, tempus et, tellus. Etiam neque. Vivamus consequat lorem at nisl. Nullam non wisi a sem semper eleifend. Donec mattis libero eget urna. Duis pretium velit ac mauris
          </p>
	        <a style="color:white" class="btn btn-primary" href="#">Buy them <span class="glyphicon glyphicon-forward"></span></a>
	         </div>
        </div>

        	<div class="col-lg-3">
			<div class="card card-block">
	        <h3 class="card-title cardhead"><center class="">Books</center></h3>
	        <hr>
	        <p class="card-text">Consectetuer adipiscing elit. Nam pede erat, porta eu, lobortis eget, tempus et, tellus. Etiam neque. Vivamus consequat lorem at nisl. Nullam non wisi a sem semper eleifend. Donec mattis libero eget urna. Duis pretium velit ac mauris</p>
	         <a style="color:white" class="btn btn-primary" href="#">Buy them <span class="glyphicon glyphicon-forward"></span></a>
	        </div>
        </div>
        	<div class="col-lg-3">
			<div class="card card-block">
	        <h3 class="card-title cardhead"><center class="">Clothes</center></h3>
	        <hr>
	        <p class="card-text">Consectetuer adipiscing elit. Nam pede erat, porta eu, lobortis eget, tempus et, tellus. Etiam neque. Vivamus consequat lorem at nisl. Nullam non wisi a sem semper eleifend. Donec mattis libero eget urna. Duis pretium velit ac mauris</p>
	        <a style="color:white" class="btn btn-primary" href="#">Buy them <span class="glyphicon glyphicon-forward"></span></a>
	        </div>
        </div>
        	<div class="col-lg-3">
			<div class="card card-block">
	        <h3 class="card-title cardhead"><center class="">Toys</center></h3>
	        <hr>
	        <p class="card-text">Consectetuer adipiscing elit. Nam pede erat, porta eu, lobortis eget, tempus et, tellus. Etiam neque. Vivamus consequat lorem at nisl. Nullam non wisi a sem semper eleifend. Donec mattis libero eget urna. Duis pretium velit ac mauris</p>
	         <a style="color:white" class="btn btn-primary" href="#">Buy them <span class="glyphicon glyphicon-forward"/></span></a>
	        </div>
        </div>
    </div>

    <div class="row jumbotron" style="background-color:#bdc3c7;">
    	<h1><center>About Us</center></h1><br>
    	<p id="head-text">
        Donec leo. Vivamus fermentum nibh in augue. Praesent a lacus at urna congue rutrum. Nulla enim eros, porttitor eu, tempus id, varius non, nibh. Vestibulum imperdiet, magna nec eleifend semper augue mattis wisi maecenas ligula nunc lectus vestibulum euismod lacinia quam nisl.
      </p>
      </div>

      @endsection

         @yield('headerinf')