@if(!Auth::check())


<div class="modal fade" id="modal-login" tabindex="-1" role="dialog" aria-labelledby="modal-login" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" >&nbsp;</h4>
      </div>
      <div class="modal-body">
			<div class="container-fluid">
			<div class="modal-form-login">
			<center>
			<div class="media">
			  <div class="media-left media-middle">
				<a href="#">
				  <img src="{{URL::to("/")}}/img/solusi-ibuattack.png" width="110">
				</a>
			  </div>
			  <div class="media-body">
				<h4 class="media-heading"></h4>
				  <h1 class="text-center"><strong>Login</strong></h1>
			  </div>
			</div>
			</center>

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
					</div>
				</div>	
				<div class="form-group">
				<div class="col-xs-12 text-center" ><a href="{{URL::action('UsersController@forgotPassword')}}" >Forgot Password </a> | <a href="{{URL::action('UsersController@create')}}"> Register</a></div>
				</div>
			</form>
			</div>
			</div>	  
	  
	  
      </div>

    </div>
  </div>
</div>
@endif
