<style>
.padding-margin-o{
padding:0px;
margin:0px;
}
.message-list{
padding-left:20px;
}
#list-tag li{margin:3px; border-radius:5px;}
</style>
<script type="text/javascript"  language="javascript" src="{{URL::to("")}}/plugin/editor/src/wysiwyg.js"></script>
<script type="text/javascript" language="javascript" src="{{URL::to("")}}/plugin/editor/src/wysiwyg-editor.js"></script>
<link type="text/css"  rel="stylesheet" href="{{URL::to("/")}}/plugin/editor/src/wysiwyg-editor.css">
<script type="text/javascript"  language="javascript" src="{{URL::to("")}}/js/editor.js"></script>

@if(isset($artikel))
<form class="form form-horizontal" action="{{URL::to("/home/thread/".$artikel->id."/update")}}" method="POST">
<div class="col-md-12">
	<div class="form-group">
		<label class="col-md-2 control-label">Kategori</label>
		<div class="col-md-10">
		  <select  class="form-control" name="kategori">
		  @if(isset($kategoris))
		     @foreach($kategoris as  $kategori)
			 @if($artikel->id_kategori==$kategori->id||$kategori->id==Input::old('kategori'))
			    <option value="{{$kategori->id}}"  selected >{{$kategori->nama}}</option>
			 @else
		        <option value="{{$kategori->id}}">{{$kategori->nama}}</option>
			  @endif
			  
              @endforeach
		  @endif
		  
		  </select>
		</div>
	</div>	
	
	
	<div class="form-group">
	  <label class="col-md-2 control-label">Judul</label>
      <div class="col-md-10">
	     <input type="text" class="form-control" name="judul" value="{{$artikel->judul}}" placeholder="judul">
	  </div>  
	</div>
	

	<div class="form-group">
	<label class="col-md-2 control-label">Upload Photo</label>
	<div class="col-md-10">
	<img data-src="holder.js/150x150/#4466FF:#fff/text:Cover Thread" src="#" id="img-below-artikel" style="display:none; width:150px; height:150px; margin-bottom:5px;" class="thumbnail">
	      <button class="btn btn-primary " type="button" id="file-artikel"  data-file="artikel">Upload Photo</button>
     		  
		  <p><small> foto ditampikan pada bagian atas isi thread</small></p>
		  <div class="col-md-12"><input type="hidden" id="foto-artikel" name="foto-artikel"></div>
             		  
	  </div>
	</div>	
	
	<div class="form-group">
	<label class="col-md-2 control-label">Isi Thread</label>
	<div class="col-md-10">
	      <textarea class="form-control" rows="10" id="editor1"  placeholder="Isi Thread" name="isi">@if(Input::old("isi")!=null) {{Input::old('isi')}} @else {{$artikel->isi}} @endif</textarea>
	  </div>	  
	</div>
	





</div>
	<div class="col-md-10 col-md-offset-2" style="padding-top:20px;">
		<div class="col-md-12" style="margin:0px; margin-bottom:5px;">
			<div class="input-group">
			 <select name="data-tag" class="form-control" id="data-tag">
				@if(isset($tags))
				    @foreach($tags as $tag)
				     <option value="{{$tag->id}}">{{$tag->nama}}</option>
					 @endforeach
				@endif
			  </select>
			  <span class="input-group-btn">
				<button class="btn btn-default" onClick="selectTag()"  type="button">Add</button>
			  </span>
			</div><!-- /input-group -->
		</div>
		<div class="col-md-12 " style="margin:0px; margin-bottom:5px;">
		<div class="panel panel-primary">
		  <div class="panel-heading text-center">Tag</div>
		  <div class="panel-body" >
			<ul style="list-unstyled list-inline" style="margin:0px; padding-left:5px; padding-right:5px;" id="list-tag">
			@if(isset($tagging))
			    @foreach($tagging as $dataTagging)
						<li class="btn btn-xs btn-primary" data-id-kategori="{{$dataTagging->id}}">
						  <button type="button" class="close" data-id-kategori="{{$dataTagging->id}}" onClick="deleteTagPanel(this)" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						  <span >{{$dataTagging->nama}}</span>
						  <input type="hidden" name="tag[]" value="{{$dataTagging->id}}">
						</li>						
				@endforeach
			@endif	
								
			</ul>
		  </div>
		</div>
		</div>
	</div>	
	<div class="col-md-8">
		<div class="col-md-offset-2 col-md-8 text-center">
			<button type="submit" class="btn btn-primary" style="padding:7px 30px;"><i class="fa fa-save"></i> Simpan</button>
		</div>
	</div>
