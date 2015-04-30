<div class="col-md-12 header-md">
<div class="col-xs-12 col-md-12" style="position:absolute; bottom:10px; left:0px;">
	

	
	@if(!Auth::check())
	<div class="col-xs-12 col-md-9"> 
		<img src="{{URL::to("/")}}/img/solusi-ibuattack.png" style="cursor:pointer" onclick="window.location.href='{{URL::to('/')}}'" class="logo-solusi-ibuattack">
	</div>		
 <div class="col-xs-10 col-xs-offset-2 col-md-3 col-md-offset-0 login-signup-top" style="overflow-x:hidden;"  >
	<div class="col-xs-12 col-md-12" style="padding-bottom:5px; margin-left:10px;">

			         <a class="btn btn-custome btn-home-top-login"  href="{{URL::to('/')}}/users/login" type="button" >LOGIN</a> 
			         <a class="btn btn-custome btn-home-top-signup"  style=""  href="{{URL::to('/')}}/users/create" type="button">SIGN UP</a>
			
		 
	 </div>
			<div class="col-xs-12 col-md-12  search-top" style="margin-left:55px;">
			<div class="col-xs-9 col-md-9" >
				  <input type="text" name="search" placeholder="search" id="input-search" class="form-control btn-custome-input">
				  </div> 
				  <div class="col-xs-3 col-md-3 btn-fa-search-home" style="padding:0px; margin:0px">
					   <button class="btn" style="background:transparent; color:white;"><i class="fa fa-search"></i></button>
				  </div>
			</div>
	   </div>		
	 @else
	<div class="col-xs-6 col-md-8"> 
		<img src="{{URL::to("/")}}/img/solusi-ibuattack.png" style="cursor:pointer" onclick="window.location.href='{{URL::to('/')}}'" class="logo-solusi-ibuattack">
	</div>		 
 <div class="col-xs-10 col-xs-offset-2 col-md-4 col-md-offset-0" >
 <div class="col-xs-12 padding-margin-o" >
 	<div class="col-xs-12 col-md-12 top-boxnavigation-user" >
			<div class="col-xs-9 col-md-9" style="float:right" >
			

	

			<div class="dropdown padding-margin-o top-navigation-user"  >
				
				  <button class="btn btn-default dropdown-toggle"  type="button" id="menu_1" data-toggle="dropdown" aria-expanded="false" >
				  <i class="fa fa-user"></i>
				  <span class="navigation-name">
					@if(Session::has("nama"))
					Hai, {{substr(Session::get("nama"),0,5)}}
					@endif
					</span>
					&nbsp;<i class="fa fa-bars"></i> 
					<span class="caret"></span>
				  </button>
				  <ul class="dropdown-menu"   aria-labelledby="menu_1">
					<li ><a role="menuitem" tabindex="-1" href="{{URL::to('/home')}}"><i class="fa fa-user"></i> Profile</a></li>
					<li ><a role="menuitem" tabindex="-1" href="{{URL::to('/home/thread')}}"><i class="fa fa-pencil-square-o"></i> My Thread</a></li>
					<li ><a role="menuitem" tabindex="-1" href="{{URL::to('/users/logout')}}"><i  class="fa fa-sign-out"></i> Log Out</a></li>
				  </ul>
				</div>	
				  <?php
				  $notifacations=NotificationController::getNotification();
				  $numnotifacatio=NotificationController::getNumNotification();
				  ?>				
		   	 <div class="dropdown padding-margin-o"  style="float:right;  ">
				  <ul class="dropdown-menu"   aria-labelledby="menu_2">

				  @if(isset($notifacations))
					 @foreach($notifacations as $notifacation)
				 		<li ><a role="menuitem" tabindex="-1" href=" {{URL::to('home/komentar/'.$notifacation->id.'/show')}} "> {{$notifacation->from_}}					    
					  @endforeach
			      @endif
					<li ><a role="menuitem" tabindex="-1" href="{{URL::to('/home/notification')}}">See All</a></li>
				  </ul>
				</div>				
		       </div> 
	    </div>			   
			<div class="col-xs-8 col-md-7  padding-margin-o search-top" style=" float:right ">
			<div class="col-xs-12 col-md-11 "   >
				  <input type="text" name="search" placeholder="search" id="input-search" class="form-control btn-custome-input">
				  </div> 

					   <button class="btn" style="background:transparent; color:white; position:absolute; right:0px;"><i class="fa fa-search"></i></button>
				
			</div>
	 
	</div>
	</div>		
     @endif
	
</div>
</div>