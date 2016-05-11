@extends('pages')

     
      @yield('headerinf')

 @section('content')


 <div class="row">
	
	<div class="row" id="tilescotainer" style="width:90%;margin-left:5%;margin-top:7%;height:71%;">
	<a class="col-lg-4 jumbotron" style="background-color:#00FFFF;" href="{{URL('seeproduct/Form1')}}"><h2>Form 1</h2></a>
  <a class="col-lg-4 jumbotron"  style="background-color:#8A2BE2;" href="{{URL('seeproduct/Form2')}}"><h2>Form 2</h2></a>
  <a class="col-lg-4 jumbotron"  style="background-color:#5F9EA0;" href="{{URL('seeproduct/Form3')}}"><h2>Form 3</h2></a>
  <a class="col-lg-4 jumbotron"  style="background-color:#008B8B;" href="{{URL('seeproduct/Form4')}}"><h2>Form 4</h2></a>
	</div>

 </div>
  @endsection

         @yield('headerinf')