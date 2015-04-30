<div class="col-md-12 padding-margin-o" style="padding-top:50px;padding-bottom:50px;">
<div class="col-md-6">

<br>
 			 @if (Session::get('error'))
            <div class="alert alert-error alert-danger">
                @if (is_array(Session::get('error')))
                    {{ head(Session::get('error')) }}
                @endif
            </div>
        @endif    
	  @include("layout.login")
	  @include("layout._forgotpassword")
	  @include("layout.signup")
             <br>			
			</div>
			<div class="col-md-6">
						<img src="{{URL::to('/')}}/img/img-login.jpg" title="Kumpulkan poin Smart Mom & dapatkan reward menarik dengan bergabung di Smart Mom Club!" class="img-responsive masterTooltip  img-login-signup">
			</div>
			
			</div>		
<script>
$(this).ready(function(){
	doSignup();
});
</script>
<style>
.formforgotpassword,
.formsignin{
  display:none;	
	
}
</style>