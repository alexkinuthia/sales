@extends('pages')

     
      @yield('headerinf')

 @section('content')


 <div class="row">
	
	<div class="row" style="width:80%;margin-left:10%;margin-top:2%;height:80%;">

@foreach($product as $p)
    <div class="col-lg-5 jumbotron" style="background-color:#FAF0E6;margin-left:1%;">

    <div class="row"><h2>{{$p->Subject}} {{$p->Form}} {{$p->product_description}}<h2></div>
      <div class="row">Price is:${{$p->price}} with a discount of {{$p->discount}}%</div>
      <?php $row=Cart::search(array('id' => Request::get('product_id')));?>
      @if($row<1)
      {!! Form::open(array('url' => 'addcart','class'=>'form-group')) !!}
      <input name="id" style="display:none" value="{{$p->product_id}}"/>
      <input name="price" style="display:none" value="{{$p->price}}"/>
      <input name="discount" style="display:none" value="{{$p->discount}}"/>
      <input name="name" style="display:none" value="{{$p->Subject}} {{$p->Form}} {{$p->product_description}}"/>
      <div class="row"><button class="btn btn-primary glyphicon glyphicon-shopping-cart">Add to Cart</button>
         {!! Form::close() !!}
         @else
         <button class="btn btn-success">Product already in cart</button>
         @endif
         @if(Session::get('is_admin'))
        <a href="{{URL('editproduct/'.$p->product_id)}}"> Edit Package</a>
          @endif
      </div>
    </div>
@endforeach
	</div>

 </div>
  @endsection

         @yield('headerinf')