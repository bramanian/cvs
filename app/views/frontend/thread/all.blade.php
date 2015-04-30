
<div class="content-fluid" style="padding-top:20px;">
@include("frontend.thread.leftmenu")
<!------------------------------------------------------------------>
<div class="col-md-9">
<img  class="img-responsive" src="{{URL::to('/')}}/img/smart-mom-club.jpg" style="cursor:pointer;" onclick="window.location.href='{{URL::to('/home/thread/create')}}'">
</div>
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

@if($artikels)
	<div class="col-md-12">
<ul class="list-unstyled list-smart-threat">
	@if(!$artikels->isEmpty())
	@foreach($artikels as  $hotthread)
    <li>
		<a class="text-capitalize" href="{{URL::to('/thread')}}/{{UsersController::getDate($hotthread->created_at)}}/{{$hotthread->id}}/{{ArtikelController::getURL($hotthread->judul)}}" >
	     <div class="media media-smartmom">
	          <div class="media-left media-middle">
		          <img class="media-object" src="{{URL::to('/img/icon/'.$hotthread->small_image)}}" alt="{{$hotthread->judul}}">
	          </div>
	        <div class="media-body">
		             <h5 class="media-heading">{{$hotthread->judul}}</h5>	
	         </div>
             </div>  
          </a>
	</li>
	@endforeach
@endif
</ul>

</div>
@endif
	</div>
<div class="col-md-12">

	@if(!$artikels->isEmpty())
         <?php echo $artikels->links(); ?>
   @endif
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