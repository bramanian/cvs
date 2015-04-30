
<div class="content-fluid" style="padding-top:20px;">
@if(isset($artikel))
	
		@include("frontend.thread.leftmenu",array("kategori"=>$artikel->id_kategori))	
		@else
			@include("frontend.thread.leftmenu")	
@endif		
    <link rel="stylesheet" href="{{URL::to("/")}}/css/star-rating.css"   media="all" rel="stylesheet" type="text/css"/>
    
    <script src="{{URL::to("/")}}/js/star-rating.js" type="text/javascript"></script>
<!------------------------------------------------------------------>
<div class="col-md-9">
			
	@if(isset($artikel))
			
	<div class="col-md-12">


	@if(isset($artikel) && isset($_REQUEST["page"])==false)

	  <div class="panel panel-default panel-thread">
	   <div class="panel-heading" >{{UsersController::getDateTime($artikel->created_at)}}</div>
	  <div class="panel-body" style="">

	<div class="col-xs-2 content-user">
				
			  <img class="media-object" src="{{URL::to('/')}}/timthumb.php?src={{URL::to($profile->photo)}}&h=80&w=80"  data-src="holder.js/80x80/#4466FF:#fff">
					<h6 class="media-heading text-left" style="margin-top:10px;">{{$profile->nama}}</h6>
					<h6 class="media-heading text-left" style="font-size:7.5pt">Join : {{substr(UsersController::getDateTime($profile->created_at),0,10)}}</h6>
					<h6 class="media-heading text-left" style="font-size:7.5pt">Posts: {{$profile->posts}}</h6>
			
	</div>
    <div class="col-xs-10 content-thread">
		 <h1 class="text-center text-capitalize text-title" > <strong>{{$artikel->judul}} </strong></h1>		
		 <p class="text-left kategori" > &nbsp;Kategori : {{$artikel->nama_kategori}}</p>
		 <hr  style="margin-bottom:50px;">
			{{$artikel->isi}}
			<br>
		 </div>		
	  </div>
	  <div class="panel-footer">
	  
		  <div class="col-md-9">Last Edit By : {{UsersController::getDateTime($artikel->updated_at)}}</div>
		  <div class="col-md-3"><center><a href="{{URL::to($url.'/komentar')}}"><i class="fa fa-comment-o"></i> Quote </a></center></div>
	 
	  <br>
	  </div>
	</div>
@endif

@if(isset($artikel) && isset($_REQUEST["page"]))
     @if($_REQUEST["page"]==1)

<div class="panel panel-default panel-thread" id="0">
	   <div class="panel-heading" >{{UsersController::getDateTime($artikel->created_at)}}</div>
	  <div class="panel-body" >

	<div class="col-xs-2 content-user">
				
			  <img class="media-object" src="{{URL::to('/')}}/timthumb.php?src={{URL::to($profile->photo)}}&h=80&w=80"  data-src="holder.js/80x80/#4466FF:#fff">
					<h6 class="media-heading text-left" style="margin-top:10px;">{{$profile->nama}}</h6>
					<h6 class="media-heading text-left" style="font-size:7.5pt">Join : {{substr(UsersController::getDateTime($profile->created_at),0,10)}}</h6>
					<h6 class="media-heading text-left" style="font-size:8pt">Posts: {{$profile->posts}}</h6>
			
	</div>
    <div class="col-xs-10 content-thread">
		 <h1 class="text-center text-capitalize text-title" > <strong>{{$artikel->judul}} </strong></h1>		
		 <p class="text-left kategori" > &nbsp;Kategori : {{$artikel->nama_kategori}}</p>
		 <hr  style="margin-bottom:50px;">
			{{$artikel->isi}}
			<br>
		 </div>		
	  </div>
	  <div class="panel-footer">
	  
		  <div class="col-md-9">Last Edit By : {{UsersController::getDateTime($artikel->updated_at)}}</div>
		  <div class="col-md-3"><center><a href="{{URL::to($url.'/komentar')}}"><i class="fa fa-comment-o"></i> Quote </a></center></div>
	 
	  <br>
	  </div>
	</div>
	@endif
