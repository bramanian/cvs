/*
home

*/
var data1=null;
function onSearch(){
$(".text-input-search").toggle();	
	
}

function doForgot(){
	$('.control-form-login').hide();
	$('.formforgotpassword').hide();
	$('.formsignup').show();
	
}

function doLogin(){
	$('.control-form-login').show();
	$('.formforgotpassword').hide();
	$('.formsignup').hide();
	
}

function doSignup(){
	$('.control-form-login').hide();
	$('.formforgotpassword').hide();
	$('.formsignup').show();
	
}

function formlogin(){
		$('.control-form-login').show();
	$('.formforgotpassword').hide();
	$('.formsignup').hide();
	
}
function formsignup(){
		$('.control-form-login').hide();
	$('.formforgotpassword').hide();
	$('.formsignup').show();
	
}

function formforgotpassword(){
	$('.control-form-login').hide();
	$('.formforgotpassword').show();
	$('.formsignup').hide();	
	
}

$(this).ready(function(){
  $('.masterTooltip').hover(function(){
                // Hover over code
                var title = $(this).attr('title');
                $(this).data('tipText', title).removeAttr('title');
                $('<p class="tooltip-1"></p>')
                .text(title)
                .appendTo('body')
                .fadeIn('slow');
			
				
        }, function() {
                // Hover out code
                $(this).attr('title', $(this).data('tipText'));
                $('.tooltip-1').remove();
        }).mousemove(function(e) {
                var mousex = e.pageX + 20; //Get X coordinates
                var mousey = e.pageY + 10; //Get Y coordinates
                $('.tooltip-1')
                .css({ top: mousey, left: mousex })
        });
	
		
		
var header = $(".scroll-top");
$(window).scroll(function() {    
        var scroll = $(window).scrollTop();
        if (scroll >= 200) {
			
            header.removeClass('scroll-hidden').addClass("scroll-show");
        } else {
            header.removeClass("scroll-show").addClass('scroll-hidden');
        }
    });	


	

});

/*============/thread/====================*/

