
<br>
<h1 class="text-left"> Menambahkan Tips</h1>
<ol class="breadcrumb">
  <li><a href="{{URL::to('admin/tips')}}"> &nbsp;Tips</a></li>
  <li>Menambahkan Tips</li>
</ol>
<br>
@if(isset($data))
<div class="btn-group"> 
<a href="{{URL::to("/admin/tips")}}/{{$data->id}}/delete" class="btn btn-danger"> <i class="fa  fa-trash-o"></i> Delete</a>
</div>
<br>
<br>
@if($message=Session::get("message"))
	<h4 class=" text-center alert-success">{{$message}}</h4>
	@endif
	
	@if($warning=Session::get("warning"))
	<h4 class=" text-center alert-warning">{{$warning}}</h4>
@endif

{{ HTML::ul($errors->all()) }}


<form action="{{URL::to('/')."/tips/".$value->id."/update"}}"  method="POST">
<table class="table table-hover">
<tr class="alert-success">

<td>Judul</td>
<td><input type="text" class="form-control" name="judul" value="{{$data->judul}}"> </td>
</tr>
<tr class="alert-warning">
<td >Deskripsi</td>
<td><textarea name="desc" class="form-control" row="10">{{$value->desc}} </textarea></td>
</tr>

<tr class="alert-success">
<td>Isi Tips</td>
<td><textarea id="editor2"  name="desc" col="5" row="10">{{$value->isi}}</textarea></td>
</tr>


<tr class="alert-alert">
	<td>Image</td>
	<td>
		<div class="col-xs-12" id="prosesFile"><span class="fa fa-spinner fa-spin"></span></div>
		<div class="col-xs-12" >
			<div  id="file" data-file="tips" class="col-md-4">
				<img data-src="holder.js/200x200/#4466FF:#fff/text:200px x 200px" src="{{URL::to("/").$data->image}}" id="upload" style="width:100px; height:auto;" class="thumbnail">
				<input type="hidden" class="form-control" id="filePhoto" name="filePhoto" value="">                           
				
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
 <td > <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Simpan</button></td>
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