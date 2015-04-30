
<div class="content-fluid" style="padding-top:20px;">


<!------------------------------------------------------------------>
<div class="col-md-12">
	@if(isset($komentar))
	<div class="col-md-12">
	  <div class="panel panel-default">
	   
	  <div class="panel-body" style="font-size:12pt;background:#EBEFF0">
	  {{$komentar->isi}}
	  </div>

	</div>
	</div>

	<div class="col-md-12">
	@if(Session::has("success"))
		<h4 class="text-center alert-success">{{Session::get("success")}}</h4>
	@endif
  {{ HTML::ul($errors->all(),array("class"=>"alert-danger list-unstyled")) }}	
	{{Form::open(array('class' => 'form-horizontal', 'method' => 'put', 'action' => array('KomentarController@createKomentar',$komentar->id_tulisan)))}}
	  <div class="panel panel-default"> 
	 <div class="panel-footer">Komentar : <span class="text-capitalize">{{$komentar->judul}}</span></div>
	  <div class="panel-body" style="font-size:12pt;">
	   <textarea class="form-control" name="komentar"></textarea>
	   <input type="hidden" name="id_komentar" value="{{$komentar->id_komentar}}">
	  </div>
	  <div class="panel-footer">
        <br>
	  </div>
	</div>
	<div class="col-md-12">
		 <script type="text/javascript">
			var RecaptchaOptions = {
				theme : 'clean',
				lang:'id',
				tabindex : 3
				};
		  </script> 
			<?php
            require_once(public_path().'\plugin\recaptchalib.php');
            $publickey = "6Le0SwITAAAAAAMSHMFUQLxbOz5VEijqqppjutUS";
            echo "<center>".recaptcha_get_html($publickey)."</center>";
            ?>
	</div>
	  <div class="col-md-12">

	<center><button class="btn btn-primary"><i class="fa fa-comment-o"></i> Submit Replay</button></center>
	  </div>
	    {{Form::close()}}
	</div>
	@endif
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