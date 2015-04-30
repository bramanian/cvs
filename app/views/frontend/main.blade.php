<!DOCTYPE html>
<html>
	<head>
		@include('layout.head')
		<script type="text/javascript">
		/*var gaq = gaq || [];
		_gaq.push(['_setAccount', 'UA-42420016-1']);
		_gaq.push(['_trackPageview']);
		(function() {
		var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
		ga.src = ('https:' == document.location.protocol ? 'https://' : 'http://') + 'stats.g.doubleclick.net/dc.js';
		var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
		})();*/
		</script>
	</head>
	<body id="scroll-top">
		<div class="main-body1">
			<div clas="col-md-12 padding-margin-o"  >
				<!---------------------------------------------------------------------------------------------------------->
				<style>
				</style>
				@include('layout.header')
				@include('layout.menu')
				<div class="col-md-12" style="background-image:url('img/bg-bottom-menu.jpg');background-size:100% 100%;  height:22px;">&nbsp;</div>
				<div class="col-md-12 padding-margin-o" >
					<div id="slide-attack" class="owl-carousel owl-theme">
						<?php  if(Agent::isMobile()) { ?>
						
						<div class="item" style="border:0px;">
							<img data-src="{{URL::to("/")}}/img/mobile/slider1.jpg" class="lazyOwl"  >
						</div>
						<div class="item" style="border:0px;">
							<img data-src="{{URL::to("/")}}/img/mobile/slider2.jpg" class="lazyOwl"  >
						</div>
						<?php }else{  ?>
						<div class="item" style="border:0px;">
							<img data-src="{{URL::to("/")}}/img/slider1.jpg" class="lazyOwl"  >
						</div>
						<div class="item" style="border:0px;">
							<img data-src="{{URL::to("/")}}/img/slider2.jpg" class="lazyOwl"  >
						</div>
						<?php } ?>
						
					</div>
					<a class="btn  prev" style="position:absolute; left:10px; top:50%; margin-top:-25px; border-radius:20px;"><i class="fa fa-angle-double-left fa-2x"></i></a>
					<a class="btn  next" style="position:absolute; right:10px; top:50%; margin-top:-25px; border-radius:20px; "><i class="fa fa-angle-double-right fa-2x"></i></a>
					<div class="col-md-12" style="background-image:url('{{URL::to("/")}}/img/bg-slide-top-bottom.png');background-size:auto 100%; height:7px;">&nbsp;</div>
				</div>
				<style>
				ul.list-latest-articles li, ul.list-latest-articles li{
					//border-bottom:0.7px solid #BCBEC0;
					
				}
				</style>
				
				<!--------------------------------------------ini bagian content-------------------------------------------------------------->
				<div class="container-fluid  content-md" >
					<div id="content-home">
						<div class="col-xs-11 col-md-10 col-md-offset-1 content-md-01" style="z-index:11;">
							<div style="min-width:auto; ">
								<div class="col-xs-12 col-md-12 box-line1-home" style="">
									<div class="col-md-4 content-smart-mom">
										<div class="col-md-12 padding-margin-o" >
											<h1 class="smartmom-title" >Smart Mom Club</h1>
										</div>
										<div class=" col-md-12 padding-margin-o">
											<center><img src="img/image2.jpg" class="img-responsive img-content-smart-mom"></center>
										</div>
										<!--
										<div class="col-md-12 padding-margin-o">
													<h4 class="smartmom-subtitle">Selamat Begabung Ibu Cerdas </h4>
										</div>
										-->
										
										<div class="col-md-12 padding-margin-o content-smartmom" >
											<br>
											<ol class=" list-ibu-cerdas list-unstyled">
												
												<?php
												$threads=ArtikelController::getArtikel();
												?>
												
												@if(isset($threads))
												@foreach($threads as $thread)
												
												<li class="text-capitalize" style="color: #1E6397"> <a  href="{{URL::to('/thread')}}/{{UsersController::getDate($thread->created_at)}}/{{$thread->id}}/{{ArtikelController::getURL($thread->judul)}}"  class="masterTooltip" title="{{$thread->judul}}">{{$thread->judul}}</a></li>
												@endforeach
												@endif
											</ol>
											
										</div>
										<div class="col-md-12 padding-margin-o text-right">
											<a class="btn  btn-xs btn-see-all" href="{{URL::to('thread/all')}}">See All <i class="fa fa-angle-right "></i></a>
										</div>
									</div>
									<div class="col-md-4 latest-articles">
										<div class="col-md-12 padding-margin-o" >
											<h1 class="latest-articles-title">Smart Tips</h1>
										</div>
										<div class="col-md-12 padding-margin-o content-latestarticle"  >
											
											<?php
											$tipss=TipsController::getTips();
											?>
											<ul class="list-unstyled list-latest-articles">
												@if(isset($datatips))
												<a href="{{URL::to('/tips')}}/{{UsersController::getDate($datatips->created_at)}}/{{$datatips->id}}/{{ArtikelController::getURL($datatips->judul)}}" class="text-capitalize " style="font-size:9pt;" title="{{$datatips->judul}}"> <h5  style="color: #1E6397; margin:5px 0px;  font-size:11pt">{{$datatips->judul}}</h5></a>
												@endif
												@if(isset($tipss))
												<?php $ndatatips=0;?>
												@foreach($tipss as $datatips)
												<?php if($ndatatips>=3) break;?>
												<li style="border-bottom:1px solid; border-color:rgba(188, 190, 192,0.5); margin:0px; padding:7px 0px;">
													<div class="media">
														<div class="media-left">
															<a href="{{URL::to('/tips')}}/{{UsersController::getDate($datatips->created_at)}}/{{$datatips->id}}/{{ArtikelController::getURL($datatips->judul)}}"  >
																<img class="media-object masterTooltip" src="{{URL::to('/')}}/timthumb.php?src={{URL::to('/admin/'.$datatips->photo)}}&h=100&w=150"  title="{{$datatips->judul}}">
															</a>
														</div>
														<div class="media-body">
															<a href="{{URL::to('/tips')}}/{{UsersController::getDate($datatips->created_at)}}/{{$datatips->id}}/{{ArtikelController::getURL($datatips->judul)}}"  >
															<h5 class="media-heading text-capitalize" >{{$datatips->judul}}</h5></a>
														</div>
													</div>
												</li>
												<?php $ndatatips++;?>
												@endforeach
												@endif
												
											</ul>
										</div>
										<div class="col-md-12 padding-margin-o text-right">
											<a class="btn  btn-xs btn-see-all" href="{{URL::to('tips')}}">See All <i class="fa fa-angle-right "></i> </a>
										</div>
									</div>
									<div class="col-md-4 follow-article form-gabung-home">
										<div class="col-md-12 padding-margin-o" style="margin-top:20px;" >
											<div class="col-md-5 padding-margin-o">
												<h1 class="follow-us-title padding-margin-o" style="margin-top:35px;">Follow Us</h1>
											</div>
											<div class="col-md-7 padding-margin-o" >
												<a href="https://www.facebook.com/solusiibu" class="btn btn-primary btn-md follow-us-facebook" style="width:90px; float:left; margin-right:5px;"><i class="fa fa-facebook-official fa-2x white"></i> <br>
													<center class="white" id="facebook-like-count">0</center>
												</a>
												<a href="https://twitter.com/solusimencuci" class="btn btn-primary btn-md follow-us-twitter " style="width:90px;"><i class="fa fa-twitter fa-2x white"></i> <br>
													<center class="white" id="twitter-count">0</center>
												</a>
											</div>
										</div>
										
										<div class="col-md-12 padding-margin-o" style="margin-top:10px;" >
											<img src="img/image3.png" class="img-responsive">
										</div>
									</div>
								</div>
								
								<div class="col-xs-12 col-md-12">
									<div class="col-md-4 home-mom-of-the-mom">
										<div class="col-md-12 padding-margin-o" >
											<h1 class="momofthe-month-title" >Mom Of The Month</h1>
										</div>
										<div class=" col-md-12 padding-margin-o">
											<a href="{{URL::to('momofthemom/vincensia')}}">
												<img src="img/image7.jpg" class="img-responsive img-momofthe-month-title masterTooltip" title="Ibu Vincensia Naibaho">
											</a>
										</div>
										<div class="col-md-12 padding-margin-o">
											<h4 class="momofthe-month-subtitle">Ibu Vincensia Naibaho </h4>
										</div>
										<div class="col-md-12 padding-margin-o momofthe-month-desc">
											<p>Saya cuma ibu rumah tangga biasa yang tidak memiliki gaji rutin seperti ibu-ibu pekerja lainnya. Di keseharian sayalah yang.</p>
										</div>
										<div class="col-md-12 padding-margin-o text-right">
											<a class="btn  btn-xs btn-see-all" href="{{URL::to('momofthemom/vincensia')}}">Read More <i class="fa fa-angle-right "></i> </a>
										</div>
									</div>
									<div class="col-md-4 home-laundry-guide">
										<div class="col-md-12 padding-margin-o" >
											<h1 class="momofthe-month-title" >Laundry Guide</h1>
										</div>
										<div class=" col-md-12 padding-margin-o">
											<img src="img/image6.jpg" class="img-responsive img-momofthe-month-title masterTooltip" title="Tips Mengurangi Bau Apek">
										</div>
										<div class="col-md-12 padding-margin-o">
											<h4 class="momofthe-month-subtitle">Tips Mengurangi Bau Apek </h4>
										</div>
										<div class="col-md-12 padding-margin-o momofthe-month-desc">
											<p>Usahakan untuk segera mencuci baju Anda yang terkena air hujan. Jangan menunda karena akan mengakibatkan bakteri di...</p>
										</div>
										<div class="col-md-12 padding-margin-o text-right">
											<a class="btn  btn-xs btn-see-all" href="{{URL::to('#')}}" >See All <i class="fa fa-angle-right "></i> </a>
										</div>
									</div>
									<div class="col-md-4 form-facebook-home" id="fbwidget" style="display:none">
										<div class="col-md-12 padding-margin-o" >
											<h3 style="padding-bottom:0px; color:#1E6397; margin-bottom:0px;"><i class="fa fa-facebook " style="color:#1E6397"></i> &nbsp;&nbsp;&nbsp;Solusi Mencuci <a style="float:right;" href="https://www.facebook.com/solusiibu" class="btn btn-sm btn-primary">Follow</a><h3>
										</div>
										<div class="col-md-12 padding-margin-o" >
											<ul class="list-unstyled list-inline " id="list-new-facebook" >
												<div class="loading-facebook" >
													<i class="fa fa-3x fa-spinner fa-pulse "></i>
												</div>
											</ul>
										</div>
										
									</div>
									<div class="col-md-4" id="twwidget" style="display:none;margin-top:10px">
										<a class="twitter-timeline" href="https://twitter.com/solusimencuci" data-widget-id="592011595040968704">Tweets by @solusimencuci</a>
									</div>
								</div>
								
							</div>
						</div>
					</div>
					<div class="col-md-12 padding-margin-o" style="margin-top:-20px;z-index:10;">
						<img src="img/bg-bottom-top.png" style="width:100%; height:auto;">
					</div>
					@include('layout.bottom-menu')
					@include('layout.login-modal')
					@include('layout.signup-modal')
				</div>
			</div>
			<a href="#scroll-top"  class="btn  scroll-top"><i class="fa fa-2x fa-arrow-up"></i> </a>
			<script src="{{URL::to("/")}}/js/bootstrap.js"></script>
			<script>
				var $imgfacebook = new Array();
				$(document).ready(function() {

				    if ($(window).width() > 1370) {
				        $("#content-home").addClass("automargin");
				    } else {

				        $("#content-home").removeClass("automargin");
				    }
				    if ($(window).width() <= 640) {

				        $(".content-md-01").addClass("center-block");
				    } else {

				        $(".content-md-01").removeClass("center-block");
				    }
				    var owl = $("#slide-attack");

				    owl.owlCarousel({
				        items: 1, //10 items above 1000px browser width
				        itemsDesktop: [1000, 1], //5 items between 1000px and 901px
				        itemsDesktopSmall: [900, 1], // betweem 900px and 601px
				        itemsTablet: [600, 1], //2 items between 600 and 0
				        itemsMobile: true, // itemsMobile disabled - inherit from itemsTablet option
				        autoPlay: true,
				        lideSpeed: 500,
				        stopOnHover: true,
				        responsive: true,
				        lazyLoad: true,
				        lazyEffect: "fade"
				    });
				    // Custom Navigation Events
				    $(".next").click(function() {
				        owl.trigger('owl.next');
				    })
				    $(".prev").click(function() {
				        owl.trigger('owl.prev');
				    })
				    $(".play").click(function() {
				        owl.trigger('owl.play', 1000); //owl.play event accept autoPlay speed as second parameter
				    })
				    $(".stop").click(function() {
				        owl.trigger('owl.stop');
				    })

				    $.getJSON("facebook", function(obj) {
				        var n = 0;

				        var $brand = "<div class='media'><div class='media-left media-middle'><a href='#'><img class='media-object' style='width:35px;' src='img/logo-attack.jpg' alt=''></a></div><div class='media-body'><h4 class='media-heading'>Solusi Mencuci</h4></div></div>	";
				        var newstr = "https://www.facebook.com/solusiibu/posts/";

				        while (n < obj.length) {
				            if (obj[n].pesan != null) {
				                var $img = "";
				                var $li = document.createElement("LI");

				                /* 			 $.getJSON( , function( data ) {
							$img="<center><img class='img-facebook' src='"+data[0].images[0].source+"'><center>";
										alert(data);
											}); */

				                var $img = "<center><img id='facebook-image" + n + "' class='img-facebook' src='" + obj[n].image + "'><center>";
				                var $p = "<p>" + obj[n].pesan.substring(0, 144) + "" + "</p>";
				                newstr = newstr + obj[n].id.replace('195784980453175_', '');
				                var $a = $p;
				                $a = $a + $img;
				                $li.innerHTML = $brand + "<a href='" + newstr + "'>" + $a + "</a>";
				                document.getElementById("list-new-facebook").appendChild($li);
				            }

				            n++;
				        }
				        $(".loading-facebook").hide();
				    }).done(function() {

				    });


				});

				function facebookimage() {
				    var notnull = 0;
				    for (var n = 0; n < $imgfacebook.length; n++) {
				        if ($imgfacebook[n] != null) {
				            alert("jalankan");
				            var $url = "http://graph.facebook.com/" + $imgfacebook[n] + "?fields=images";
				            var imgrource = $.getJSON($url).done(function(response) {


				                $("#facebook-image" + notnull).attr("src", response.images[0].source);
				                var $loader = $("#facebook-image" + n);
				                $loader.one('load', function() {
				                    $img.attr('src', $loader.attr('src'));
				                });
				                $loader.attr('src', response.images[0].source);
				                if ($loader.complete) {
				                    $loader.trigger('load');
				                }
				            });
				            notnull++;
				        }
				    }

				}

				$(window).resize(function() {
				    if ($(window).width() > 1370) {
				        $("#content-home").addClass("automargin");
				    } else {

				        $("#content-home").removeClass("automargin");
				    }
				    if ($(window).width() <= 640) {

				        $(".content-md-01").addClass("center-block");
				    } else {

				        $(".content-md-01").removeClass("center-block");
				    }
				});
				$('a[href*=#]:not([href=#])').click(function() {
				    if (location.pathname.replace(/^\//, '') == this.pathname.replace(/^\//, '') && location.hostname == this.hostname) {
				        var target = $(this.hash);
				        target = target.length ? target : $('[name=' + this.hash.slice(1) + ']');
				        if (target.length) {
				            $('html,body').animate({
				                scrollTop: target.offset().top - 50
				            }, 1000);
				            return false;
				        }
				    }
				});
				// Facebook likes
				var $url = "http://graph.facebook.com/solusiibu";
				var result = $.getJSON($url).done(function(response) {
				    $('#facebook-like-count').html(response.likes);
				});
				// Twitter count
				var data = $.getJSON("http://query.yahooapis.com/v1/public/yql?q=SELECT%20*%20from%20html%20where%20url=%22https://twitter.com/solusimencuci%22%20AND%20xpath=%22//a[@data-nav=%27followers%27]/span[@class=%27ProfileNav-value%27]%22&format=json").done(function(response){
					var count = response.query.results.span.content;
					$('#twitter-count').html(count);
				});

				! function(d, s, id) {
				    var js, fjs = d.getElementsByTagName(s)[0],
				        p = /^http:/.test(d.location) ? 'http' : 'https';
				    if (!d.getElementById(id)) {
				        js = d.createElement(s);
				        js.id = id;
				        js.src = p + "://platform.twitter.com/widgets.js";
				        fjs.parentNode.insertBefore(js, fjs);
				    }
				}(document, "script", "twitter-wjs");
				var myArray = ['fbwidget', 'twwidget'];
				var rand = myArray[Math.floor(Math.random() * myArray.length)];
				document.getElementById(rand).style.display = 'block';
			</script>
		</div>
		<script type="text/javascript">
			var _gaq = _gaq || [];
			_gaq.push(['_setAccount', 'UA-42420016-1']);
			_gaq.push(['_trackPageview']);
			(function() {
			var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
			ga.src = ('https:' == document.location.protocol ? 'https://' : 'http://') + 'stats.g.doubleclick.net/dc.js';
			var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
			})();
		</script>
	</body>
</html>