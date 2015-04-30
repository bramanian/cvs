 <link rel="stylesheet" href="//code.jquery.com/ui/1.11.3/themes/smoothness/jquery-ui.css">
<script src="//code.jquery.com/ui/1.11.3/jquery-ui.js"></script>
<form class="form-horizontal" action="{{URL::to('/home/profile/create')}}" method="POST">
<div class="form-group">
    <label class ="control-label col-sm-2">Nama <red>*</red></label> 
    <div class="col-sm-6">
       <input type="text" name="nama" placeholder="Nama" value="" class="form-control">
   </div>
</div>

<div class="form-group">
    <label class ="control-label col-sm-2">Tanggal Lahir <red>*</red></label> 
    <div class="col-sm-6">
	<div class="col-sm-4">      
        <select name="tanggal" class="form-control">
		<option value="">-Tanggal-</option>
		<?php for($tanggal=1;$tanggal<=31;$tanggal++) {?>
		   <option value="{{$tanggal}}">{{$tanggal}}</option>
		<?php } ?>
		</select>
			</div>
	    <div  class="col-sm-4"> 
        <select name="bulan" class="form-control">
		<option value="">-Bulan-</option>
		<?php for($bulan=1;$bulan<=12;$bulan++) {?>
		   <option value="{{$bulan}}">{{HomeController::getMouth($bulan)}}</option>
		<?php } ?>
		</select>	
        </div>
		<div  class="col-sm-4"> 
        <select name="tahun" class="form-control">
		<option value="">-Tahun-</option>
		<?php for($tahun=(int) (date("Y")-50);$tahun<=(date("Y")-10);$tahun++){ ?>
		   <option value="{{$tahun}}">{{$tahun}}</option>
	<?php }?>
		</select>
       </div>		

   </div>
</div>

<div class="form-group">
    <label class ="control-label col-sm-2">Jenis Kelamin <red>*</red></label> 
    <div class="col-sm-6">
	<select name="jeniskelamin" class="form-control">
	   <option  value="">----Jenis Kelamin----</option>
       <option value="p">Perempuan</option>
	   <option value="l">Laki-laki</option>
	 </select>
   </div>
</div>
<div class="form-group">
    <label class ="control-label col-sm-2">Provinsi <red>*</red></label> 
    <div class="col-sm-6">
	<select name="provinsi" id="provinsi" class="form-control" onchange="onChangeKota()">
	   <option  value="">----Provinsi----</option>
	   @foreach($provinsis as $provinsi)
	   <option value="{{$provinsi->id}}">{{$provinsi->name}}</option>
	   @endforeach
	 </select>
   </div>
</div>
<div class="form-group">
    <label class ="control-label col-sm-2">Kota <red>*</red></label> 
    <div class="col-sm-6">
	<select name="kota" class="form-control" id="kota" >
       <option  value="">----Kota----</option>
	 </select>
   </div>
</div>
<div class="form-group">
    <label class ="control-label col-sm-2">Alamat <red>*</red></label> 
    <div class="col-sm-6"  value="">
       <textarea name="alamat" class="form-control" value="" placeholder="Alamat"></textarea>
   </div>
</div>
<div class="form-group">
    <label class ="control-label col-sm-2">No Telepon </label> 
    <div class="col-sm-6">
       <input type="text" class="form-control" name="notelepon" placeholder="No Telepon">
   </div>
</div>
<div class="form-group">
    <label class ="control-label col-sm-2">Kode Pos</label> 
    <div class="col-sm-6">
       <input type="text" class="form-control" name="kodepos" placeholder="Kode Pos">
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
	$("#kota").append('<option value="">----Kota----</option>');
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
</script>