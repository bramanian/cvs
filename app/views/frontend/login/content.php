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

<form class="form-horizontal">
	<div class="form-group">
	<label class="col-xs-3 control-label"></label>
		<div class="col-xs-7">
		<div class="input-group">
		<span class="input-group-addon" ><i class="fa fa-user"></i></span>
             <input type="text" value="" name="username" placeholder="username" class="form-control">		
	    </div>
		</div>
	</div>
	<div class="form-group">
	<label class="col-xs-3 control-label"></label>
		<div class="col-xs-7">
			<div class="input-group">
			     <span class="input-group-addon" ><i class="fa fa-key"></i></span>	
				 <input type="password" value="" name="username" placeholder="password" class="form-control">	<br>
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
	<div class="col-xs-12 text-center"><a href="{{URL::action('UsersController@forgotPassword')}}" >Forgot Password </a> | <a href="{{URL::action('UsersController@create')}}"> Register</a></div>
	</div>
</form>
</div>
</div>