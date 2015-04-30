
<div class="content-fluid" style="padding-top:20px;">

	@include("frontend.attackzone.leftmenu",array("kategori"=>"promoevent"))

<!------------------------------------------------------------------>
<div class="col-md-7">
<div class="col-md-12 padding-margin-o">
<br>
<div class="col-sm-12"><h2 class="text-left tips-title">Promo & Event</h2></div>
@if(!$tips->isEmpty())

<div class="col-sm-12">

@foreach($tips as $datatips)

<div class="col-xs-6 list-large-tips">
<a href="{{URL::to('/promoevent')}}/{{UsersController::getDate($datatips->created_at)}}/{{$datatips->id}}/{{ArtikelController::getURL($datatips->judul)}}">

	
<div class="media">
		<div class="media-top">
			   <img class=" media-object" src="{{URL::to('/')}}/timthumb.php?src={{URL::to("/admin/".$datatips->photo)}}&h=100&w=150" alt="">
		
		</div>
		<div class="media-body">
				<h4 class="media-heading text-capitalize">{{$datatips->judul}}</h4>
				 <p class="desc">{{$datatips->tipsdesc}}</p>
				 <p class="text-right"><span class="list-tipsreadmore"> Read More <i class="fa fa-angle-right "></i> </span></p>
		</div>
</div>	
	</a>
</div>

@endforeach
</div>

<div class="col-sm-12">
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