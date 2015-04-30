<div class="col-xs-12">
<div class="col-xs-12 img-produk">
<img src="{{URL::to('img/produk/mobile/produk-01.jpg')}} "class=" img-responsive">
</div>
<div class="col-xs-12 produk">
<div class=" box-desc-produk">
<h4 class="media-heading"> ATTACK VIOLET AROMA 800gr </h4>
<p class="deskripsi">
				   Detergent konsentrat dengan formula dashyat 3D Clean Action sehingga pakaian Anda bersih, lembut, mudah disetrika, wangi segar tahan lama karena perpaduan wangi bungan mawar, melati, dan bakung.
				Pakaian bersih menyeluruh karena Ultra Biolite mudah menghilangkan noda membandel hingga ke serta kain.
				Pakaian menjadi lembut dan nyaman karena pelembut alami UltraSoft membuat kain tidak kusut setelah proses pengeringan atau penjemuran.
				* Takaran mencuci 1 sendok untuk 15 potong pakaian
</p>
</div>
</div>

<div class="col-xs-12">
<div class="col-md-12 list-slide">
	<div class="col-md-12">
		<div id="list-slide" class="owl-carousel owl-theme list-produk-mobile">
		<div class="item"> 
		   <img src="{{URL::to('/')}}/timthumb.php?src={{URL::to('/')}}/img/produk/produk-01.png&h=157&h=96" class="img-responsive"  data-id="1">	 
		 </div>
		<div class="item"> 
		   <img src="{{URL::to('/')}}/timthumb.php?src={{URL::to('/')}}/img/produk/produk-02.png&h=157&h=96" class="img-responsive"  data-id="2"  >	 	 
		 </div>
		<div class="item"> 
		   <img src="{{URL::to('/')}}/timthumb.php?src={{URL::to('/')}}/img/produk/produk-03.png&h=157&h=96" class="img-responsive"
		     data-id="3">	 
		 </div>
		<div class="item"> 
		   <img src="{{URL::to('/')}}/timthumb.php?src={{URL::to('/')}}/img/produk/produk-04.png&h=157&h=96" class="img-responsive"
		    data-id="4"
		   >	 
		 </div>
		<div class="item"> 
		   <img src="{{URL::to('/')}}/timthumb.php?src={{URL::to('/')}}/img/produk/produk-05.png&h=157&h=96" class="img-responsive"
		    data-id="5">	 
		 </div>
		<div class="item"> 
		   <img src="{{URL::to('/')}}/timthumb.php?src={{URL::to('/')}}/img/produk/produk-06.png&h=157&h=96" class="img-responsive"  data-id="6">	 
		 </div>
		<div class="item"> 
		   <img src="{{URL::to('/')}}/timthumb.php?src={{URL::to('/')}}/img/produk/produk-07.png&h=157&h=96" class="img-responsive"  data-id="7">	 
		 </div>
		<div class="item"> 
		   <img src="{{URL::to('/')}}/timthumb.php?src={{URL::to('/')}}/img/produk/produk-08.png&h=157&h=96" class="img-responsive"  data-id="8">	 
		 </div>
		<div class="item"> 
		   <img src="{{URL::to('/')}}/timthumb.php?src={{URL::to('/')}}/img/produk/produk-09.png&h=157&h=96" class="img-responsive"  data-id="9">	 
		 </div>
		<div class="item"> 
		   <img src="{{URL::to('/')}}/timthumb.php?src={{URL::to('/')}}/img/produk/produk-10.png&h=157&h=96" class="img-responsive"  data-id="10">	 
		 </div>		 

	
	</div>
		 <a class=" list-slideprev" style="display:block; position:absolute; left:0px; top:60%; height:20px; margin-top:-15px;"><img src="{{URL::to('/')}}/img/arrow-left.png" class="img-responsive" style="width:10px; height:auto"></a>
		 <a class=" list-slidenext" style="display:block; position:absolute; right:0px; top:60%; height:20px; margin-top:-15px;"><img src="{{URL::to('/')}}/img/arrow-right.png" class="img-responsive" style="width:10px; height:auto" ></a>
	</div>
</div>


</div>


</div>
<script>


    $(document).ready(function() {
     
    var owl = $("#list-slide");
     
    owl.owlCarousel({
    items : 3, //10 items above 1000px browser width
    itemsDesktop : [1000,5], //5 items between 1000px and 901px
    itemsDesktopSmall : [900,3], // betweem 900px and 601px
    itemsTablet: [600,3], //2 items between 600 and 0
    itemsMobile : true, // itemsMobile disabled - inherit from itemsTablet option
	pagination : false
    });
     
    // Custom Navigation Events
    $(".list-slidenext").click(function(){
    owl.trigger('owl.next');
    })
    $(".list-slideprev").click(function(){
    owl.trigger('owl.prev');
    })

     onLoadProdukMobile();
    });


</script>