<script type="text/javascript"  language="javascript" src="{{URL::to("")}}/plugin/editor/src/wysiwyg.js"></script>
<script type="text/javascript" language="javascript" src="{{URL::to("")}}/plugin/editor/src/wysiwyg-editor.js"></script>
<link type="text/css"  rel="stylesheet" href="{{URL::to("/")}}/plugin/editor/src/wysiwyg-editor.css">

<div class="content-fluid" style="padding-top:0px;">


<!------------------------------------------------------------------>
<div class="col-md-12">
	@if(isset($komentar))
	<div class="col-md-12">
	  <div class="panel panel-default">
	   
	  <div class="panel-body" style="font-size:12pt;background:#EBEFF0">
	  {{$quote}}
	  </div>

	</div>
	</div>

	<div class="col-md-12">
	@if(Session::has("success"))
		<h4 class="text-center alert-success">{{Session::get("success")}}</h4>
	@endif
  
	{{Form::open(array('class' => 'form-horizontal', 'method' => 'put', 'action' => array('KomentarController@update',$komentar->id)))}}
	  <div class="panel panel-default"> 
	 
	  <div class="panel-body" style="font-size:12pt;">
	  <div>
	   <textarea style="display:none;" name="quote" >{{$quote}}</textarea>
	  </div>
	  <div class="col-md-12">
	   <textarea class="form-control" name="komentar" id="editor1">@if(isset(Input::old('komentar'))) {{Input::old('komentar')}} @else{{$isi}} @endif
	   </textarea>
	  </div>
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
            require_once(public_path().'/plugin/recaptchalib.php');
            $publickey = "6Le0SwITAAAAAAMSHMFUQLxbOz5VEijqqppjutUS";
            echo "<center>".recaptcha_get_html($publickey)."</center>";
            ?>
	</div>
	  <div class="col-md-12">

	<center><button class="btn btn-primary"><i class="fa fa-comment-o"></i> Quote Reply</button></center>
	  </div>
	    {{Form::close()}}
	</div>
	@endif
</div>

<style>
div.list-slide{
padding-top:20px;
padding-bottom:20px;
}
</style>



</div>

<script type="text/javascript"  language="javascript" src="{{URL::to("")}}/js/editor.js"></script>