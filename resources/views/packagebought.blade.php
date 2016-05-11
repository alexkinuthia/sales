@extends('pages')

     
      @yield('headerinf')

 @section('content')


 <div class="row" style="height:85%">
  
  <div class="row" style="margin-top:6%;width:80%;margin-left:10%;">
  <table class="table table-condensed">
                <thead>
                    <tr class="cart_menu">
                        <td >Package</td>
                        <td >Price of Item</td>
                        <td class="price">Discount</td>
                        <td class="quantity">Price Bought at</td>
                         <td class="quantity">Date Bought</td>
                          <td class="quantity">Date Renewed</td>
                        <td>view</td>
                        
                    </tr>
                </thead>
                <tbody>
                  <?php $totald=0;?>
                  @foreach($product as $item)
                  <tr>
                    <td>{{$item->Subject}} {{$item->Form}} {{$item->product_description}}</td>
                    <td>{{$item->price}}</td>
                    <td>{{$item->discount}}%</td>
                    <td>{{$item->prices}}</td>
                    <td>{{$item->created_at}}</td>
                    <td>{{$item->updated_at}}</td>
                    <td><?php 
                    $date = new datetime($item->expirydate);
                    $today = new DateTime();
                    if($date>$today)
                    {
                      echo "<a class='btn btn-success'>View Package</a>";
                    }
                    else
                    {
                      echo "<button class='btn btn-danger'>Expired</button>";
                    }
                    ?></td>
                 
                  </tr>
                 
                  @endforeach
                 
                </tbody>

      </table>


    </div>

 </div>
  @endsection

         @yield('headerinf')