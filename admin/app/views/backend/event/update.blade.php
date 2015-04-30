
<br>
<h1 class="text-left"> Menambahkan Event</h1>
<ol class="breadcrumb">
  <li><a href="{{URL::to('admin/event')}}"> &nbsp;Event</a></li>
  <li>Menambahkan Event</li>
</ol>
<br>
@if(isset($data))
<div class="btn-group"> 
<a href="{{URL::to("/admin/event")}}/{{ base64_encode($data[0]->id."imammagribi")}}/delete" class="btn btn-danger"> <i class="fa  fa-trash-o"></i> Delete</a>
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

@foreach($data as $value)
<form action="{{URL::to('/')."/admin/event/".base64_encode($value->id."imammagribi")."/update"}}"  method="POST">
<table class="table table-hover">
<tr class="alert-success">

<td>Judul</td>
<td><input type="text" class="form-control" name="nama" value="{{$value->nama}}"> </td>
</tr>
<tr class="alert-warning">
<td >Sort Desc</td>
<td><textarea name="sortdesc" class="form-control" row="10">{{$value->sortdesc}} </textarea></td>
</tr>

<tr class="alert-success">
<td>Desc</td>
<td><textarea id="editor2"  name="desc" col="5" row="10">{{$value->desc}}</textarea></td>
</tr>

<tr class="alert-alert">
<td>Image</td>
<td>
<div id="image" onclick="openKCFinder(this)"><div style="margin:5px">Klik Image</div></div>
<br>
<input type="text" id="urlImage" name="image" value="{{$value->image}}" >
</tr>
 <tr>
 <td>&nbsp;</td>
 <td > <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Simpan</button></td>
 </tr>
<?php  break;?>
</table>
</form>
@endforeach
@endif
		  <script>
     $(document).ready(function(){
	 $( '#editor1 ,#editor2' ).ckeditor();
     });     
</script>	  
