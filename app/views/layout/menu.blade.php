<div class="col-md-12" style="margin:0px; padding:0px"> 
<nav class="navbar  nav-top-menu" >
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header" >
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#menu-attack">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
 <button type="button" class="navbar-toggle btn-search-top" onclick="onSearch()" >
 <i class="fa fa-search"></i>
</button> 
      <a class="navbar-brand" href="#">&nbsp;</a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse " id="menu-attack">
	 <ul class="nav navbar-nav navbar-right ">
	     	<?php if(Route::currentRouteAction()=="HomeController@home"){?>
			<li class="active"><a href=" <?php echo URL::to("/")?>">HOME</a></li>
			<?php }else{?>
			<li><a href=" <?php echo URL::to("/") ?>/">HOME</a></li>
			<?php }?>
			
	     	<?php if(KomentarController::getController(Route::currentRouteAction())=="SmartController"||KomentarController::getController(Route::currentRouteAction())=="ArtikelController") {?>
			<li class="active"><a href=" <?php echo URL::to("/") ?>/smart">SMART MOM CLUB</a></li>
			<?php }else{?>
			<li ><a href=" <?php echo URL::to("/") ?>/smart">SMART MOM CLUB</a></li>
			<?php }?>	
			
	     	<?php if(KomentarController::getController(Route::currentRouteAction())=="TipsController") {?>
			<li class="active"><a href=" <?php echo URL::to("/") ?>/tips">SMART TIPS</a></li>
			<?php }else{?>
			<li ><a href=" <?php echo URL::to("/") ?>/tips">SMART TIPS</a></li>
			<?php }?>	
			
	     	<?php if(KomentarController::getController(Route::currentRouteAction())=="ZoneController") {?>
			<li class="active"><a href=" <?php echo URL::to("/") ?>/zone">ATTACK ZONE</a></li>
			<?php }else{?>
			<li><a href=" <?php echo URL::to("/") ?>/zone">ATTACK ZONE</a></li>
			<?php }?>		
			
	     	<?php if(KomentarController::getController(Route::currentRouteAction())=="GuideController") {?>
			<li class="active"><a href=" <?php echo URL::to("guide") ?>">LAUNDRY GUIDE</a></li>
			<?php }else{?>
			<li><a href=" <?php echo URL::to("guide") ?>">LAUNDRY GUIDE</a></li>
			<?php }?>				

	    
      </ul>

    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
  <div class="col-xs-12 text-input-search" style="margin:0px; padding:0px;">
  <input type="text" class="form-control  text-center" placeholder="Search"><button  class="btn" onClick="onSearch()" style="background-color:transparent; position:absolute; right:0px; top:0px; margin-top:-5px;"><i class="fa fa-2x fa-times"></i></button>
  </div>
</nav>
</div>