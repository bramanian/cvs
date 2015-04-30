	<!--
	 login
	-->  
		 <div class="col-md-6 col-md-offset-3 control-form-login"   >
    
			<div class="modal-form-login" >
			<div class="col-md-11">
              <center><h1  style="color:#1E6397; font-weight:bold;  font-size:23pt;">Login</h1></center>
             </div >

			<form class="form-horizontal "  role="form" method="POST" action="{{{ URL::to('/users/login') }}}" accept-charset="UTF-8" >
				<div class="form-group">
					<div class="col-md-11">
						<input class="form-control" tabindex="1" placeholder="{{{ Lang::get('confide::confide.e_mail') }}}" type="text" name="email" id="email" value="{{{ Input::old('email') }}}">	
					</div>
				</div>
				<div class="form-group">
					<div class="col-md-11">
							 <input class="form-control" tabindex="2" placeholder="{{{ Lang::get('confide::confide.password') }}}" type="password" name="password" id="password">
					</div>
				</div>
				<div class="form-group">
					<div class="col-md-11 text-center">
					<a href="#{{URL::action('UsersController@forgotPassword')}}" onclick="formforgotpassword()">Forgot Password ? </a> 
					</div>
				</div>	
				
				<div class="form-group">
					<div class="col-md-11 ">
					<button type="submit" class="btn btn-primary form-control" style="background:#1E6397;"><strong>Login</strong></button> 
				
					</div>
				</div>	
				<div class="form-group">
				<div class="col-md-11 " >
				<center>Anda baru disini ? <a href="#{{URL::action('UsersController@create')}}" onclick="formsignup()"> Sign Up</a></center>
				</div>
				</div>
			</form>
			</div>
			
			</div>
	<!-- / 
	     end login
	
	/-->