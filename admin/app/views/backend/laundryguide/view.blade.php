<br>
@if(isset($data))
<div class="btn-group"> 
<a href="{{URL::to("/panel/tips")}}" class="btn btn-primary"> <i class="fa fa-arrow-left"></i> Back</a>
<a href="{{URL::to("/panel/tips")}}/{{$data->id}}/delete" class="btn btn-danger"> <i class="fa  fa-trash-o"></i> Delete</a>
</div>

<h1 class="text-left"> {{$data->nama}} </h1>
<ol class="breadcrumb">
  <li><a href="{{URL::to('/panel/tips')}}"> &nbsp;Tips</a></li>
  <li>{{$data->judul}}</li>
</ol>


<table class="table table-hover">
<tr>
<td class="alert-warning">Judul</td>
<td>{{HTML::decode($data->judul)}}</td>
</tr>

<tr class="alert-success">
<td>Desc</td>
<td>{{HTML::decode($data->desc)}}</td>
</tr>

<tr class="alert-success">
<td>Isi</td>
<td>{{HTML::decode($data->isi)}}</td>
</tr


<tr class="alert-warning">
<td>Tanggal</td>
<td>{{$data->created_at}}</td>
</tr>

<tr class="alert-alert">
<td>Image</td>
<td><img src="{{URL::to("")."/".$data->photo}}" width="210" height="210"></td>
</tr>

</table>

@endif
