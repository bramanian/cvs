<!DOCTYPE html>
<html>
<head>
@include('layout.head')
</head>

<body>
<div class="main-body1">
<div clas="col-md-12 padding-margin-o"  >
<!---------------------------------------------------------------------------------------------------------->

@include('layout.header')
@include('layout.menu')

<div class="col-md-10 col-md-offset-1 " style="padding-top:10px;margin-bottom:-10px;">
<div class="col-md-10 col-md-offset-1">

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
<!--------------------------------------------ini bagian content-------------------------------------------------------------->
<div class="container-fluid  content-md">
<div class="col-md-10 col-lg-offset-1 content-md-01">


<!-------------------------





-------------------------->
	<div style="padding-top:20px;">
	<div class="col-md-2">
	<ul class="list-group">
		@if( Route::getCurrentRoute()->getPath()=="home")
		  <li class="list-group-item list-group-item-success"><a href="{{URL::to("/home")}}"><i class="fa fa-user"></i> Profile</a></li>
		 @else
		 <li class="list-group-item "><a href="{{URL::to("/home")}}"> <i class="fa fa-user"></i> Profile</a></li>
		 @endif	
		 
	  		@if(Route::getCurrentRoute()->getPath()=="home/notification")
		   <li class="list-group-item list-group-item-success"><a href="{{URL::to("/home/notification")}}"><i class="fa fa-bell-o"></i> Notification</a></li>
		 @else
		   <li class="list-group-item "><a href="{{URL::to("/home/notification")}}"> <i class="fa fa-bell-o"></i> Notification</a></li>
		 @endif		  
	  
	  		@if( Route::getCurrentRoute()->getPath()=="home/komentar")
		  <li class="list-group-item list-group-item-success"><a href="{{URL::to("/home/komentar")}}"><i class="fa fa-comments"></i> Comment</a></li>
		 @else
		 <li class="list-group-item "><a href="{{URL::to("/home/komentar")}}"> <i class="fa fa-comments"></i> Comment</a></li>
		 @endif	
		@if( Route::getCurrentRoute()->getPath()=="home/thread/create")
		  <li class="list-group-item list-group-item-success"><a href="{{URL::to("/")}}/home/thread/create"><i class="fa fa-plus"></i> New Thread</a></li>
		 @else
			 
		 <li class="list-group-item "><a href="{{URL::to("/")}}/home/thread/create"><i class="fa fa-plus"></i> New Thread</a></li>
		 @endif	
		 
		@if( Route::getCurrentRoute()->getPath()=="home/thread")
		   <li class="list-group-item list-group-item-success"><a href="{{URL::to("/")}}/home/thread"><i class="fa fa-list-alt"></i> My Thread</a></li>
		 @else
		  <li class="list-group-item "><a href="{{URL::to("/")}}/home/thread"><i class="fa fa-list-alt"></i> My Thread</a></li>
		 @endif	
		 
		@if( Route::getCurrentRoute()->getPath()=="home/bantuan")
		   <li class="list-group-item list-group-item-success"><a href="{{URL::to("/")}}/home/bantuan"><i class="fa fa-info"></i>&nbsp; Guide</a></li>
		 @else
		  <li class="list-group-item "><a href="{{URL::to("/")}}/home/bantuan"><i class="fa fa-info"></i>&nbsp; Guide</a></li>
		 @endif			 
	
	</ul>
	</div>
	<div class="col-md-10">

			
		    {{ HTML::ul($errors->all(),array("class"=>"alert-danger list-unstyled text-capitalize","style"=>"padding:10px;")) }}
			@if (Session::has("success"))
				<h4 class="text-capitalize alert-success">{{Session::get("success")}}</h4>
			@endif
			@if (Session::has("error"))
			 <h4 class="text-capitalize alert-danger">{{Session::get("error")}}</h4>
			@endif
			<?php echo $content; ?>

	</div>
	</div>

<!-------------------------





--------------------------->
</div>
@include('layout.footer')
</div>
</div>
<script src="{{URL::to("/")}}/js/holder.js"></script>
<link href="{{URL::to("/")}}/css/dataTables.bootstrap.css" rel="stylesheet" >
<script src="{{URL::to("/")}}/js/jquery.dataTables.min.js"></script>
<script src="{{URL::to("/")}}/js/dataTables.bootstrap.js"></script>
<script src="{{URL::to("/")}}/js/ajaxupload.3.5.js"></script>
<script src="{{URL::to('/')}}/js/bootstrap.js"></script>
@include('layout.login-modal')

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