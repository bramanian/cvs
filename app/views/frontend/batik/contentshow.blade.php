
<div class="content-fluid" style="padding-top:20px;">
	<div class="col-md-12 top-cover-smarttips" style="padding:20px 60px 20px 18px;" >
		<img src="{{URL::to('/');}}/img/smart/image-08.jpg" class="fullimage">
	</div>
@include("frontend.attackzone.leftmenu",array("kategori"=>"batik"))
    <link rel="stylesheet" href="{{URL::to("/")}}/css/star-rating.css"   media="all" rel="stylesheet" type="text/css"/>
    
    <script src="{{URL::to("/")}}/js/star-rating.js" type="text/javascript"></script>
<!------------------------------------------------------------------>
<div class="col-md-9" style="padding-top:30px;">

	@if(isset($tips))
	<div class="col-md-12">
	<div class="">
	  <div class="" style="background:#F5F5F5">
		<div class="col-xs-12 col-md-12">
        <div class="col-xs-12 col-md-12 large-tips padding-margin-m">
		<div class="col-xs-12 media padding-margin-m">
				<div class="media-top">
					   <img src="{{URL::to('/')}}/timthumb.php?src={{URL::to('/admin/'.$tips->photo)}}&h=250&w=400" > 
					   <div class="hover-kategori"><img src="{{URL::to('img/smarttips').'/'.$tips->large_image}}"></div>
				</div>
		</div>
		</div>
		<div class="col-xs-12 col-md-12 padding-margin-m"> 
		<h3 class="text-left text-capitalize title-showcontent-tips">{{$tips->judul}}</h3>
		<ul class="list-unstyled list-inline list-sosial-media">
		  <li>		
			<a id="openpopupfacebook" style="border-radius:0px;background:#00ACED"  data-url="{{Request::url()}}"> <img src="{{URL::to('/')}}/img/fb.jpg"></a>
			</li>
			<li>
			<a   style="border-radius:0px; background:#00ACED"  href="https://twitter.com/intent/tweet?url={{Request::url()}}&hashtags=solusimencuci" >
			<img src="{{URL::to('/')}}/img/tw.jpg">
			</a>
            </li>		
			<li>
			<a   style="border-radius:0px; background:#00ACED"  href="https://twitter.com/intent/tweet?url={{Request::url()}}&hashtags=solusimencuci" >
			<img src="{{URL::to('/')}}/img/gplus.jpg">
			</a>
            </li>				
		</ul>
		</div>
		</div>
	  </div>
	</div>	
	</div>
	
		<div class="col-xs-12 col-md-12">
		<div class="col-xs-12 col-md-12 content-isi-smarttips padding-margin-m" >
		<p>
		{{HTML::decode($tips->isi)}}
		</p>
		</div>
		</div>

<?php 
$relatedtips=BatikController::getTipsRelated($tips->idkategori)
?>
<div class="col-xs-12 col-md-12">
<h3 class="text-left text-capitalize related-title" >Related Batik</h3>
</div>
@if(isset($relatedtips))

<div class="col-xs-12 col-md-12">
<div class="col-xs-12 col-md-12 related-list">
@foreach($relatedtips as $datatips)		
<div class="col-xs-12 col-md-6 list-large-tips">
<a href="{{URL::to('/batik')}}/{{UsersController::getDate($datatips->created_at)}}/{{$datatips->id}}/{{ArtikelController::getURL($datatips->judul)}}">

	
<div class="media">
		<div class="media-top">
			   <img class=" media-object" src="{{URL::to('/')}}/timthumb.php?src={{URL::to("/admin/".$datatips->photo)}}&h=100&w=150" alt="">
		</div>
		<div class="media-body">
				<h4 class="media-heading text-capitalize">{{$datatips->judul}}</h4>
		</div>
</div>	
	</a>
</div>
@endforeach
</div>
</div>
@endif

@else
	<h4 class="text-center"> Thread Not Found </h4>
@endif

</div>




</div>

<script>


    $(document).ready(function() {
     
  


$("#openpopupfacebook").click(function(){ 
window.open("https://www.facebook.com/sharer/sharer.php?app_id=309437425817038&sdk=joey&u="+$("openpopupfacebook").attr("data-url")+"&display=popup&ref=plugin");
});
$("#openpopuptwitter").click(function(){ 
window.open("https://twitter.com/intent/tweet?original_referer=https%3A%2F%2Fdev.twitter.com%2Fweb%2Ftweet-button&text=&tw_p=tweetbutton&url="+$("openpopuptwitter").attr("data-url"));
});
    });
</script>
<script src="{{URL::to("/")}}/js/holder.js"></script>