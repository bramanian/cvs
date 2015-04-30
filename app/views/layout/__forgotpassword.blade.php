<div class="col-md-8 col-md-offset-2" style="padding:30px 30px;">
		<center>
			<div class="media">
			  <div class="media-left media-middle">
				<a href="#">
				  <img src="{{URL::to("/")}}/img/solusi-ibuattack.png" width="110">
				</a>
			  </div>
			  <div class="media-body">
				<h4 class="media-heading"></h4>
				  <h1 class="text-center"><strong>Forgot Password</strong></h1>
			  </div>
			</div>
			</center>
			
    @if (Session::get('error'))
        <div class="alert alert-error alert-danger">{{{ Session::get('error') }}}</div>
    @endif

    @if (Session::get('notice'))
        <div class="alert">{{{ Session::get('notice') }}}</div>
    @endif
	<br><br>
<div class="col-md-10 col-md-offset-2">
<form method="POST" style="align:center" class="form-horizontal" action="{{ URL::to('/users/forgot_password') }}" accept-charset="UTF-8">
    <input type="hidden" name="_token" value="{{{ Session::getToken() }}}">

    <div class="form-group">
        <label for="email" class="col-md-2 control-label">{{{ Lang::get('confide::confide.e_mail') }}}</label>
        <div class="input-append input-group col-md-7">
            <input class="form-control" placeholder="{{{ Lang::get('confide::confide.e_mail') }}}" type="text" name="email" id="email" value="{{{ Input::old('email') }}}">
            <span class="input-group-btn">
                <input class="btn btn-primary" type="submit" value="{{{ Lang::get('confide::confide.forgot.submit') }}}">
            </span>
        </div>
    </div>

</form>
</div>
</div>