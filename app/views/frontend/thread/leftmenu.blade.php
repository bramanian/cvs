<div class="col-md-3 boxkategori-smartmom">

<h3 class="text-left kategori-smartmom" >Forum Categories</h3>
<ul class="list-unstyled list-category">
@if(isset($kategori))
	
		@if($kategori =="My Life" ||$kategori =="15")
		<li class="life"><a href="{{URL::to('smart/kategori/'.ArtikelController::getURL('My Life'))}}">My Life <div class="block"></div></a>
	   </li>
		@else
		<li class="life"><a href="{{URL::to('smart/kategori/'.ArtikelController::getURL('My Life'))}}">My Life</a></li>
		@endif

		@if($kategori =="My Family" ||$kategori =="16")
		<li class="family"><a href="{{URL::to('smart/kategori/'.ArtikelController::getURL('My Family'))}}">Family <div class="block"></div></a></li>
	   </li>
		@else
		<li class="family"><a href="{{URL::to('smart/kategori/'.ArtikelController::getURL('My Family'))}}">Family</a></li>
		@endif

		@if($kategori =="Work Life" ||$kategori =="17")
		<li class="worklife"><a href="{{URL::to('smart/kategori/'.ArtikelController::getURL('Work Life'))}}">Work Life <div class="block"></div></a></li>
	   </li>
		@else
		<li class="worklife"><a href="{{URL::to('smart/kategori/'.ArtikelController::getURL('Work Life'))}}">Work Life</a></li>
		@endif		
		
		@if($kategori =="Event" ||$kategori =="18")
        <li class="event"><a href="{{URL::to('smart/kategori/'.ArtikelController::getURL('Event'))}}">Event <div class="block"></div></a></li>
		@else
		<li class="event"><a href="{{URL::to('smart/kategori/'.ArtikelController::getURL('Event'))}}">Event</a></li>
		@endif		
		
		@if($kategori =="General" ||$kategori =="19")
           <li class="general"><a href="{{URL::to('smart/kategori/'.ArtikelController::getURL('General'))}}">General <div class="block"></div></a></li>
		@else
		<li class="general"><a href="{{URL::to('smart/kategori/'.ArtikelController::getURL('General'))}}">General</a></li>
		@endif	



   @else
	   <li class="life"><a href="{{URL::to('smart/kategori/'.ArtikelController::getURL('My Life'))}}">My Life</a></li>
      <li class="family"><a href="{{URL::to('smart/kategori/'.ArtikelController::getURL('My Family'))}}">Family</a></li>
      <li class="worklife"><a href="{{URL::to('smart/kategori/'.ArtikelController::getURL('Work Life'))}}">Work Life</a></li>
      <li class="event"><a href="{{URL::to('smart/kategori/'.ArtikelController::getURL('Event'))}}">Event</a></li>
      <li class="general"><a href="{{URL::to('smart/kategori/'.ArtikelController::getURL('General'))}}">General</a></li>
@endif
</ul>

</div>

</div>