<!DOCTYPE html>
<html>
<head>
@include("layout.head")
</head>

<body>

<div class="container-fluid">
<div class="form-login">
<center>
<div class="media">
  <div class="media-left media-middle">
    <a href="#">
      <img src="{{URL::to('/')}}/img/solusi-ibuattack.png" width="110">
    </a>
  </div>
  <div class="media-body">
    <h4 class="media-heading"></h4>
      <h1 class="text-center"><strong>Login</strong></h1>
  </div>
</div>
</center>
@if (Session::has('error'))
            <div class="alert alert-error alert-danger">{{{ Session::get('error') }}}</div>
        @endif

        @if (Session::has('notice'))
            <div class="alert">{{{ Session::get('notice') }}}</div>
        @endif

<form class="form-horizontal" role="form" method="POST" action="{{{ URL::to('/users/login') }}}" accept-charset="UTF-8">
	<div class="form-group">
	<label class="col-xs-3 control-label"></label>
		<div class="col-xs-7">
		<div class="input-group">
		<span class="input-group-addon" ><i class="fa fa-user"></i></span>
            <input class="form-control" tabindex="1" placeholder="{{{ Lang::get('confide::confide.e_mail') }}}" type="text" name="email" id="email" value="{{{ Input::old('email') }}}">			 
	    </div>
		</div>
	</div>
	<div class="form-group">
	<label class="col-xs-3 control-label"></label>
		<div class="col-xs-7">
			<div class="input-group">
			     <span class="input-group-addon" ><i class="fa fa-key"></i></span>	
				 <input class="form-control" tabindex="2" placeholder="{{{ Lang::get('confide::confide.password') }}}" type="password" name="password" id="password">
				 <br>
			</div>
		</div>
	</div>
	<div class="form-group">
		<div class="col-xs-7 col-xs-offset-4">
		<button type="submit" class="btn btn-primary">Login</button> 
		<a class="btn btn-facebook" href=""> <i class="fa fa-facebook"></i></a> 
		<a class="btn btn-twitter" href=""> <i class="fa fa-twitter"></i></a> 
		</div>
	</div>	
	<div class="form-group">
	<div class="col-xs-12 text-center"><a href="#">Forgot Password </a> | <a href=""> Register</a></div>
	</div>
</form>
</div>
</div>
</body>
</html>