
<div class="content-fluid" style="padding-top:20px;">
<div class="col-xs-12 col-md-12">
		<center><img src="{{URL::to('/');}}/img/laundryguide/laundry.jpg" class="img-responsive" width="100%"></center>
	</div>
	@if(isset($kategori))
	@include("frontend.laundryguide.leftmenu",array("kategori"=>$kategori))
    @else
	@include("frontend.laundryguide.leftmenu")
   @endif
<!------------------------------------------------------------------>
<div class="col-xs-12 col-md-7">
<div class="col-xs-12 col-md-12 padding-margin-o">
<br>
<div class="col-md-12"><h2 class="text-left tips-title">Laundry Guide</h2></div>
@if(!$tips->isEmpty())
	@if(Input::get('page')==null || ((Input::get('page')>=2)==false))
<div class="col-md-12 col-md-6 large-tips">
<a href="{{URL::to('/guide')}}/{{$kategori}}/{{UsersController::getDate($tips[0]->created_at)}}/{{$tips[0]->id}}/{{ArtikelController::getURL($tips[0]->judul)}}" >

<div class="media">
		<div class="media-top">
			   <img src="{{URL::to('/')}}/timthumb.php?src={{URL::to('/admin/'.$tips[0]->photo)}}&h=250&w=400" > 
			   <div class="hover-kategori"><img src="{{URL::to('img/laundryguide').'/'.$tips[0]->large_image}}"></div>
		</div>
		<div class="media-body" >
				<h3 class="media-heading text-capitalize" >{{$tips[0]->judul}} </h3>
				 <p class="desc" style="">{{$tips[0]->tipsdesc}}</p>
				 <p class="text-right" ><a href="#" class="list-tipsreadmore"> Read More  <i class="fa fa-angle-right "></i> </a></p>
		</div>
</div>
</a>
</div>

<br>
@endif
<div class="col-xs-12  col-md-12">
<?php $ntips=0; ?>
@foreach($tips as $datatips)
@if($ntips!=0)
<div class="col-xs-12 col-md-6 list-large-tips">
<a href="{{URL::to('/guide')}}/{{$kategori}}/{{UsersController::getDate($datatips->created_at)}}/{{$datatips->id}}/{{ArtikelController::getURL($datatips->judul)}}">

	
<div class="media">
		<div class="media-top">
			   <img class=" media-object" src="{{URL::to('/')}}/timthumb.php?src={{URL::to("/admin/".$datatips->photo)}}&h=100&w=150" alt="">
			   <div class="hover-kategori"><img src="{{URL::to('img/laundryguide').'/'.$datatips->small_image}}" width="100%"></div>
		</div>
		<div class="media-body">
				<h4 class="media-heading text-capitalize">{{$datatips->judul}}</h4>
				 <p class="desc">{{$datatips->tipsdesc}}</p>
				 <p class="text-right"><span class="list-tipsreadmore"> Read More <i class="fa fa-angle-right "></i> </span></p>
		</div>
</div>	
	</a>
</div>
@endif
<?php $ntips++; ?>
@endforeach
</div>

<div class="col-xs-12 col-md-12">
<center>{{$tips->links();}}</center>
</div>
@endif
</div>
</div>
<div class="col-md-2">
<!------------------------/ini bagian center

<h3 class="text-center" style="color:#1E6397; font-weight:bold;">Top Smart Tips</h3>
<ul class="list-unstyled list-smart-topsmartmom">
<li>
<div class="media">
  <div class="media-left">
    <a href="#">
      <img class="img-circle media-object" src="{{URL::to('/');}}/img/smart/image-17.jpg" alt="">
    </a>
  </div>
  <div class="media-body">
    <h4 class="media-heading">Title Tip No. 1</h4>
     <p>15 Jan 2015</p>
  </div>
</div>
</li>
<li>
<div class="media">
  <div class="media-left">
    <a href="#">
      <img class="img-circle media-object" src="{{URL::to('/');}}/img/smart/image-18.jpg" alt="">
    </a>
  </div>
  <div class="media-body">
    <h4 class="media-heading">Title Tip No. 2</h4>
     <p>15 Jan 2015</p>
  </div>
</div>
</li>
<li>
<div class="media">
  <div class="media-left">
    <a href="#">
      <img class="img-circle media-object" src="{{URL::to('/');}}/img/smart/image-19.jpg" alt="">
    </a>
  </div>
  <div class="media-body">
    <h4 class="media-heading">Title Tip No. 3</h4>
     <p>15 Jan 2015</p>
  </div>
</div>
</li>
</ul>

/-------------------------------------------->
</div>




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