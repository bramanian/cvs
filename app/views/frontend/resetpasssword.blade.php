<div class="col-xs-8 col-xs-offset-2">
<div class="container-fluid">
<br>
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
				  <h1 class="text-center"><strong>Reset Password</strong></h1>
			  </div>
			</div>
			</center>
             <div class="col-xs-offset-3">
				@if (Session::get('error'))
					<div class="alert alert-error alert-danger">{{{ Session::get('error') }}}</div>
				@endif

				@if (Session::get('notice'))
					<div class="alert">{{{ Session::get('notice') }}}</div>
				@endif
			<form class="form-horizontal" role="form" method="POST" action="{{{ URL::to('/users/reset_password') }}}" accept-charset="UTF-8">
               <input type="hidden" name="token" value="{{{ $token }}}">
               <input type="hidden" name="_token" value="{{{ Session::getToken() }}}">			
				<div class="form-group">
				<label class="col-xs-3 control-label"></label>
					<div class="col-xs-7">
					<div class="input-group">
					<span class="input-group-addon" ><i class="fa fa-key"></i></span>
						   <input class="form-control" placeholder="{{{ Lang::get('confide::confide.password') }}}" type="password" name="password" id="password">
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
					<button type="submit" class="btn btn-primary">Simpan</button> 
					</div>
				</div>	

			</form>
			</div>
			</div>	
             <br>			
			</div>