<style>


</style>


<div class="col-md-12 padding-margin-o" style="padding-top:50px;padding-bottom:50px;">
<div class="col-md-6">

<br>
      			@if (Session::get('error'))
						<div class="alert alert-error alert-danger">{{{ Session::get('error') }}}</div>
					@endif

					@if (Session::get('notice'))
						<div class="alert">{{{ Session::get('notice') }}}</div>
					@endif
	  @include("layout.login")
	  @include("layout._forgotpassword")
	  @include("layout.signup")
             <br>			
			</div>
			<div class="col-md-6">
<img src="{{URL::to('/')}}/img/img-login.jpg"  title="Kumpulkan poin Smart Mom & dapatkan reward menarik dengan bergabung di Smart Mom Club!" class="img-responsive masterTooltip img-login-signup ">



			</div>
			
			</div>
<style>
.formforgotpassword,
.formsignup{
  display:none;	
	
}
</style>
<script>
$(this).ready(function(){
	doLogin();
});

</script>