</form>
@endif
<style>
#prosesFile{
display:none;
}
</style>
<script>
function selectTag(){
var $nama = $("#data-tag").find(':selected').html();
var $id=$('#data-tag').val();

var $str='<li class="btn btn-xs btn-primary" data-id-kategori="'+$id+'">'+
          '<button type="button" class="close" data-id-kategori="'+$id+'" onClick="deleteTagPanel(this)'+
		  '"aria-label="Close"><span aria-hidden="true">&times;</span></button>'+
		  '<span >'+$nama+'</span>'+
		  '<input type="hidden" name="tag[]" value="'+$id+'">'+
		'</li>';
$("#list-tag").append($str);							
}
function deleteTagPanel($data){
var $id=$($data).attr("data-id-kategori");
$("li[data-id-kategori='"+$id+"']").remove();
}
		$("#file").click(function(){
		var	$folder=$("#file").attr("data-file");
		var btnUpload=$('#file');
		new AjaxUpload(btnUpload, {
			action: rootDirectory+'/home/file_photo',
			name: 'uploadfile',
			data:{tipe:$folder},
			type:'post',
			onSubmit: function(file, ext){
						$("#prosesFile").show();
				 if (! (ext && /^(jpg|png|jpeg|gif)$/.test(ext))){ 
				 			$("#prosesFile").hide();
					alert('Hanya JPG, PNG dan GIF File');
					return false;
				}
				
			},
			onComplete: function(file, response){
				$data=JSON.parse(response);
				$("#prosesFile").hide();				
				if($data.status=="success")
				{
					$("#upload").attr("src",$data.url);
					$("#filePhoto").val($data.value);
 
			    }else{
				   alert('Gagal Upload File'+response);
				}
			 
			}
		});
		});	
$("#file-artikel").click(function(){
		var	$folder=$("#file-artikel").attr("data-file");
		var btnUpload=$('#file-artikel');
		new AjaxUpload(btnUpload, {
			action: rootDirectory+'/home/file_photo',
			name: 'uploadfile',
			data:{tipe:$folder},
			type:'post',
			onSubmit: function(file, ext){
					 $("#img-below-artikel").hide();	
				 if (! (ext && /^(jpg|png|jpeg|gif)$/.test(ext))){ 	
					alert('Hanya JPG, PNG dan GIF File');
					return false;
				}
				
			},
			onComplete: function(file, response){
				$data=JSON.parse(response);
				$("#prosesFile").hide();				
				if($data.status=="success")
				{
				  
				   $("#img-below-artikel").attr("src",$data.url);
				   $("#img-below-artikel").show();
					$("#foto-artikel").val($data.value);
 
			    }else{
				   alert('Gagal Upload File'+response);
				}
			 
			}
		});
		});					
		
		$("#file-other").click(function(){
		var	$folder=$("#file-other").attr("data-file");
		var btnUpload=$('#file-other');
		new AjaxUpload(btnUpload, {
			action: rootDirectory+'/home/file_photo',
			name: 'uploadfile',
			data:{tipe:$folder},
			type:'post',
			onSubmit: function(file, ext){
						
				 if (! (ext && /^(jpg|png|jpeg|gif)$/.test(ext))){ 	
					alert('Hanya JPG, PNG dan GIF File');
					return false;
				}
				
			},
			onComplete: function(file, response){
				$data=JSON.parse(response);
						
				if($data.status=="success")
				{
				  
					$("#photoupload").val($data.url);
 
			    }else{
				   alert('Gagal Upload File'+response);
				}
			 
			}
		});
		});			
</script>


