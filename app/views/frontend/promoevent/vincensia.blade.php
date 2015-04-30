
<div class="content-fluid" style="padding-top:20px;">

		@include("frontend.smarttips.leftmenu")	
    <link rel="stylesheet" href="{{URL::to("/")}}/css/star-rating.css"   media="all" rel="stylesheet" type="text/css"/>
    
    <script src="{{URL::to("/")}}/js/star-rating.js" type="text/javascript"></script>
<!------------------------------------------------------------------>
<div class="col-md-9">
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
		<div class="col-md-12">
		<div class="panel panel-default">
		  <div class="panel-body" style="background:#F5F5F5">
			<div class="col-md-12">

			<ul class="list-unstyled list-inline">
			  <li>		
				<a id="openpopupfacebook" class="btn btn-primary" style="border-radius:0px;"  data-url="{{Request::url()}}"> <i class="fa fa-facebook"></i></a>
				</li>
				<li>
				<a  class="btn btn-success" style="border-radius:0px;"  href="https://twitter.com/intent/tweet?url={{Request::url()}}&hashtags=solusimencuci" > <i class="fa fa-twitter"></i></a>
				</li>		  
			</ul>
			</div>
		  </div>
		</div>	
		</div>

		<div class="col-md-12">
	   <div class="panel panel-default">
	   <div class="panel-body" style="background:#F5F5F5">
		<div class="col-md-12">
		<h2 class="text-center text-capitalize">Ibu Vincensia Naibaho</h2>
		</div>
		<div class="col-md-12">
		<br>
		<p>Saya cuma ibu rumah tangga biasa yang tidak memiliki gaji rutin seperti ibu-ibu pekerja lainnya. Di keseharian sayalah yang paling memegang peranan dalam rumah tangga.</p>

		<p>Dan saat anak-anak tidur siang, saya gunakan untuk buka toko online di internet dan mulai berdagang.</p>

		<p>Meski hanya ibu rumah tangga biasa, kesibukan saya sama saja dengan ibu pekerja lainnya. Dan saya bersyukur pada Tuhan, selama ini roda kehidupan keluarga saya berjalan baik sekali. Anak-anak tidak pernah mendapat masalah di sekolah, suami tak pernah mengeluh soal masakan, dan si mbak juga betah di rumah. Itu bisa terjadi tentu saja karna saya cukup cerdas dan bijaksana dalam mengambil keputusan.</p>

		<p>Tapi soal membeli deterjen misalnya, saya yang menentukan sendiri meski dia yang mencuci. Karena dari dulu saya sudah percaya pada Attack, maka saya selalu membeli Attack sebagai deterjen sehari-hari.</p>

		<p>Akhirnya harus saya katakan, dengan semua peranan saya di keluarga selama ini I am proud of being a housewife.</p>
		<center><img src="{{URL::to('img/family.jpg')}}"  class="img-responsive"></center>
		<br>
		<center><img src="{{URL::to('img/foto5.jpg')}}" class="img-responsive" ></center>
		
		
		
		</div>
	  </div>
	</div>	
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

     
    



$("#openpopupfacebook").click(function(){ 
window.open("https://www.facebook.com/sharer/sharer.php?app_id=309437425817038&sdk=joey&u="+$("openpopupfacebook").attr("data-url")+"&display=popup&ref=plugin");
});
$("#openpopuptwitter").click(function(){ 
window.open("https://twitter.com/intent/tweet?original_referer=https%3A%2F%2Fdev.twitter.com%2Fweb%2Ftweet-button&text=&tw_p=tweetbutton&url="+$("openpopuptwitter").attr("data-url"));
});


        $('#rating-input').rating({
              min: 0,
              max: 5,
              step: 1,
              size: 'xs'
           });
                   
        $('#rating-input').on('rating.change', function() {    
    var $id=$(this).attr("data-id");
	var $value=$(this).val();
          $.ajax({
			 url:base_url+"/thread/rating",
			 type:"post",
		  data:{"id":$id,"value":$value},
			 success:function(data){
				 
				 var $result=jQuery.parseJSON(data);
				 
				 if($result.status=="success")
				 {
				 $('#rating-input').val(($result.jumlah/$result.votes));
				$('#rating-input').rating('refresh', {
						//disabled: true, 
						rating:5,
						showClear: false, 
						showCaption: true,		
						defaultCaption:$result.votes+" Votes, "+($result.jumlah/$result.votes)+" Average "
						});
						
					}else if($result.status=="notlogin"){
						
						$('#modal-login').modal('show'); 
						
					}	
					
				 
			 },
			 error:function(jqXHR){
				 alert(jqXHR);
				 
			 }
			  
		  });
	
			
        });
		
      $('[data-toggle="tooltip"]').tooltip();
    });
</script>
<script src="{{URL::to("/")}}/js/holder.js"></script>