@endif
	</div>
	
	@if(isset($komentars))
		@foreach($komentars as $komentar)
	
			  <?php 
		  $page="";
		  if(isset($_REQUEST["page"]))
		     $page="-".$_REQUEST["page"];
	      else
			  $page="";
		  
		  ?>
	<div class="col-md-12" id="{{UsersController::numhash($komentar->id)}}">

	
		<div class="panel panel-default panel-thread" >
	   <div class="panel-heading" >{{UsersController::getDateTime($komentar->created_at)}}</div>
	  <div class="panel-body" >

	<div class="col-xs-2 content-user">
				
			  <img class="media-object" src="{{URL::to('/')}}/timthumb.php?src={{URL::to($komentar->photo)}}&h=80&w=80"  data-src="holder.js/80x80/#4466FF:#fff">
					<h6 class="media-heading text-left" style="margin-top:10px;">{{$komentar->nama}}</h6>
					<h6 class="media-heading text-left" style="font-size:7.5pt">Join : {{substr(UsersController::getDateTime($komentar->profile_created_at),0,10)}}</h6>
					<h6 class="media-heading text-left" style="font-size:7.5pt">Posts: {{$komentar->posts}}</h6>
			
	</div>
    <div class="col-xs-10 content-thread">
	<br>
				{{$komentar->isi}}
				<br>
		 </div>		
	  </div>
	  <div class="panel-footer">
	  
		  <div class="col-md-9">Last Edit By : {{UsersController::getDateTime($komentar->updated_at)}}</div>
		  <div class="col-md-3"><center><a href="{{URL::to($url.'/komentar/'.$komentar->id.$page.'/rekomentar')}}"><i class="fa fa-comment-o"></i> Quote</a></center></div>
	 
	  <br>
	  </div>
	</div>

	</div>
		@endforeach
	@endif
	<div class="col-md-12">
    <div class="col-md-12" style="margin-bottom:19px;background:#F0F0F0;">
    <div class="col-md-12 " style="height:auto; ">


		<div class="col-md-12" style="padding-top:10px; padding-bottom:10px;">
	<p class="text-right">	Page 1 of
        @if(isset($komentars)){{ $komentars->links();}} @endif		
		</p>
		</div>
		

		
	</div>
	 <div class="col-md-12 text-right">
	 	  
		<ul class="list-unstyled list-inline list-sosial-media">
		<li>
@if(isset($rating)&& $rating->votes !=0)	
	<input id="rating-input" type="number" value="{{isset($rating)?($rating->jumlah/$rating->votes):""}}" data-default-caption="{{isset($rating)?$rating->votes:""}} Votes, {{isset($rating)?($rating->jumlah/$rating->votes):""}} Average"    data-id="{{isset($artikel)?$artikel->id:""}}"  data-star-captions="{}" />
@else
	<input id="rating-input" type="number" value="0"  data-id="{{isset($artikel)?$artikel->id:""}}"  data-star-captions="{}" />
@endif
		</li>

		  <li>		
			<a id="openpopupfacebook" href="#" data-url="{{Request::url()}}"> <img src="{{URL::to('img/fb.jpg')}}"/></a>
			</li>
			<li>
			<a  href="https://twitter.com/intent/tweet?url={{urlencode(Request::url())}}&text={{$artikel->judul}}&hashtags=solusimencuci" >  <img src="{{URL::to('img/tw.jpg')}}"></a>
            </li>		  
		</ul>	 
	   <a href="{{URL::to($url.'/postreply')}}"   >
		<img src="{{URl::to('img/postreplay.jpg')}}" class="top-postreplay img-responsive" />
		</a>
	 </div>

</div>
</div>

<div class="col-md-12 text-right">@if(isset($komentars)){{ $komentars->links();}} @endif</div>
@else
	<h4 class="text-center"> Thread Not Found </h4>
@endif
</div>




</div>

<script>
$(document).ready(function() {
onThreadShow();
 });
</script>
<script src="{{URL::to("/")}}/js/holder.js"></script>