<br>
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
<h1 class="text-left"> Menambahkan Tips</h1>
<ol class="breadcrumb">
  <li><a href="{{URL::to('/panel/tips')}}"> Tips</a></li>
  <li>Menambahkan Tips</li>
</ol>
<br>
<form action="{{URL::to("/panel/tips")}}"  method="POST">
<table class="table table-hover">
	<tr class="alert-success">
		<td>Judul</td>
		<td>
		<div class="col-md-5 padding-margin-o">
		<input type="text" class="form-control" name="judul" value="" placeholder="Judul">
		<p class="alert-danger"><small>Tidak Boleh Mengandung Simbol - / . </small></p>
               		</div> 
		<div class="col-md-7">
		
		<div class="col-md-3">Kategori</div> 
		<div class="col-md-9">
			<select  name="kategori" class="form-control">
			    @if(isset($kategoris))
					@foreach($kategoris as $kategori)
					   <option value="{{$kategori->id}}">{{$kategori->nama}}</option>
					@endforeach
				@endif
			</select>
		</div>
		</div>
		</td>
	</tr>
	<tr class="alert-warning">
		<td >Deskripsi</td>
		<td>
		<div class="col-md-5 padding-margin-o">
		<textarea class="form-control" name="desc"  row="10" placeholder="Deskripsi Tips"></textarea>
		</div>
		<div class="col-md-7 padding-margin-o">
			<div class="col-md-12">
		<div class="col-md-3">Tags </div>
	
			<div class="col-md-6">
			
			   <select name="data-tag" class="form-control" id="data-tag">
			   @if(isset($tags))
				 @foreach($tags as $tag)
				 <option value="{{$tag->id}}">{{$tag->nama}}</option>
				 @endforeach
			   @endif
			   </select>
			 </div>
			
			 <div class="col-md-3">
				<button type="button" class="btn btn-default" onClick="selectTag()" >Add</button>
			  </div>
			  </div>
			  <div class="col-md-12" style="margin-top:10px;">
			  	     <div class="col-md-offset-3 col-md-9 ">
				     <div class="panel panel-primary">
					   <div class="panel-heading">Tag</div>
					   <div class="panel-body">
						<ul style="list-unstyled list-inline" id="list-tag">
						</ul>
					  </div>
					</div>
			        </div>
			  </div>
			 </div> 
		</td>
	</tr>
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
</script>
	<tr class="alert-success">
		<td>Isi Tips</td>
		<td><textarea id="editor2"  name="isi" col="5" row="10" placeholder="Isi Tips"></textarea></td>
	</tr>

<tr class="alert-alert">
	<td>Image</td>
	<td>
		<div class="col-xs-12" id="prosesFile"><span class="fa fa-spinner fa-spin"></span></div>
		<div class="col-xs-12" >
			<div  id="file" data-file="tips" class="col-md-4">
				<img data-src="holder.js/200x200/#4466FF:#fff/text:200px x 200px" src="#" id="upload" style="width:100px; height:auto;" class="thumbnail">
				<input type="hidden" class="form-control" id="filePhoto" name="filePhoto" value="">                           
				   <button type="button" class="btn btn-success" id="file"  data-file="tips" style="margin-left:60px;">Browse</button>
			 </div>
		</div>
	</td>
</tr>
 <tr>
 <td>&nbsp;</td>
 <td > <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Tambahkan</button></td>
 </tr>
</table>
</form>
	<style>
			#prosesFile{
			display:none;
			}

	</style>
	<script>

		 $(document).ready(function(){
		 $( '#editor1 ,#editor2' ).ckeditor();
		 });     
	</script>	  
@include('backend.modal.image')