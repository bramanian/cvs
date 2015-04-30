

<div class="col-sm-3" style="margin-top:10px;">

<ul class="list-unstyled event-dan-promo">
@if(Route::getCurrentRoute()->getPath()=="promodanevent")
	<li class="active"> <a href="{{URL::to('/')}}/promodanevent"> Promo dan Event</a></li>
@else
	<li> <a href="{{URL::to('/')}}/promodanevent"> Promo dan Event</a></li>
@endif

@if(Route::getCurrentRoute()->getPath()=="activationpage")
	<li class="active"> <a href="{{URL::to('/')}}/activationpage"> Activation Page</a></li>
@else
	<li> <a href="{{URL::to('/')}}/activationpage"> Activation Page</a></li>
@endif
</ul>
</div>

<div class="col-sm-9">
<ul class="list-unstyled list-event-promo">
	<li>
		<div class="media">
		  <div class="media-left">
			<a href="#">
			  <img class=" media-object" src="{{URL::to('/')}}/img/BANNER-WEB.jpg" alt="">
			</a>
		  </div>
		  <div class="media-body">
			<h4 class="media-heading">OOTDETAILS </h4>
		     <span>01 jan 2015 </span>
			 <p> Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. </p>
		  </div>
		</div>
	</li>
	<li>
		<div class="media">
		  <div class="media-left">
			<a href="#">
			  <img class=" media-object" src="{{URL::to('/')}}/img/BANNER-WEB.jpg" alt="">
			</a>
		  </div>
		  <div class="media-body">
			<h4 class="media-heading">OOTDETAILS </h4>
		     <span>01 jan 2015 </span>
			 <p> Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. </p>
		  </div>
		</div>
	</li>
</ul>
</div>