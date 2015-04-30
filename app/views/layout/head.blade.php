<meta http-equiv="content-type" content="text/html; charset=UTF-8">
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
@if(isset($title))
<title>{{$title}}</title>
@else
<title>ATTACK- Solusi Ibu Mencuci </title>
@endif
<meta name="description" content="">

<link rel="shortcut icon" href="{{URL::to('/img')}}/solusi-ibuattack.ico" type="image/x-icon" />
<?php  if(Agent::isMobile()) { ?>
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
<?php }else { ?>
<meta name='viewport' content="width=1360; maximum-scale=1.0;" />
<?php } ?>
<link rel="stylesheet" href="{{URL::to("/")}}/css/bootstrap.css">
    <!-- Important Owl stylesheet -->
    <link rel="stylesheet" href="{{URL::to("/")}}/css/owl.carousel.css">
     
    <!-- Default Theme -->
    <link rel="stylesheet" href="{{URL::to("/")}}/css/owl.theme.css">
     
    <!-- Include js plugin -->	

<link rel="stylesheet" href="{{URL::to("/")}}/font-awesome/css/font-awesome.css">
<script type="text/javascript" language="javascript" src="{{URL::to("/")}}/js/jquery-2.1.1.min.js"></script>
<script type="text/javascript" language="javascript" src="{{URL::to("/")}}/js/jquery.easing.1.3.js"></script>

    <script src="{{URL::to("/")}}/js/owl.carousel.js"></script>
<!--[if lt IE 9]><script src = "js/html5shiv.js"></script><![endif]-->
<!--[if lt IE 9]><script src = "js/html5shiv.js"></script><![endif]-->
<link rel="stylesheet" href="{{URL::to("/")}}/css/style.css">
   <script> var rootDirectory="{{URL::to("/")}}"; 
            var base_url="{{URL::to('/')}}/"; </script>
<script type="text/javascript" language="javascript" src="{{URL::to("/")}}/js/index-imam.js"></script>			