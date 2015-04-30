<!--/
signup

/-->	
        <div class="col-md-6 col-md-offset-3 formsignup " >
		
			<div class="modal-form-login">
			<div class="col-md-11">
              <center><h1  style="color:#1E6397; font-weight:bold;  font-size:23pt;">Sign Up</h1></center>

				<div class="form-group">				
				<p class="text-center " >
                     Ayo Gabung Dengan Komunitas <br>
                     Smart Moms Attack!
				</p>
				</div>	
				
				
	         </div>

			<form class="form-horizontal" role="form" method="POST" action="{{{ URL::to('/users') }}}" accept-charset="UTF-8">
			<input type="hidden" name="_token" value="{{{ Session::getToken() }}}">
              <div class="form-group">
					<div class="col-md-11 ">
					<a  class="btn btn-primary form-control" style="background:#1E6397;"><strong> <i class="fa fa-facebook" style="position:absolute; left:28px; top:10px;"></i>Sambung Dengan Facebook Anda</strong></a> 
				
					</div>
				</div>				
			<input type="hidden" name="_token" value="{{{ Session::getToken() }}}">
		
				<div class="form-group">
					<div class="col-md-11">
						   <input class="form-control" placeholder="{{{ Lang::get('confide::confide.username') }}}" type="text" name="username" id="username" value="{{{ Input::old('username') }}}">
					</div>
				</div>
		
				<div class="form-group">
					<div class="col-md-11">
							   <input class="form-control" placeholder="{{{ Lang::get('confide::confide.e_mail') }}}" type="text" name="email" id="email" value="{{{ Input::old('email') }}}">
					</div>
				</div>
		
				<div class="form-group">
					<div class="col-md-11">
							   <input class="form-control" placeholder="{{{ Lang::get('confide::confide.password') }}}" type="password" name="password" id="password">
					</div>
				</div>
		
				<div class="form-group">
					<div class="col-md-11">
							   <input class="form-control" placeholder="{{{ Lang::get('confide::confide.password_confirmation') }}}" type="password" name="password_confirmation" id="password_confirmation">
					</div>
				</div>				
				
				<div class="form-group">
					<div class="col-md-11 ">
					<button type="submit" class="btn btn-primary form-control" style="background:#1E6397;"><strong>Sign Up</strong></button> 
				
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
end-signup

/-->	