@extends('pages')

     
      @yield('headerinf')

 @section('content')


 <div class="row" style="height:85%">
	
    @if (Session::has('messageerr'))
      <div class="alert alert-danger" style="text-align:center">{{ Session::get('messageerr') }}</div>
      @elseif(Session::has('messagesuccess'))
      <div class="alert alert-success" style="text-align:center">{{ Session::get('messagesuccess') }}</div>
    @endif
  
  <div class="row" style="margin-top:6%;width:80%;margin-left:10%;">
     @if(count($cart)==0)
     <h1><center>No Item has been added to cart</center></h1>
            @else
  <table class="table table-condensed">



                <thead>
                    <tr class="cart_menu">
                        <td >Package</td>
                        <td >Price</td>
                        <td class="price">Discount</td>
                        <td class="quantity">Quantity</td>
                        <td class="total">Total</td>
                        <td>Reduce</td>
                        <td>Remove</td>
                        <td></td>
                    </tr>
                </thead>
                <tbody>
                  <?php $totald=0; $amount=0;?>

                  @foreach($cart as $item)
                  <tr>
                    <td>{{$item->name}}</td>
                    <td>{{$item->price}}</td>
                    <td>{{$item->options->discount}}%</td>
                    <td>{{$item->qty}}</td>
                    <td>{{$item->price}}</td>
                    <td><a href="{{URL('reducecartitem/'.$item->id)}}" class="btn btn-primary">Reduce</a></td>
                    <td><a href="{{URL('removecartitem/'.$item->id)}}" class="btn btn-primary">Remove from cart</a></td>
                  </tr>
                  <?php $totald=$totald+((int)$item->options->discount);
                  $amount = $amount+((int)$item->price);
                  ?>
                  @endforeach
                 <?php 
                  $total=$amount;
                  $d=0;
                  $t=count($cart);
                  if($t>1)
                    {
                      $d=((($totald/$t)/100)*$total);
                      $total=$total-$d;
                    }
                    else
                    {
                      $total=$amount;
                    }
                    ?>
                </tbody>
                 
                <tfoot>
                <tr>
                    <td colspan="2">Total Discount</td>
                    <td colspan="2">{{$totald}} %</td>
                    <td colspan="1">Total Price</td>
                    <td col-span="1">{{$total}}</td>
                    <td col-span="1">

                      {!! Form::open(array('url' => 'payment','class'=>'form-group')) !!}
                      <input name="total" style="display:none" value="{{$total}}"/>
                      <input name="discount" style="display:none" value="{{$totald}}"/>
                      <button class="btn btn-success">Check out</button>
                      {!! Form::close() !!}

                    </td>
                  </tr>
                  </tfoot>

      </table>
      @endif

    </div>

 </div>
  @endsection

         @yield('headerinf')