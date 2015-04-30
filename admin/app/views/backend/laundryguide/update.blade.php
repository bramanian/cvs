
<br>
<h1 class="text-left"> Memperbarui Laundry Guide</h1>
<ol class="breadcrumb">
  <li><a href="{{URL::to('/panel/laundryguide')}}"> &nbsp;Laundry Guide</a></li>
  <li>Memperbarui Laundry Guide</li>
</ol>
<br>
@if(isset($tips))




<form action="{{URL::to('/')}}/panel/laundryguide/{{$tips->id}}/update"}}"  method="POST">
<table class="table table-hover">
	<tr class="alert-success">
		<td>Judul</td>
		<td>
		<div class="col-md-5 padding-margin-o">
		<input type="text" class="form-control" name="judul" value="{{$tips->judul}}" placeholder="Judul">
               		</div> 
		<div class="col-md-7">
		
		<div class="col-md-3">Kategori</div> 
		<div class="col-md-9">
			<select  name="kategori" class="form-control">
					@foreach($kategoris as $kategori)
				       @if($kategori->id==$tips->id_kategori)
					   <option value="{{$kategori->id}}" selected>{{$kategori->nama}}</option>
				       @else
					   <option value="{{$kategori->id}}">{{$kategori->nama}}</option>						   
				       @endif	
					   @endforeach
			</select>
		</div>
		</div>						
				
		</td>
	</tr>
	<tr class="alert-warning">
		<td >Deskripsi</td>
		<td>
		<div class="col-md-5 padding-margin-o">
		<textarea class="form-control" name="desc"  row="10" placeholder="Deskripsi Tips">{{$tips->desc}}</textarea>
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
		<td><textarea id="editor2"  name="isi" col="5" row="10" placeholder="Isi Tips">{{HTML::decode($tips->isi)}}</textarea></td>
	</tr>

<tr class="alert-alert">
	<td>Image</td>
	<td>
		<div class="col-xs-12" id="prosesFile"><span class="fa fa-spinner fa-spin"></span></div>
		<div class="col-xs-12" >
			<div  id="file" data-file="tips" class="col-md-4">
				<img data-src="holder.js/200x200/#4466FF:#fff/text:200px x 200px" src="{{URL::to("/")."/".$tips->photo}}" id="upload" style="width:200px; height:200px;" class="thumbnail">
				<input type="hidden" class="form-control" id="filePhoto" name="filePhoto" value="{{$tips->photo}}">                           
				
				   <button type="button" class="btn btn-success" id="file"  data-file="tips" style="margin-left:60px;">Browse</button>
				
			 </div>
		</div>
		<style>
		#prosesFile{
		display:none;
		}

		</style>
	</td>
</tr>
 <tr>
 <td>&nbsp;</td>
 <td > <br> <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Simpan</button></td>
 </tr>
</table>
</form>


@endif
		  <script>
     $(document).ready(function(){
	 $( '#editor1 ,#editor2' ).ckeditor();
     });     
</script>	  
@include('backend.modal.image')