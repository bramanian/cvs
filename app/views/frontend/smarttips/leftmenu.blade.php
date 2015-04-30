<div class="col-md-3 boxkategori-smarttips">
<h3 class="text-left" style="color:#1E6397; font-weight:bold;">Category</h3>
<ul class="list-unstyled list-category">
@if(isset($kategori))
	
		@if($kategori =="My Life" ||$kategori =="10")
		<li class="life"><a href="{{URL::to('tips/kategori/'.ArtikelController::getURL('My Life'))}}">My Life <div class="block"></div></a>
	   </li>
		@else
		<li class="life"><a href="{{URL::to('tips/kategori/'.ArtikelController::getURL('My Life'))}}">My Life</a></li>
		@endif

		@if($kategori =="Family" ||$kategori =="11")
		<li class="family"><a href="{{URL::to('tips/kategori/'.ArtikelController::getURL('Family'))}}">Family <div class="block"></div></a></li>

		@else
		<li class="family"><a href="{{URL::to('tips/kategori/'.ArtikelController::getURL('Family'))}}">Family</a></li>
		@endif

		@if($kategori =="Work Life" ||$kategori =="12")
		<li class="worklife"><a href="{{URL::to('tips/kategori/'.ArtikelController::getURL('Work Life'))}}">Work Life <div class="block"></div></a></li>
	  
		@else
		<li class="worklife"><a href="{{URL::to('tips/kategori/'.ArtikelController::getURL('Work Life'))}}">Work Life</a></li>
		@endif		


   @else
<li class="life"><a href="{{URL::to('/tips/kategori/'.ArtikelController::getURL('My Life'))}}">My Life</a></li>
<li class="family"><a href="{{URL::to('/tips/kategori/'.ArtikelController::getURL('Family'))}}">Family</a></li>
<li class="worklife"><a href="{{URL::to('/tips/kategori/'.ArtikelController::getURL('Work Life'))}}">Work Life</a></li>
@endif

</ul>

</div>

</div>