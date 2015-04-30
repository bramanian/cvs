<div class="col-md-3 m-hide-box">
<br/>
<ul class="list-unstyled list-category">
@if(isset($kategori))
		@if($kategori =="produk")
	   <li class="produk"><a href="{{URL::to('/produk')}}">Produk Attack <div class="block"></div></a> </li>
		@else
		<li class="produk"><a href="{{URL::to('/produk')}}">Produk Attack</a></li>
		@endif

		@if($kategori =="tvc")
         <li class="tvc"><a href="{{URL::to('/tvc')}}">TVC Attack <div class="block"></div></a></li>
	
		@else
		<li class="tvc"><a href="{{URL::to('/tvc')}}">TVC Attack</a></li>
		@endif

		@if($kategori =="promoevent")
		<li class="promoevent"><a href="{{URL::to('/promoevent')}}">Promo & Event <div class="block"></div></a></li>
		@else
		<li class="promoevent"><a href="{{URL::to('/promoevent')}}">Promo & Event</a></li>
		@endif	

		@if($kategori =="batik" )
		<li class="batik"><a href="{{URL::to('/batik')}}">Love Batik <div class="block"></div></a></li>
		@else
		<li class="batik"><a href="{{URL::to('/batik')}}">Love Batik</a></li>
		@endif				
   @else
<li class="produk"><a href="{{URL::to('/produk')}}">Produk Attack</a></li>
<li class="tvc"><a href="{{URL::to('/tvc')}}">TVC Attack</a></li>
<li class="promoevent"><a href="{{URL::to('/promoevent')}}">Promo & Event</a></li>
<li class="batik"><a href="{{URL::to('/batik')}}">Love Batik</a></li>
@endif


</ul>

<br>
</div>