@extends('pages')

     
      @yield('headerinf')

 @section('content')
<div class="row" style="height:86%;">
<fieldset class="col-lg-4" align="center" style="margin-top:10%;margin-left:36%;border:1px solid #d8d8d8;border-radius:5px;box-shadow:1px 1px 1px gray;" >
  {!! Form::open(array('url' => 'postlogin','class'=>'form-group','id'=>'loginform')) !!}
            <legend id="legendsignup" ><center>Sales Login</center></legend>
          <div class="form-group">
          {!! Form::label('email', 'E-Mail Address', array('class' => 'control-label')) !!}
          <div class="input-group">
            <span class="input-group-addon glyphicon glyphicon-user"></span>
          {!! Form::text('email',null,array('class'=>'form-control','placeholder'=>'someone@example.com','required'=>'required','type'=>'email')) !!}
           </div>
            <p id="email_error"></p>
          </div>
           <div class="form-group">
          {!! Form::label('pass', 'Password', array('class' => 'control-label')) !!}
          <div class="input-group">
            <span class="input-group-addon glyphicon glyphicon-lock"></span>
          {!! Form::password('password',array('class'=>'form-control','required'=>'required')) !!}
        </div>
          <p id="password_error"></p>
        </div>
        
     <p id="errmsg"></p>
          {!!Form::submit('Login',array('class'=>'btn btn-primary form-control'))!!}
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