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


<form class="form form-horizontal" action="{{URL::to("/home/thread")}}" method="POST">
<div class="col-md-8">

	<div class="form-group">
	  <label class="col-md-2 control-label">Judul</label>
      <div class="col-md-10">
	     <input type="text" class="form-control" name="judul" value="{{Input::old("judul")}}" placeholder="judul">
	  </div>
	</div>
	<div class="form-group">
	<label class="col-md-2 control-label">Isi thread</label>
	<div class="col-md-10">
	      <textarea class="form-control" rows="10" placeholder="Isi thread" name="isi">{{Input::old("isi")}}</textarea>
	  </div>	  
	</div>
	<div class="form-group">
		<label class="col-md-2 control-label">Kategori</label>
		<div class="col-md-10">
		  <select  class="form-control" name="kategori">
		  @if(isset($kategoris))
		     @foreach($kategoris as  $kategori)
		        <option value="{{$kategori->id}}">{{$kategori->nama}}</option>
              @endforeach
		  @endif
		  
		  </select>
		</div>
	</div>	
</div>
	<div class="col-md-4"> 
	<div class="col-md-12">
	<div class="col-xs-12" id="prosesFile"><span class="fa fa-spinner fa-spin"></span></div>
	 <div class="col-md-12">
		<center><img data-src="holder.js/150x150/#4466FF:#fff/text:150px x 150px" src="#" id="upload" style="width:150px; height:150px; margin-bottom:5px;" class="thumbnail"> </center>
		<input type="hidden" class="form-control" id="filePhoto" name="filePhoto" value=""> 
		<center><button class="btn btn-primary " type="button" id="file"  data-file="artikel" style="padding:7px 35px; margin-top:0px;">Browse</button></center>
	</div>
	</div>
	<div class="col-md-12" style="padding-top:20px;">
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
				<button class="btn btn-primary" onClick="selectTag()"  type="button">Add</button>
			  </span>
			</div><!-- /input-group -->
		</div>
		<div class="col-md-12 " style="margin:0px; margin-bottom:5px;">
		<div class="panel panel-primary">
		  <div class="panel-heading text-center">Tag</div>
		  <div class="panel-body" >
			<ul style="list-unstyled list-inline" style="margin:0px; padding-left:5px; padding-right:5px;" id="list-tag">
			</ul>
		  </div>
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
</script>