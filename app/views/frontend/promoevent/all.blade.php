
<div class="content-fluid" style="padding-top:20px;">
@include("frontend.smarttips.leftmenu")

<!------------------------------------------------------------------>
<div class="col-md-9">
	<div class="col-md-12">
			@if(isset($breadcrumbs))
				<div class="col-xs-12" style="margin:25px 0px;">
				<ol class="breadcrumb">
				@foreach($breadcrumbs as $breadcrumb => $nilaibreadcrumb)
				  @if($nilaibreadcrumb!="")		 
					 <li><a href="{{URL::to("/")}}{{$nilaibreadcrumb}}"> <i ></i> {{$breadcrumb}}</a> </li>
				   @else
					   <li>{{$breadcrumb}} </li>
				  @endif
				@endforeach
				</ol>	
			</div>
			@endif	

@if($tips)
	<div class="col-md-12">
<ul class="list-unstyled list-smart-tips ">
@foreach($tips  as $datatips)
<li>
	<div class="media" onclick="window.location.href='{{URL::to('/tips')}}/{{UsersController::getDate($datatips->created_at)}}/{{$datatips->id}}/{{ArtikelController::getURL($datatips->judul)}}'">
	  <div class="media-left">
		<a href="#">
		  <img class=" media-object" src="{{URL::to('/')}}/timthumb.php?src={{URL::to("/admin/".$datatips->photo)}}&w=170%h=150" data-src="holder.js/170x200/#4466FF:#fff"  alt="{{$datatips->judul}}">
		</a>
	  </div>
	  <div class="media-body">
		<h4 class="media-heading text-capitalize">{{$datatips->judul}}</h4>
		 <p style="margin-top:3px;margin-bottom:3px;">{{$datatips->desc}}</p>
		  <p style="margin-top:3px;margin-bottom:3px;">Kategori: {{$datatips->kategori}}</p>
		 <p style="margin-top:3px;margin-bottom:3px;">Tag :
		 				<?php $taggings=TipsController::getTag($datatips->id);?>
						@if(isset($taggings))
						     @foreach($taggings as $tagging)
						      
						

						   
							   {{$tagging->nama}} ,&nbsp; 
				
					
							
							 @endforeach
						   @endif
		 </p>
	  </div>
	</div>
	
</li>
@endforeach
</ul>
</div>
@endif
	</div>
<div class="col-md-12">
<?php echo $tips->links(); ?>
</div>
</div>

<style>
div.list-slide{
padding-top:20px;
padding-bottom:20px;
}
</style>



</div>

<script>


    $(document).ready(function() {
     
    var owl = $("#list-slide");
     
    owl.owlCarousel({
    items : 5, //10 items above 1000px browser width
    itemsDesktop : [1000,5], //5 items between 1000px and 901px
    itemsDesktopSmall : [900,3], // betweem 900px and 601px
    itemsTablet: [600,2], //2 items between 600 and 0
    itemsMobile : false, // itemsMobile disabled - inherit from itemsTablet option
	pagination : false
    });
     
    // Custom Navigation Events
    $(".list-slidenext").click(function(){
    owl.trigger('owl.next');
    })
    $(".list-slideprev").click(function(){
    owl.trigger('owl.prev');
    })

     
    });


</script>
<script src="{{URL::to("/")}}/js/holder.js"></script>