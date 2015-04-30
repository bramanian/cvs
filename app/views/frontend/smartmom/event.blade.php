
<div class="content-fluid" style="padding-top:20px;">
@include("frontend.thread.leftmenu")


<!------------------------/ini bagian center/-------------------------------------------->


<div class="col-md-8">

			@if(isset($breadcrumbs))
				<ol class="breadcrumb">
				@foreach($breadcrumbs as $breadcrumb => $nilaibreadcrumb)
				  @if($nilaibreadcrumb!="")		 
					 <li><a href="{{URL::to("/")}}{{$nilaibreadcrumb}}"> <i ></i> {{$breadcrumb}}</a> </li>
				   @else
					   <li>{{$breadcrumb}} </li>
				  @endif
				@endforeach
				</ol>	
			@endif
			
	<div class="panel panel-default">
	  <div class="panel-body" style="background:#F5F5F5">
		<div class="col-md-12">
		
		<hr style="margin:5px  0px; padding:0px;">
		<div id="fb-root"></div>
		<ul class="list-unstyled list-inline">


		  <li>		
			<a id="openpopupfacebook" class="btn btn-primary" style="border-radius:0px;"  data-url="{{Request::url()}}"> <i class="fa fa-facebook"></i></a>
			</li>
			<li>
			<a  class="btn btn-success" style="border-radius:0px;"  href="https://twitter.com/intent/tweet?url={{urlencode(Request::url())}}&text=Indonesia Fashion Weeks 2015 &hashtags=solusimencuci" > <i class="fa fa-twitter"></i></a>
            </li>		  
		</ul>
		</div>
		
	  </div>
	</div>	

		<div class="panel panel-default">
	  <div class="panel-body" style="background:#F5F5F5">
		<div class="col-xs-12">
		<h1 class="text-center">Indonesia Fashion Weeks 2015</h1>
		<br>
		<img src="{{URL::to('/img/ifw.png')}}" class="img-responsive" />
		<br>
		<p>Sudah siap menyambut The Biggest Fashion Movement, Indonesia Fashion Week 2015? Mulai hari ini ajang untuk kreativitas pasa designer bertajuk &ldquo;Indonesia Fashion Week&rdquo; resmi dibuka dan pastinya akan memanjakan para pecinta Fashion dengan berbagai pargelaran busana karya anak bangsa.</p>
		<br>
		<p>IFW yang keempat kalinya ini akan berlangsung selama 4 hari sampai dengan 1 Maret 2015 mendatang. Dengan mengadakan berbagai acara mulai dari fashion show, expo, seminar sampai dengan lomba design. Kamu mengaku pecinta fashion? Jangan sampai melewatkan pargelaran besar ini! Siapa karya anak bangsa yang jadi pelopor fashion kamu?</p>


		<img src="{{URL::to('/img/even2.jpg')}}"   class="img-responsive"/>
		<br>
		<center><img src="http://i58.tinypic.com/25f3c09.jpg"   class="img-responsive"/></center>
		<br>
		<center><img src="http://i62.tinypic.com/rvcxw9.jpg"   class="img-responsive"/></center>
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