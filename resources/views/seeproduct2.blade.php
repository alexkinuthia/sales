@extends('pages')

     
      @yield('headerinf')

 @section('content')


 <div class="row">
	
	<div class="row" id="tilescotainer2" style="width:80%;margin-left:10%;margin-top:2%;height:80%;">
	<a class="col-lg-3 jumbotron" style="background-color:#1E90FF;" href="{{URL('seeproduct/'.$class.'/Maths')}}"><h2>Maths</h2></a>
  <a class="col-lg-3 jumbotron"  style="background-color:#1E90FF;" href="{{URL('seeproduct/'.$class.'/English')}}"><h2>English</h2></a>
  <a class="col-lg-3 jumbotron"  style="background-color:#1E90FF;" href="{{URL('seeproduct/'.$class.'/Kiswahili')}}"><h2>Kiswahili</h2></a>
  <a class="col-lg-3 jumbotron"  style="background-color:#1E90FF;" href="{{URL('seeproduct/'.$class.'/Biology')}}"><h2>Biology</h2></a>
  <a class="col-lg-3 jumbotron"  style="background-color:#1E90FF;" href="{{URL('seeproduct/'.$class.'/Physics')}}"><h2>Physics</h2></a>
  <a class="col-lg-3 jumbotron"  style="background-color:#1E90FF;" href="{{URL('seeproduct/'.$class.'/Chemistry')}}"><h2>Chemistry</h2></a>
  <a class="col-lg-3 jumbotron"  style="background-color:#1E90FF;" href="{{URL('seeproduct/'.$class.'/History')}}"><h2>History</h2></a>
  <a class="col-lg-3 jumbotron"  style="background-color:#1E90FF;" href="{{URL('seeproduct/'.$class.'/Geography')}}"><h2>Geography</h2></a>
	</div>

 </div>
  @endsection

         @yield('headerinf')