 <link rel="stylesheet" href="//code.jquery.com/ui/1.11.3/themes/smoothness/jquery-ui.css">
<script src="//code.jquery.com/ui/1.11.3/jquery-ui.js"></script>
<form class="form-horizontal" action="{{URL::to('/home/update')}}" method="POST">
<div class="form-group">
    <label class ="control-label col-sm-2">Nama <red>*</red></label> 
    <div class="col-sm-6">
       <input type="text" name="nama" placeholder="Nama" value="{{$profile->nama}}" class="form-control">
   </div>
</div>
<?php 

$datatahun=substr($profile->tgl_lahir,0,4);
$databulan=substr($profile->tgl_lahir,5,2);
$datatanggal=substr($profile->tgl_lahir,8,2);
?>

<div class="form-group">
    <label class ="control-label col-sm-2">Tanggal Lahir <red>*</red></label> 
    <div class="col-sm-6">
	<div class="col-sm-4">      
        <select name="tanggal" class="form-control">
		<option value="">-Tanggal-</option>
		<?php for($tanggal=1;$tanggal<=31;$tanggal++) {?>
		  @if($tanggal==$tanggal)
		   <option value="{{$tanggal}}" selected>{{$tanggal}}</option>
	       @else
			   <option value="{{$tanggal}}">{{$tanggal}}</option>
	      @endif
		<?php } ?>
		</select>
			</div>
	    <div  class="col-sm-4"> 
        <select name="bulan" class="form-control">
		<option value="">-Bulan-</option>
		<?php for($bulan=1;$bulan<=12;$bulan++) {?>
		@if($databulan==$bulan)
		   <option value="{{$bulan}}" selected>{{HomeController::getMouth($bulan)}}</option>
	    @else	
		   <option value="{{$bulan}}">{{HomeController::getMouth($bulan)}}</option>
	    @endif
		
		<?php } ?>
		</select>	
        </div>
		<div  class="col-sm-4"> 
        <select name="tahun" class="form-control">
		<option value="">-Tahun-</option>
		<?php for($tahun=(int) (date("Y")-50);$tahun<=(date("Y")-10);$tahun++){ ?>
    @if($datatahun==$tahun)
		<option value="{{$tahun}}" selected>{{$tahun}}</option>
		@else
			<option value="{{$tahun}}">{{$tahun}}</option>
	 @endif
		  
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
	   @if($profile->jenis_kelamin == "l")
		<option value="l" selected>Laki-laki</option>
	    <option value="p" >Perempuan</option>	 
	    @else   
	      <option value="p" selected>Perempuan</option>	
          <option value="l">Laki-laki</option>	  
		 @endif  
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
       <textarea name="alamat" class="form-control" value="" placeholder="Alamat">{{$profile->alamat}}</textarea>
   </div>
</div>
<div class="form-group">
    <label class ="control-label col-sm-2">No Telepon </label> 
    <div class="col-sm-6">
       <input type="text" class="form-control" name="notelepon" placeholder="No Telepon" value="{{$profile->no_telepon}}">
   </div>
</div>
<div class="form-group">
    <label class ="control-label col-sm-2">Kode Pos</label> 
    <div class="col-sm-6">
       <input type="text" class="form-control" name="kodepos" placeholder="Kode Pos" value="{{$profile->kode_pos}}">
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