<div class="col-md-3  boxkategori-smarttips">
<h3 class="text-left" style="color:#1E6397; font-weight:bold;">Category</h3>
<ul class="list-unstyled list-category">

@if(isset($kategori))
	
		@if($kategori =="washingexperience" ||$kategori =="1")
<li class="washingexperience"><a href="{{URL::action('GuideController@washingexperience')}}" style="padding-right:0px;">Washing Experience</a><div class="block"></div></li>
		@else
            <li class="washingexperience"><a href="{{URL::action('GuideController@washingexperience')}}" style="padding-right:0px;">Washing Experience</a></li>
		@endif

		@if($kategori =="amazingresult" ||$kategori =="2")
<li class="amazingresult"><a href="{{URL::action('GuideController@amazingresult')}}">Amazing Result <div class="block"></div></a></li>
		@else
		<li class="amazingresult"><a href="{{URL::action('GuideController@amazingresult')}}">Amazing Result </a></li>
		@endif

		@if($kategori =="allaboutfabric" ||$kategori =="3")
          <li class="allaboutfabric"><a href="{{URL::action('GuideController@allaboutfabric')}}">All About Fabric <div class="block"></div></a></li>
		@else
        <li class="allaboutfabric"><a href="{{URL::action('GuideController@allaboutfabric')}}">All About Fabric</a></li>
		@endif		

				@if($kategori =="tipstrik" ||$kategori =="4")
              <li class="tipstrik"><a href="{{URL::action('GuideController@tipstrik')}}">Tips & Trick <div class="block"></div></a></li>
		@else
             <li class="tipstrik"><a href="{{URL::action('GuideController@tipstrik')}}">Tips & Trick</a></li>
		@endif	

   @else


<li class="washingexperience"><a href="{{URL::action('GuideController@washingexperience')}}" style="padding-right:0px;">Washing Experience</a></li>
<li class="amazingresult"><a href="{{URL::action('GuideController@amazingresult')}}">Amazing Result</a></li>
<li class="allaboutfabric"><a href="{{URL::action('GuideController@allaboutfabric')}}">All About Fabric</a></li>
<li class="tipstrik"><a href="{{URL::action('GuideController@tipstrik')}}">Tips & Trick</a></li>
@endif

</ul>

</div>

</div>