<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>{{$title}}</title>
     @yield("header")
<script>
var rootDirectory="{{URL::to('/')}}";
</script>
</head>
<body>
<div id="wrapper">
       @yield("menu") 
		<div id="page-wrapper" >
		@if ($errors->any())
			 <ul class="list-unstyled alert-danger message-list">
					{{ implode('', $errors->all('<li class="text-capitalize">:message</li>')) }}
			</ul>
			@endif
			@if (Session::has("success"))
				<h4 class="text-capitalize alert-success">{{Session::get("success")}}</h4>
			@endif
			@if (Session::has("error"))
			 <h4 class="text-capitalize alert-danger">{{Session::get("error")}}</h4>
			@endif
			
		   @yield('body')
		</div><!-- /#page-wrapper -->
</div>
@yield("footer")
</body>
</html>


