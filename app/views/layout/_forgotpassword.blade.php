<!--/
forgot- password

/-->	  
        <div class="col-md-6 col-md-offset-3 formforgotpassword"  >
		
			<div class="modal-form-login">
			<div class="col-md-11">
              <center><h1  style="color:#1E6397; font-weight:bold;  font-size:23pt;">Forgot Password</h1></center>

				<div class="form-group">				
				<p class="text-center " >
					Silahkan masukkan alamat email Anda,<br>
						dan kami akan mengirimkan email<br>
						untuk mereset password anda.
				</p>
				</div>				
	         </div>
			<form class="form-horizontal" role="form" method="POST" action="{{ URL::to('/users/forgot_password') }}"  accept-charset="UTF-8">
                <input type="hidden" name="_token" value="{{{ Session::getToken() }}}">	
		
				<div class="form-group">
					<div class="col-md-11">
						<input class="form-control" tabindex="1" placeholder="{{{ Lang::get('confide::confide.e_mail') }}}" type="text" name="email" id="email" value="{{{ Input::old('email') }}}">	
					</div>
				</div>

				
				<div class="form-group">
					<div class="col-md-11 ">
					<button type="submit" class="btn btn-primary form-control" style="background:#1E6397;"><strong>Reset Password</strong></button> 
				
					</div>
				</div>	
				<div class="form-group">
					<div class="col-md-11">
					  <center>Kembali ke ? <a href="#{{URL::action('UsersController@create')}}" onclick="formlogin()"> Login</a></center>
					 </div >				
				</div>
			</form>
			</div>
	    </div>
			
			
<!--/
end-forgot

/-->			