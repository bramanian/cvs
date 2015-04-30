 <link rel="stylesheet" href="//code.jquery.com/ui/1.11.3/themes/smoothness/jquery-ui.css">
<script src="//code.jquery.com/ui/1.11.3/jquery-ui.js"></script>
<form class="form-horizontal" action="{{URL::to('/home/profile/create')}}" method="POST">
<div class="form-group">
    <label class ="control-label col-sm-2">Nama</label> 
    <div class="col-sm-6">
       <input type="text" name="nama" placeholder="Nama" class="form-control">
   </div>
</div>

<div class="form-group">
    <label class ="control-label col-sm-2">Tanggal Lahir</label> 
    <div class="col-sm-6">
       <input type="text" id="tanggallahir" name="tanggallahir" placeholder="dd-mm-yyyy" class="form-control">
   </div>
</div>

<div class="form-group">
    <label class ="control-label col-sm-2">Jenis Kelamin</label> 
    <div class="col-sm-6">
	<select name="jeniskelamin" class="form-control">
	   <option>----Jenis Kelamin----</option>
       <option value="p">Perempuan</option>
	   <option value="l">Laki-laki</option>
	 </select>
   </div>
</div>
<div class="form-group">
    <label class ="control-label col-sm-2">Provinsi</label> 
    <div class="col-sm-6">
	<select name="provinsi" id="provinsi" class="form-control" onchange="onChangeKota()">
	   <option>----Provinsi----</option>
	   @foreach($provinsis as $provinsi)
	   <option value="{{$provinsi->id}}">{{$provinsi->name}}</option>
	   @endforeach
	 </select>
   </div>
</div>
<div class="form-group">
    <label class ="control-label col-sm-2">Kota</label> 
    <div class="col-sm-6">
	<select name="kota" class="form-control" id="kota" >
       <option>----Kota----</option>
	 </select>
   </div>
</div>
<div class="form-group">
    <label class ="control-label col-sm-2">Alamat</label> 
    <div class="col-sm-6">
       <textarea name="alamat" class="form-control" placeholder="Alamat"></textarea>
   </div>
</div>
<div class="form-group">
    <label class ="control-label col-sm-2">No Telepon</label> 
    <div class="col-sm-6">
       <input type="text" class="form-control" name="notelepon" placeholder="No Telepon">
   </div>
</div>
<div class="form-group">
	<div class="col-sm-6 col-sm-offset-2"> <center> <button class="btn btn-primary">Simpan</button></center></div>
</div>
</form>

<script>
function onChangeKota(){
var provinsi=document.getElementById("provinsi");
$idprovinsi=provinsi.options[provinsi.selectedIndex].value;

$.ajax({
    url: rootDirectory+"/kota",
    type: 'POST',
    data:{"id":$idprovinsi},
    success:function(results) {
	$("#kota").html("");
	$("#kota").append('<option>----Kota----</option>');
      var $data=jQuery.parseJSON(results);
	  var $size=$data.length;
	  for(var $n=0;$n<$size;$n++){
		  $("#kota").append('<option value="'+$data[$n].id+'">'+$data[$n].name+'</option>');
		  
	  }
    },error:function(jqXHR){
		alert("gagal");

	}
});

    	
}


$(function() {
$( "#tanggallahir" ).datepicker({
          changeMonth: true,
            changeYear: true,
	 dateFormat: "dd-mm-yy",
	 yearRange: "-100:-20"
	 });
});
</script>