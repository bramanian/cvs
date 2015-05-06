@include("frontend.attackzone.leftmenu",array("kategori"=>"produk"))
   <div class="col-xs-9 produk" style="">
   <div class="col-md-12"><h3 class="judul">Produk Attack</h3></div>
<div class="col-md-12  list-produk">

      <div class="col-md-12 list-produk-1" >
<center>
	    <img class="produk-top" data-id="1" src="{{URL::to('img/produk/small/produk-01.png')}}">
		<img class="produk-top" data-id="2" style="margin-left:5px;" src="{{URL::to('img/produk/small/produk-02.png')}}">
		<img class="produk-top" data-id="3" style="margin-left:5px;" src="{{URL::to('img/produk/small/produk-03.png')}}">
		<img class="produk-top" data-id="4" style="margin-top:-10px;"  src="{{URL::to('img/produk/small/produk-04.png')}}">
		<img class="produk-top" data-id="5" style="margin-top:-10px;" src="{{URL::to('img/produk/small/produk-05.png')}}">
		<img  class="produk-top" data-id="6" style="margin-top:-10px;" src="{{URL::to('img/produk/small/produk-06.png')}}">
</center>
	  </div>
	  <div class="col-md-12 box-desc-produk" >
          <center><img class="meja" src="{{URL::to('img/meja.png')}}" style=""></center>
		  <div class="col-md-10 col-md-offset-1 inner-desc-1 " style="">
		  <div class="col-xs-md-12 text-right"><a class="btn btn-close" ><i class="fa fa-2x fa-times"></i></a></div>
				<div class="media">
				  <div class="media-left " style="padding-right:20px">
					  <img  src="{{URL::to('img/produk/small/produk-01.png')}}">
				  </div>
				  <div class="media-body">
					<h3 class="media-heading" >ATTACK VIOLET AROMA 800gr</h3>
				   <p class="deskripsi">
				   Detergent konsentrat dengan formula dashyat 3D Clean Action sehingga pakaian Anda bersih, lembut, mudah disetrika, wangi segar tahan lama karena perpaduan wangi bungan mawar, melati, dan bakung.
				Pakaian bersih menyeluruh karena Ultra Biolite mudah menghilangkan noda membandel hingga ke serta kain.
				Pakaian menjadi lembut dan nyaman karena pelembut alami UltraSoft membuat kain tidak kusut setelah proses pengeringan atau penjemuran.
				* Takaran mencuci 1 sendok untuk 15 potong pakaian
				   </p>
				  </div>
				</div>	
				<div class="col-md-12 text-right icon icon-pakaian" >
						<img  src="{{URL::to('img/produk/icon-01.png')}}">
				</div>				
		  </div>
	   </div>
   </div>
   <div class="col-md-12 list-produk ">
   <div class="col-md-12 list-produk-2" >
<center>
	    <img class="produk-bottom" data-id="7" src="{{URL::to('img/produk/small/produk-07.png')}}">
		<img  class="produk-bottom"  data-id="8" style="margin-left:5px;" src="{{URL::to('img/produk/small/produk-08.png')}}">
		<img  class="produk-bottom"  data-id="9" src="{{URL::to('img/produk/small/produk-09.png')}}">
		<img  class="produk-bottom" data-id="10" src="{{URL::to('img/produk/small/produk-10.png')}}">

</center>
	</div>
	<div class="col-md-12 box-desc-produk">
	    <center><img class="meja" src="{{URL::to('img/meja.png')}}"></center>
		  <div class="col-md-10 col-md-offset-1  inner-desc-2" >
              <div class="col-xs-md-12 text-right"><a class="btn btn-close" ><i class="fa fa-2x fa-times"></i></a></div>		  
				<div class="media">
				  <div class="media-left ">
					  <img  src="{{URL::to('img/produk/small/produk-01.png')}}">
				  </div>
				  <div class="media-body">
				  <?php $produk=ProdukController::getProduk();?>
					<h3 class="media-heading" >{{$produk->nama}}</h3>
				   <p class="deskripsi">
{{$produk->deskripsi}}
				   </p>
				  </div>
				</div>	
				<div class="col-md-12 text-right icon icon-pakaian" >
						<img  src="{{URL::to('img/produk/icon-01.png')}}">
				</div>	
		  </div>		
	</div>
   </div>

   <script>
   $(window).ready(function(){
          onloadProduk();
   });
   </script>

