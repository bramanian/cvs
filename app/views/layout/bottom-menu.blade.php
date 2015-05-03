<div class="col-md-12  " style="background:#1e9e6c" >
<div class="col-md-10 col-md-offset-1 menu-bottom" >
<img src="{{URL::to("/")}}/img/image10.jpg" class="img-bottom-cao">

	<div class="col-md-12 bottom-menu-attack">
		<ul class=" list-unstyled list-inline footer-menu padding-margin-o ">
	     	<?php if(Route::currentRouteAction()=="HomeController@home"){?>
			<li class=""><a href=" <?php echo URL::to("/")?>">HOME</a></li>
			<?php }else{?>
			<li><a href=" <?php echo URL::to("/") ?>/">HOME</a></li>
			<?php }?>
			
	     	<?php if(KomentarController::getController(Route::currentRouteAction())=="SmartController"||KomentarController::getController(Route::currentRouteAction())=="ArtikelController") {?>
			<li class=""><a href=" <?php echo URL::to("/") ?>/smart">SMART MOM CLUB</a></li>
			<?php }else{?>
			<li ><a href=" <?php echo URL::to("/") ?>/smart">SMART MOM CLUB</a></li>
			<?php }?>	
			
	     	<?php if(KomentarController::getController(Route::currentRouteAction())=="TipsController") {?>
			<li class=""><a href=" <?php echo URL::to("/") ?>/tips">SMART TIPS</a></li>
			<?php }else{?>
			<li ><a href=" <?php echo URL::to("/") ?>/tips">SMART TIPS</a></li>
			<?php }?>	
			
	     	<?php if(KomentarController::getController(Route::currentRouteAction())=="ZoneController") {?>
			<li class=""><a href=" <?php echo URL::to("/") ?>/zone">ATTACK ZONE</a></li>
			<?php }else{?>
			<li><a href=" <?php echo URL::to("/") ?>/zone">ATTACK ZONE</a></li>
			<?php }?>		
			
	     	<?php if(KomentarController::getController(Route::currentRouteAction())=="GuideController") {?>
			<li class=""><a href=" <?php echo URL::to("/") ?>/guide">LAUNDRY GUIDE</a></li>
			<?php }else{?>
			<li><a href=" <?php echo URL::to("/") ?>/guide">LAUNDRY GUIDE</a></li>
			<?php }?>
			
	     	<?php if(KomentarController::getController(Route::currentRouteAction())=="GuideController") {?>
			<li class=""><a href=" <?php echo URL::to("contactus") ?>">CONTACT US</a></li>
			<?php }else{?>
			<li><a href=" <?php echo URL::to("contactus") ?>">CONTACT US</a></li>
			<?php }?>			
		</ul>
	</div>
	<div class="col-md-12 footer-copyright"  >
	 &nbsp;Copyright @ 2015 PT KAO. Indonesia All Rights Reserved.
	</div>
</div>	
</div>
