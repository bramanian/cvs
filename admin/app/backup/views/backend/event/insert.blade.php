<br>
<h1 class="text-left"> Menambahkan Event</h1>
<ol class="breadcrumb">
  <li><a href="{{URL::to('admin/event')}}"> Event</a></li>
  <li>Menambahkan Event</li>
</ol>
<br>
<form action="{{URL::to("admin/event")}}"  method="POST">
<table class="table table-hover">
<tr class="alert-success">
<td>Judul</td>
<td><input type="text" class="form-control" name="nama" value="" placeholder="Judul"> </td>
</tr>
<tr class="alert-warning">
<td >Sort Desc</td>
<td><textarea class="form-control" name="sortdesc"  row="10" placeholder="sort deskripsi"></textarea></td>
</tr>

<tr class="alert-success">
<td>Desc</td>
<td><textarea id="editor2"  name="desc" col="5" row="10" placeholder="description"></textarea></td>
</tr>

<tr class="alert-alert">
<td>Image</td>

<td>
<div id="image" onclick="openKCFinder(this)"><div style="margin:5px">Klik Image</div></div>
<br>
<input type="text" id="urlImage" name="image" value="" placeholder="Image" >
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