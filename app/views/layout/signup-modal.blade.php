@if(!Auth::check())


<div class="modal fade" id="modal-signup" tabindex="-1" role="dialog" aria-labelledby="modal-signup" aria-hidden="true">
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
				  <h1 class="text-center"><strong>SIGN UP</strong></h1>
			  </div>
			</div>
			</center>
             <div class="col-xs-offset-3">
			         @if (Session::get('error'))
						<div class="alert alert-error alert-danger">
							@if (is_array(Session::get('error')))
								{{ head(Session::get('error')) }}
							@endif
						</div>
					@endif

					@if (Session::get('notice'))
						<div class="alert">{{ Session::get('notice') }}</div>
					@endif
			 </div>
			<form class="form-horizontal" role="form" method="POST" action="{{{ URL::to('/users') }}}" accept-charset="UTF-8">
			<input type="hidden" name="_token" value="{{{ Session::getToken() }}}">
				<div class="form-group">
				<label class="col-xs-3 control-label"></label>
					<div class="col-xs-7">
					<div class="input-group">
					<span class="input-group-addon" ><i class="fa fa-user"></i></span>
						   <input class="form-control" placeholder="{{{ Lang::get('confide::confide.username') }}}" type="text" name="username" id="username" value="{{{ Input::old('username') }}}">
					</div>
					</div>
				</div>
				<div class="form-group">
				<label class="col-xs-3 control-label"></label>
					<div class="col-xs-7">
						<div class="input-group">
							 <span class="input-group-addon" ><i class="fa fa-envelope-o"></i></span>	
							   <input class="form-control" placeholder="{{{ Lang::get('confide::confide.e_mail') }}}" type="text" name="email" id="email" value="{{{ Input::old('email') }}}">
							 <br>
						</div>
					</div>
				</div>
				<div class="form-group">
				<label class="col-xs-3 control-label"></label>
					<div class="col-xs-7">
						<div class="input-group">
							 <span class="input-group-addon" ><i class="fa fa-key"></i></span>	
							   <input class="form-control" placeholder="{{{ Lang::get('confide::confide.password') }}}" type="password" name="password" id="password">
							 <br>
						</div>
					</div>
				</div>		
								<div class="form-group">
				<label class="col-xs-3 control-label"></label>
					<div class="col-xs-7">
						<div class="input-group">
							 <span class="input-group-addon" ><i class="fa fa-key"></i></span>	
							   <input class="form-control" placeholder="{{{ Lang::get('confide::confide.password_confirmation') }}}" type="password" name="password_confirmation" id="password_confirmation">
							 <br>
						</div>
					</div>
				</div>	
				<div class="form-group">
					<div class="col-xs-7 col-xs-offset-4">
					<button type="submit" class="btn btn-primary">Sign Up</button> 
					<a class="btn btn-facebook" href=""> <i class="fa fa-facebook"></i></a> 
					<a class="btn btn-twitter" href=""> <i class="fa fa-twitter"></i></a> 
					</div>
				</div>	
			</form>
			</div>
			</div>	  
      </div>

    </div>
  </div>
</div>
@endif
