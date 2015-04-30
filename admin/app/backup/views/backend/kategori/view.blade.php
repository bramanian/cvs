<br>
@if(isset($data))
<div class="btn-group"> 
<a href="{{URL::to("/admin/tips")}}" class="btn btn-primary"> <i class="fa fa-arrow-left"></i> Back</a>
<a href="{{URL::to("/admin/tips")}}/{{ base64_encode($data[0]->id."imammagribi")}}/delete" class="btn btn-danger"> <i class="fa  fa-trash-o"></i> Delete</a>
</div>

<h1 class="text-left"> {{$data[0]->nama}} </h1>
<ol class="breadcrumb">
  <li><a href="{{URL::to('admin/tips')}}"> &nbsp;Tips</a></li>
  <li>{{$data[0]->nama}}</li>
</ol>
@foreach($data as $value)

<table class="table table-hover">
<tr>
<td class="alert-warning">Sort Desc</td>
<td>{{HTML::decode($value->sortdesc)}}</td>
</tr>

<tr class="alert-success">
<td>Desc</td>
<td>{{HTML::decode($value->desc)}}</td>
</tr>



<tr class="alert-warning">
<td>Tanggal</td>
<td>{{$value->created_at}}</td>
</tr>

<tr class="alert-alert">
<td>Image</td>
<td><img src="{{$value->image}}" width="210" height="210"></td>
</tr>

<?php  break;?>
</table>
@endforeach
@endif
