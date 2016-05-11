@extends('pages')

     
      @yield('headerinf')

 @section('content')


 <div class="row">
	


	<div class="row" style="width:50%;margin-left:25%;margin-top:5%;">
		@if (Session::has('messageerr'))
    	<div class="alert alert-danger" style="text-align:center">{{ Session::get('messageerr') }}</div>
    	@elseif(Session::has('messagesuccess'))
    	<div class="alert alert-success" style="text-align:center">{{ Session::get('messagesuccess') }}</div>
		@endif
		<fieldset class="col-lg-12" align="center"  >
  {!! Form::open(array('url' => 'create','class'=>'form-group')) !!}
            <legend id="legendsignup" ><center>Create New Product</center></legend>
          <div class="form-group">
          {!! Form::label('form', 'Choose Class Level', array('class' => 'control-label')) !!}
           <select class="form-control" name="class" required='required'>
           	<option></option>
            <option value="Form1">Form 1</option>
            <option value="Form2">Form 2</option>
            <option value="Form2">Form 3</option>
            <option value="Form2">Form 4</option>
          </select>
            <p id="class_error"></p>
          </div>
           <div class="form-group">
		          {!! Form::label('subject', 'Choose Subject', array('class' => 'control-label')) !!}
		          
		          <select class="form-control" name="subject" required='required'>
		            <option></option>
		            <option value="Maths">Maths</option>
		            <option value="English">English</option>
		            <option value="Kiswahili">Kiswahili</option>
		            <option value="Chemistry">Chemistry</option>
		            <option value="Biology">Biology</option>
		            <option value="Physics">Physics</option>
		            <option value="History">History</option>
		            <option value="Geography">Geography</option>
          		</select>
          		<p id="subject_error"></p>
        </div>

         <div class="form-group">
		          {!! Form::label('Category', 'Choose Subject', array('class' => 'control-label')) !!}
		          
		        <select class="form-control" name="category" required='required'>
		            <option></option>
		            <option value="Maths"></option>
		            <option value="Videos">Videos</option>
		            <option value="Questions">Questions</option>
		            
          		</select>
          		<p id="category_error"></p>
        </div>

          <div class="form-group">
		          {!! Form::label('price', 'Price', array('class' => 'control-label')) !!}
		          {!! Form::number('price',null,array('class'=>'form-control','required'=>'required')) !!}

		       
          		<p id="price_error"></p>
        </div>

         <div class="form-group">
		          {!! Form::label('discount', 'Discount in %', array('class' => 'control-label')) !!}
		          {!! Form::number('discount',null,array('class'=>'form-control','required'=>'required','max'=>'100','min'=>'0')) !!}

		       
          		<p id="price_error"></p>
        </div>

     <p id="errmsg"></p>
          {!!Form::submit('create',array('class'=>'btn btn-primary form-control'))!!}
          {!! Form::close() !!}<br>
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