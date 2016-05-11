@extends('pages')

     
      @yield('headerinf')

 @section('content')


 <div class="row">
	


	<div class="row" style="width:50%;margin-left:25%;margin-top:5%;height:90%">
		@if (Session::has('messageerr'))
      <div class="alert alert-danger" style="text-align:center">{{ Session::get('messageerr') }}</div>
      @elseif(Session::has('messagesuccess'))
      <div class="alert alert-success" style="text-align:center">{{ Session::get('messagesuccess') }}</div>
    @endif
		<fieldset class="col-lg-12" align="center"  >

      @foreach($product as $p)

  {!! Form::open(array('url' => 'posteditproduct','class'=>'form-group')) !!}
            <legend id="legendsignup" ><center>Edit package</center></legend>
            <input name="id" style="display:none" value="{{$p->product_id}}">
          <div class="form-group">
          {!! Form::label('form', 'Choose Class Level', array('class' => 'control-label')) !!}<br>
           {{$p->Form}}
            <p id="class_error"></p>
          </div>
           <div class="form-group">
		          {!! Form::label('subject', 'Choose Subject', array('class' => 'control-label')) !!}<br>
		          
		         {{$p->Subject}}
          		<p id="subject_error"></p>
        </div>

         <div class="form-group">
		          {!! Form::label('Category', 'Choose Subject', array('class' => 'control-label')) !!}<br>
		          
		        {{$p->product_description}}
          		<p id="category_error"></p>
        </div>

          <div class="form-group">
		          {!! Form::label('price', 'Price', array('class' => 'control-label')) !!}
		          {!! Form::number('price',$p->price,array('class'=>'form-control','required'=>'required')) !!}

		       
          		<p id="price_error"></p>
        </div>

         <div class="form-group">
		          {!! Form::label('discount', 'Discount in %', array('class' => 'control-label')) !!}
		          {!! Form::number('discount',$p->discount,array('class'=>'form-control','required'=>'required','max'=>'100','min'=>'0')) !!}

		       
          		<p id="price_error"></p>
        </div>

     <p id="errmsg"></p>
          {!!Form::submit('change',array('class'=>'btn btn-primary form-control'))!!}
          {!! Form::close() !!}<br>

          @endforeach

           <div class="row" id="successMessage"></div><br>
            @if($errors->any())
            <ul class="alert alert-danger">
              @foreach($errors->all() as $error )
              <li>{{$error}}</li>
              @endforeach
            </ul>
            @endif
        </fieldset>

        @if (Session::has('messageerr'))
    	<div class="alert alert-danger" style="text-align:center">{{ Session::get('messageerr') }}</div>
		@endif
	</div>

 </div>
  @endsection

         @yield('headerinf')