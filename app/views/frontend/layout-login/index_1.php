<!DOCTYPE html>
<html><head>
<meta http-equiv="content-type" content="text/html; charset=UTF-8">
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<title>Nutraforcol </title>
<meta name="description" content="">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="css/style.css">
<!--[if lt IE 9]><script src = "js/html5shiv.js"></script><![endif]-->
</head>
<body>
<header style="display: block; position: relative; float: none;" class="section section_1">
  <div class="wrapper">
header
  </div>
</header><!-- header ends -->
<div class="navigation">
  <nav class="wrapper">
    <ul class="clearfix">
      <li><a href="#product" title="Products">Products</a></li>
      <li><a href="#team" title="Team">Team</a></li>
      <li><a href="#contact" title="Contact">Contact</a></li>
    </ul>
  </nav>
</div><!-- .navigation ends -->
<div id="pager" class="pageScrollerNav standardNav right dark">
  <ul>
    <li class=""><a href="#">Link 1</a></li>
    <li class="active"><a href="#">Link 2</a></li>
    <li class=""><a href="#">Link 3</a></li>
    <li class=""><a href="#">Link 4</a></li>
  </ul>
</div>
<main role="main">

  
  <div style="display: block; position: relative; float: none;" id="product" class="section section_2">
    <div class="wrapper">
  ini adalah product
  
  </div><!-- .wrapper ends -->
  </div><!-- #product ends -->
  
  <div style="display: block; position: relative; float: none;" id="team" class="section section_3">
    <div class="wrapper">
team
	 </div><!-- .wrapper ends -->
  </div><!-- #product ends -->
  <div style="display: block; position: relative; float: none;" id="contact" class="section section_4">
    <div class="wrapper">
      Contat Us
    </div>
 
 </div>
</main>
<footer role="contentinfo">
  <div class="wrapper">
    <p>© 2014 PetHealthApps. All rights reserved. The App Store is a Registered Trademark of Apple.</p>
  </div>
  <div class="bottom-footer">
    <div class="wrapper">
      <a href="http://www.momentum18.com/" title="A Momentum 18 Web Design">A Momentum 18 Web Design</a>
    </div><!-- .wrapper ends -->
  </div><!-- .bottom-footer ends -->
</footer><!-- footer ends -->

<script src="js/jquery-1.js"></script> 
<script src="js/pagescroller.js"></script>
<script src="js/easydropdown.js"></script>

<script>
  $(document).ready(function() {

    // NAVIGATION
    $('.navigation a').click(function() {
      $('html,body').animate({
          scrollTop: $( $(this).attr('href') ).offset().top 
      },1000);
      return false;
    });

    // PAGE SCROLL
    $('body').pageScroller({
			navigation: '#pager',
      animationSpeed: 1000
		});
    

  });
</script>


</body></html>