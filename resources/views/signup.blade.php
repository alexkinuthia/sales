@extends('pages')

     
      @yield('headerinf')

 @section('content')
<div class="row">
<fieldset class="col-lg-8" align="center" id="Signup">
            <legend id="legendsignup" ><center>Sales Sign Up</center></legend>
            <p><center class="text-info">Note: all fields should be filled before submitting the signup form.</center></p>
          <div class="col-lg-12">
          {!! Form::open(array('url' => 'postsignup','id'=>'signupform')) !!}
          <div class="form-group">
          {!! Form::label('fname', 'First Name', array('class' => 'control-label')) !!}
          {!! Form::text('firstname',null,array('class'=>'form-control','placeholder'=>'Alex','required'=>'required')) !!}
          <p id="firstname_error"></p>
          </div>
          <div class="form-group" >
          {!! Form::label('mname', 'Middle Name', array('class' => 'control-label')) !!}
          {!! Form::text('middlename',null,array('class'=>'form-control','placeholder'=>'Paul','required'=>'required')) !!}
          <p id="middlename_error"></p>
          </div>
          <div class="form-group">
          {!! Form::label('lastname', 'LastName', array('class' => 'control-label')) !!}
          {!! Form::text('lastname',null,array('class'=>'form-control','placeholder'=>'Kinuthia','required'=>'required')) !!}
          <p id="lastname_error"></p>
          </div>
          
           <div class="form-group">
           
          {!! Form::label('Mobile', 'Mobile Number', array('class' => 'control-label')) !!}
          {!! Form::text('mobile',null,array('class'=>'form-control','placeholder'=>'07089098098','id'=>'mobile')) !!}
            <p id="mobile_error"></p>
          </div>
          <div class="form-group">
          {!! Form::label('email', 'E-Mail Address', array('class' => 'control-label')) !!}
          {!! Form::text('email',null,array('class'=>'form-control','placeholder'=>'someone@example.com','required'=>'required','type'=>'email')) !!}
            <p id="email_error"></p>
          </div>
           <div class="form-group">
          {!! Form::label('pass', 'Password', array('class' => 'control-label')) !!}
          {!! Form::password('password',array('class'=>'form-control','required'=>'required')) !!}
          <p id="password_error"></p>
        </div>
          <div class="form-group">
          {!! Form::label('cpass', 'Confirm Password', array('class' => 'control-label')) !!}
          {!! Form::password('password_confirmation',array('class'=>'form-control','required'=>'required')) !!}
           <p id="password_confirmation_error"></p>
        </div>
   
          {!!Form::submit('Submit',array('class'=>'btn btn-primary form-control'))!!}
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

      </div>
        @endsection

         @yield('headerinf')