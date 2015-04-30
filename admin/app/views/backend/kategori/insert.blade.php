<br>
<h1 class="text-left"> Menambahkan Tips</h1>
<ol class="breadcrumb">
  <li><a href="{{URL::to('/tips')}}"> Tips</a></li>
  <li>Menambahkan Tips</li>
</ol>
<br>
<form action="{{URL::to("/tips")}}"  method="POST">
<table class="table table-hover">
	<tr class="alert-success">
		<td>Judul</td>
				<td><input type="text" class="form-control" name="judul" value="" placeholder="Judul"> </td>
	</tr>
	<tr class="alert-warning">
		<td >Deskripsi</td>
		<td><textarea class="form-control" name="desc"  row="10" placeholder="Deskripsi Tips"></textarea></td>
	</tr>
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
		<style>
		#prosesFile{
		display:none;
		}

		</style>
	</td>
</tr>
 <tr>
 <td>&nbsp;</td>
 <td > <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Tambahkan</button></td>
 </tr>
</table>
</form>


<script>

     $(document).ready(function(){
	 $( '#editor1 ,#editor2' ).ckeditor();
     });     
</script>	  
@include('backend.modal.image')