function onThreadShow(){
	
	        $('#rating-input').rating({
              min: 0,
              max: 5,
              step: 1,
              size: 'xs'
           });
      $('[data-toggle="tooltip"]').tooltip();
$("#openpopupfacebook").click(function(){ 
window.open("https://www.facebook.com/sharer/sharer.php?app_id=309437425817038&sdk=joey&u="+$("openpopupfacebook").attr("data-url")+"&display=popup&ref=plugin");
});
$("#openpopuptwitter").click(function(){ 
window.open("https://twitter.com/intent/tweet?original_referer=https%3A%2F%2Fdev.twitter.com%2Fweb%2Ftweet-button&text={{$artikel->judul}} &tw_p=tweetbutton&url="+$("openpopuptwitter").attr("data-url"));
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
		
		   
	  
}

var showTvc=function(param){
	
				var url=param.getAttribute("datasrc");
				$(".box-tvc").empty();
				$('<iframe>', {
					   src:url+ "?html5=1&amp;autoplay=1&amp;rel=0&amp;autohide=1&amp;wmode=transparent&amp;controls=1&amp;showinfo=1&amp;enablejsapi=1&amp;origin=http%3A%2F%2Fsolusiibuattack.com",
					   id:  'tvc-vidio',
					   title:"YouTube video player",
					   allowfullscreen:1 ,
						height: 400,
						width:700,
					   frameborder: 0,
					   scrolling: 'no'
					   }).appendTo('.box-tvc');
			}
			
			
var mshowTvc=function(param){
	$('.box-tvc').show();
	$('.close-box-tvc').show();
	 $('html, body').animate({ scrollTop: $('.box-tvc').offset().top }, 'slow')
					var url=param.getAttribute("datasrc");
				$(".box-tvc").empty();
				$('<iframe>', {
					   src:url+ "?html5=1&amp;autoplay=1&amp;rel=0&amp;autohide=1&amp;wmode=transparent&amp;controls=1&amp;showinfo=1&amp;enablejsapi=1&amp;origin=http%3A%2F%2Fsolusiibuattack.com",
					   id:  'tvc-vidio',
					   title:"YouTube video player",
					   allowfullscreen:1 ,
						height:320,
						width:320,
					   frameborder: 0,
					   scrolling: 'no'
					   }).appendTo('.box-tvc');
			}			
		

$(".showTvc").bind("click",function(){
	
					var url=$(this).attr("datasrc");
					
				$(".box-tvc").empty();
				$('<iframe>', {
					   src:url+ "?html5=1&amp;autoplay=1&amp;rel=0&amp;autohide=1&amp;wmode=transparent&amp;controls=1&amp;showinfo=1&amp;enablejsapi=1&amp;origin=http%3A%2F%2Fsolusiibuattack.com",
					   id:  'tvc-vidio',
					   title:"YouTube video player",
					   allowfullscreen:1 ,
						height:260,
						width:700,
					   frameborder: 0,
					   scrolling: 'no'
					   }).appendTo('.box-tvc');
			
	
});
$(".mshowTvc").bind("click",function(){

					var url=$(this).attr("datasrc");
				$(".box-tvc").empty();
				$('<iframe>', {
					   src:url+ "?html5=1&amp;autoplay=1&amp;rel=0&amp;autohide=1&amp;wmode=transparent&amp;controls=1&amp;showinfo=1&amp;enablejsapi=1&amp;origin=http%3A%2F%2Fsolusiibuattack.com",
					   id:  'tvc-vidio',
					   title:"YouTube video player",
					   allowfullscreen:1 ,
						height:320,
						width:320,
					   frameborder: 0,
					   scrolling: 'no'
					   }).appendTo('.box-tvc');
			
	
});
var closeboxtvcm=function(){
	$('.box-tvc').empty();
		$('.box-tvc').hide();
	$('.close-box-tvc').hide();
	
}

/*=================================*/

var onloadProduk=function(){
	$.ajaxSetup({
        async: false
    });
	   $.getJSON(base_url+"/produk/data",function(data){
		   		   data1=data;

	   });
	   
	    $(".inner-desc-1 .btn-close").click(function(){
	   
  $( ".inner-desc-1"  ).animate({height:"0px"},{duration: 200});
		    $( ".inner-desc-1" ).removeClass("shows");
	   
   });
      $(".inner-desc-2 .btn-close").click(function(){
  $( ".inner-desc-2"  ).animate({height:"0px"},{duration: 200});
		    $( ".inner-desc-2" ).removeClass("shows");
	   
   });
   
   $(".list-produk .produk-top").click(function(){


	  if( $( ".inner-desc-1" ).hasClass("shows"))
	  {

		  $( ".inner-desc-1"  ).animate({height:"0px"},{duration: 200});
		    $( ".inner-desc-1" ).removeClass("shows");
		  
	  }else if($( ".inner-desc-2" ).hasClass("shows")){
        		  
		  $( ".inner-desc-2"  ).animate({height:"0px"},{duration: 200});
			$( ".inner-desc-2" ).removeClass("shows");
	  }
	
	   $(".inner-desc-1 .media-left ").empty();
	   $(".inner-desc-1 .deskripsi ").empty();
	   
	   $(".inner-desc-1 .media-heading ").empty();
	   $(".inner-desc-1 .icon-pakaian").empty();
	   var img=$("<img >");
	   var imgicon=$("<img >");
	   
	   var id=$(this).attr("data-id")-1;
	   
	   img.attr("src",base_url+data1[id].large_image);
	   imgicon.attr("src",base_url+data1[id].icon_pakaian);
	   $(".inner-desc-1 .deskripsi ").append(data1[id].deskripsi)
	   $(".inner-desc-1 .media-left ").append(img);
	   $(".inner-desc-1 .media-heading ").append(data1[id].nama);
	   $(".inner-desc-1 .icon-pakaian").append(imgicon);
	      var height=$(".inner-desc-1 .media").height();
	   height+=170;
	   if(height<400)
	   {
		   var temp=400-height;
		   height+=temp;
		   
	   }
	    $( ".inner-desc-1"  ).animate({height:height+"px"},{duration: 800});
	 
	   $( ".inner-desc-1" ).addClass("shows");
   });
   
   
   
   $(".list-produk .produk-bottom").click(function(){
	  
	  if( $( ".inner-desc-1" ).hasClass("shows"))
	  {

		  $( ".inner-desc-1"  ).animate({height:"0px"},{duration: 200});
		    $( ".inner-desc-1" ).removeClass("shows");
		  
	  }else if($( ".inner-desc-2" ).hasClass("shows")){
        		  
		  $( ".inner-desc-2"  ).animate({height:"0px"},{duration: 200});
			$( ".inner-desc-2" ).removeClass("shows");
	  }
	  
	  	   $(".inner-desc-2 .media-left ").empty();
	   $(".inner-desc-2 .deskripsi ").empty();
	   $(".inner-desc-2 .icon-pakaian").empty();
	   $(".inner-desc-2 .media-heading ").empty();
	   
	   var img=$("<img >");
	   var id=$(this).attr("data-id")-1;
	   	   var imgicon=$("<img >");
	   img.attr("src",base_url+data1[id].large_image);
	   	   imgicon.attr("src",base_url+data1[id].icon_pakaian);
	   $(".inner-desc-2 .deskripsi ").append(data1[id].deskripsi)
	   $(".inner-desc-2 .media-left ").append(img);
	   $(".inner-desc-2 .media-heading ").append(data1[id].nama);
       $(".inner-desc-2 .icon-pakaian").append(imgicon);
	   var height=$(".inner-desc-2 .media").height();
	   height+=170;
	   if(height<400)
	   {   
		   var temp=400-height;
		   height+=temp;
		   
	   }
	    $( ".inner-desc-2"  ).animate({height:height+"px"},{duration: 800});
	   $( ".inner-desc-2" ).addClass("shows");
   });   
};
/*==================================================================*/



 $(".list-produk-mobile .item img").bind("click",function(){
		   
		   
var img=$("<img >");
	   var id=$(this).attr("data-id")-1;
$(".box-desc-produk .deskripsi ").empty();
$(".img-produk ").empty();
 $(".box-desc-produk .media-heading ").empty();
 if(id==10)
	 {
		 img.attr("src",base_url+"img/produk/mobile/produk-"+(id+1)+".jpg");	 
	 }else{
		   img.attr("src",base_url+"img/produk/mobile/produk-0"+(id+1)+".jpg");
	}
	   img.addClass("img-responsive");
	   $(".box-desc-produk .deskripsi ").append(data1[id].deskripsi)
	   $(".img-produk ").append(img);
	   $(".box-desc-produk .media-heading ").append(data1[id].nama);
  	   		   
	   });
	   
var onLoadProdukMobile=function(){
	
 $.ajaxSetup({
        async: false
    });
	   $.getJSON(base_url+"/produk/data",function(data){
		   		   data1=data;

var img=$("<img >");
var id=0;
$(".box-desc-produk .deskripsi ").empty();
$(".img-produk ").empty();
$(".box-desc-produk .media-heading ").empty();
   img.attr("src",base_url+"img/produk/mobile/produk-0"+(id+1)+".jpg");
img.addClass("img-responsive");
$(".box-desc-produk .deskripsi ").append(data1[id].deskripsi)
$(".img-produk ").append(img);
$(".box-desc-produk .media-heading ").append(data1[id].nama);
});
	   
	   $(".list-produk-mobile .item img").bind("click",function(){
		   
		   
var img=$("<img >");
	   var id=$(this).attr("data-id")-1;
$(".box-desc-produk .deskripsi ").empty();
$(".img-produk ").empty();
 $(".box-desc-produk .media-heading ").empty();
 if(id==10)
	 {
		 img.attr("src",base_url+"img/produk/mobile/produk-"+(id+1)+".jpg");	 
	 }else{
		   img.attr("src",base_url+"img/produk/mobile/produk-0"+(id+1)+".jpg");
	}
	   img.addClass("img-responsive");
	   $(".box-desc-produk .deskripsi ").append(data1[id].deskripsi)
	   $(".img-produk ").append(img);
	   $(".box-desc-produk .media-heading ").append(data1[id].nama);
  	   		   
	   });
}
