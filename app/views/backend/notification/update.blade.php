<script type="text/javascript"  language="javascript" src="{{URL::to("")}}/plugin/editor/src/wysiwyg.js"></script>
<script type="text/javascript" language="javascript" src="{{URL::to("")}}/plugin/editor/src/wysiwyg-editor.js"></script>
<link type="text/css"  rel="stylesheet" href="{{URL::to("/")}}/plugin/editor/src/wysiwyg-editor.css">

<div class="content-fluid" style="padding-top:20px;">
<div class="col-md-3">

<h3 class="text-left" style="color:#1E6397; font-weight:bold;">Categori</h3>

<ul class="list-unstyled list-category">
<li class="life"><a href="">My Life</a></li>
<li class="family"><a href="">My Family</a></li>
<li class="worklife"><a href="">My Work Life</a></li>
</ul>
<form class="form-horizontal">
<input type="text" name="search" style="background:#1E6397; display:block; width:100%; padding:10px 15px; border:0px; color:white;" placeholder="SEARCH">
</form>
<br>
<h4 style="font-weight:bold;">Popular Tag</h4>
<div class="col-md-12 padding-margin-o">
<a class="btn btn-primary btn-xs">plugin</a>
<a class="btn btn-primary btn-xs">wordpress</a>
<a class="btn btn-primary btn-xs">test</a>
<a class="btn btn-primary btn-xs">plugin</a>
<a class="btn btn-primary btn-xs">plugin</a>
<a class="btn btn-primary btn-xs">wordpress</a>
<a class="btn btn-primary btn-xs">test</a>
<a class="btn btn-primary btn-xs">plugin</a>
</div>

</div>

<!------------------------------------------------------------------>
<div class="col-md-9">

	<div class="col-md-12">
	@if(Session::has("success"))
		<h4 class="text-center alert-success">{{Session::get("success")}}</h4>
	@endif
  {{ HTML::ul($errors->all(),array("class"=>"alert-danger list-unstyled")) }}	
	{{Form::open(array('class' => 'form-horizontal', 'method' => 'put', 'action' => array('KomentarController@postReply',$id)))}}
	  <div class="panel panel-default"> 
	 <div class="panel-footer">Komentar : <span class="text-capitalize">{{$judul}}</span></div>
	  <div class="panel-body" style="font-size:12pt;">
	   <textarea class="form-control" name="komentar" id="editor1"></textarea>
	   <input type="hidden" value="{{$url}}" name="url"/>
	  </div>
	  <div class="panel-footer">
        <br>
	  </div>
	</div>
	<div class="col-md-12">
		 <script type="text/javascript">
			var RecaptchaOptions = {
				theme : 'clean',
				lang:'id',
				tabindex : 3
				};
		  </script> 
			<?php
            require_once(public_path().'\plugin\recaptchalib.php');
            $publickey = "6Le0SwITAAAAAAMSHMFUQLxbOz5VEijqqppjutUS";
            echo "<center>".recaptcha_get_html($publickey)."</center>";
            ?>
	</div>
	  <div class="col-md-12">

	<center><button class="btn btn-primary"><i class="fa fa-comment-o"></i> Post Reply</button></center>
	  </div>
	    {{Form::close()}}
	</div>

</div>

<style>
div.list-slide{
padding-top:20px;
padding-bottom:20px;
}
</style>



</div>

<script type="text/javascript"  language="javascript" src="{{URL::to("")}}/js/editor.js"></script>