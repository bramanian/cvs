
<div class="content-fluid" style="padding-top:20px;">
@if(isset($kategori))
@include("frontend.thread.leftmenu",array("kategori"=>$kategori))	
@else
@include("frontend.thread.leftmenu")		
	@endif
<div class="col-xs-12 col-md-9">
<img  class="img-responsive" src="{{URL::to('/')}}/img/smart-mom-club.jpg" style="cursor:pointer;" onclick="window.location.href='{{URL::to("/home/thread/create")}}'">
</div>
<!------------------------------------------------------------------>
<div class="col-md-9">
<div class="col-md-8"> <h3 class="title-hottread-smartmom">HOT THREADS</h3></div>
<div class="col-md-4 text-right"><a class="btn  btn-xs btn-see-all" style="margin-top:25px;" href="{{URL::to('/thread/all')}}">See All > </a></div>

<div class="col-md-12 box-smart-threat">
<ul class="list-unstyled list-smart-threat">


	@if(!$hothreads->isEmpty())
	@foreach($hothreads as  $hotthread)
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
<div class="col-md-12 ">
  <h3 style="color:#1E6397; font-weight:bold;">Mom Of The Month</h3>
</div>
<div class="col-md-12 ">
<div class="media">
  <div class="media-left">
    <a href="#">
      <img class="img-responsive media-object full-image" src="{{URL::to('/')}}/img/smart/image-04.jpg" alt="">
    </a>
  </div>
  <div class="media-body">
    <h4 class="media-heading" style="color:#BE1E2D; font-weight:bold;">Ibu Vincensia Naibaho</h4>
    Saya cuma ibu rumah tangga biasa yang tidak memiliki gaji rutin seperti ibu-ibu pekerja lainnya. Di keseharian sayalah yang.
   <div class="col-md-12 padding-margin-o" style="margin-top:30px;">
    <a class="btn  btn-xs btn-see-all" style="font-size:12pt; font-weight:bold;" href="{{URL::to('momofthemom/vincensia')}}" >See All > </a>
   </div>
  </div>
</div>
</div>
<img   src="{{URL::to('/')}}/img/smart/gabung.jpg"  class="bottom-img-smartmom" onclick="window.location.href='{{URL::to('/home/thread/create')}}'" >
<div class="clearfix"></div>
<br/>
</div>

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
<style>#list-slide{
	margin-top:15px;
	
}

</style>