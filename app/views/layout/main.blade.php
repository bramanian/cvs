<!DOCTYPE html>
<html>
  <head>
    @include('layout.head')
  </head>
  <body data-spy="scroll" id="scroll-top">
    <div class="main-body1">
      <div clas="col-md-12 padding-margin-o"  >
        <!---------------------------------------------------------------------------------------------------------->
        @include('layout.header')
        @include('layout.menu')
        <!--------------------------------------------ini bagian content-------------------------------------------------------------->
        <div class="container-fluid  content-md">
          <div id="content-home" class="automargin">
            <div class="col-md-10 col-md-offset-1 " style="padding-top:10px;margin-bottom:-10px;">
              <div class="col-md-10 col-md-offset-1" style="margin-left:0px;padding-left:0px">
                @if(isset($breadcrumbs))
                
                <ol class="breadcrumb  breadcrumb-blank">
                  @foreach($breadcrumbs as $breadcrumb => $nilaibreadcrumb)
                  @if($nilaibreadcrumb!="")
                  <li><a href="{{URL::to("/")}}{{$nilaibreadcrumb}}"> <i ></i> {{$breadcrumb}}</a> </li>
                  @else
                  <li>{{$breadcrumb}} </li>
                  @endif
                  @endforeach
                </ol>
                @endif
              </div>
            </div>
            <div class=" col-md-10 col-md-offset-1 content-md-01">
              @if (Session::has("success"))
                <h4 class="text-capitalize alert-success">{{Session::get("success")}}</h4>
              @endif
              <?php echo $content; ?>
            </div>
          </div>
        </div>
        @include('layout.footer')
      </div>
      <script src="{{URL::to('/')}}/js/bootstrap.js"></script>
      <script>
      $(function(){
      var owl = $("#beautytips");
      owl.owlCarousel({
      items : 3, //10 items above 1000px browser width
      itemsDesktop : [1000,5], //5 items between 1000px and 901px
      itemsDesktopSmall : [900,3], // 3 items betweem 900px and 601px
      itemsTablet: [600,2], //2 items between 600 and 0;
      itemsMobile : false // itemsMobile disabled - inherit from itemsTablet option
      
      });
      // Custom Navigation Events
      $(".next").click(function(){
      owl.trigger('owl.next');
      })
      $(".prev").click(function(){
      owl.trigger('owl.prev');
      })
      });
      </script>
      @include('layout.login-modal')
      @include('layout.signup-modal')
      <a href="#scroll-top"  class="btn  scroll-top"><i class="fa fa-2x fa-arrow-up"></i> </a>
      <script>
      $('a[href*=#]:not([href=#])').click(function() {
      if (location.pathname.replace(/^\//,'') == this.pathname.replace(/^\//,'') && location.hostname == this.hostname) {
      var target = $(this.hash);
      target = target.length ? target : $('[name=' + this.hash.slice(1) +']');
      if (target.length) {
      $('html,body').animate({
      scrollTop: target.offset().top - 50
      }, 1000);
      return false;
      }
      }
      });
      $(function() {
        if($(window).width() >1370)
        {
          $("#content-home").addClass("automargin");
        }else{
          
          $("#content-home").removeClass("automargin");
            }
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
      $(window).resize(function() {
      if($(window).width() >1370)
      {
        $("#content-home").addClass("automargin");
      }else{
        
        $("#content-home").removeClass("automargin");
      }
      });
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