<div id="page-wrapper" >
<div class="content-fluid">
<!-- 

ini bagian dari kategori

-->
	<ul class="list-unstyled list-inline  alert-success" id="pesanBerhasil">
	  
	</ul>
	<ul class="list-unstyled list-inline  alert-danger" id="pesanGagal">
	  
	</ul>
	<div class="col-md-6">
	<h1 class="text-center">Kategori</h1>
	
	<div class="col-md-12 "> 
		<div class="input-group form-tambah-kategori">
			  <input type="text" class="form-control" id="add-kategori" placeholder="Tambah Kategori">
			  <span class="input-group-btn">
				<button class="btn btn-primary"  onClick="tambahKategori()" type="button"><i class="fa fa-save"></i> Tambah</button> 
			  </span>
		</div>
	<div class="col-md-9">
		<div class="input-group form-update-kategori">
			  <input type="text" class="form-control" id="namaKategori" placeholder="Nama Kategori">
			  <input type="hidden" class="form-control" id="idKategori"  placeholder="ID Kategori">
			  <span class="input-group-btn">
				<button class="btn btn-primary"  onClick="updateKategori()" type="button"> <i class="fa fa-edit"></i>  Perbarui</button> 
				<button id="cancle" onClick="closeUpdateKategori()" class="btn btn-danger">x</button>
			  </span>
		</div>		
    </div>
	</div>
	<div class="col-md-12" style="padding-top:20px;">
		<ul class="list-unstyled list-inline list-kategori" id="list-kategori">
		@if(isset($datakategoris))
		@foreach($datakategoris as  $kategori)
		<li id="kategori-{{$kategori->id}}"> <div class="col-md-9 list-nama-kategori-{{$kategori->id}}"  >{{$kategori->nama}}</div>
							 <div class="col-md-3 text-center ">
							 <div class="btn-group">
							 <a class="btn color-white" data-id-kategori="{{$kategori->id}}" data-nama-kategori="{{$kategori->nama}}" onClick="openUpdateKategori(this)"><i class="fa fa-edit"></i></a>
							 <a class="btn color-white" data-id-kategori="{{$kategori->id}}" data-nama-kategori="{{$kategori->nama}}" onClick="deleteKategori(this)"><i class="fa fa-trash-o"></i></a>
							 </div>
					   </div>
		</li>
		@endforeach
		@endif
		</ul>
    </div>
	</div>


	
<style>
ul.list-kategori li{
	padding:5px 10px;
	font-size:16pt;
	color:white;
	overflow-x:hidden;
	width:100%;
	background:#C9302C;
  
}
.color-white{
color:white;
}
.form-update-kategori, .form-update-Tag{
display:none;
}
.form-update{
display:none;
}
ul.list-tag li{
	padding:5px 10px;
	font-size:16pt;
	color:white;
	overflow-x:hidden;
	width:100%;
	background:#C9302C;
  
}
.color-white{
color:white;
}
.form-update-tag{
display:none;
}
.form-update{
display:none;
}
</style>	

<script>
function closeUpdateKategori(){
	$("div.form-update-kategori").hide();
	$("div.form-tambah-kategori").show();
}
function openUpdateKategori($data){
var $id=$($data).attr("data-id-kategori");
var $nama=$($data).attr("data-nama-kategori");
	$("#idKategori").val($id);
	$("#namaKategori").val($nama);
	$("div.form-update-kategori").show();
	$("div.form-tambah-kategori").hide();
}
function updateKategori(){
var $id=$("#idKategori").val();
var $nama=$("#namaKategori").val();

$.ajax({
url:rootDirectory+"/panel/kategori/"+$id+"/edit",
type:"GET",
data:{id:$id,nama:$nama},
success:function(data){
var data=jQuery.parseJSON(data);
	if(data.success=="true"){
		$("#pesanBerhasil").html("");
		$("#pesanGagal").html("");
		$("#pesanBerhasil").append(data.nama);
		$("a[data-id-kategori='"+$id+"']").attr("data-nama-kategori",$nama);
         $(".list-nama-kategori-"+$id).html($nama);
	}else{
		$("#pesanBerhasil").html("");
		$("#pesanGagal").html("");
      $("#pesanGagal").append(data.nama);
	}

},
error:function(data,jqXHR){
  $("#pesanBerhasil").html("");
  $("#pesanGagal").html("");
  $("#pesanGagal").append("<li>"+$nama+" Gagal di Perbarui</li>");
}
});
}







function deleteKategori($data){
var $id=$($data).attr("data-id-kategori");
var $nama=$($data).attr("data-nama-kategori");
		 $.ajax({
		url:rootDirectory+"/panel/kategori/"+$id+"/delete",
		type:"GET",
		success:function(data){
		var data=jQuery.parseJSON(data);
			if(data.success=="true"){
				$("#kategori-"+$id).remove();
				$("#pesanBerhasil").html("");
				$("#pesanGagal").html("");
				$("#pesanBerhasil").append("<li>Kategori "+$nama+" Berhasil di Hapus </li>");

			}else{
			
				$("#pesanBerhasil").html("");
				$("#pesanGagal").html("");
				$("#pesanGagal").append("<li>Kategori "+$nama+" Gagal di Hapus </li>");
			 
			}
		},
		error:function(data,jqXHR){
				
				$("#pesanBerhasil").html("");
				$("#pesanGagal").html("");
				$("#pesanGagal").append("<li>Kategori "+$nama+" Gagal di Hapus </li>");
			 
		}
		}); 
}








function tambahKategori(){
var input=document.getElementById("add-kategori");
var ul=document.getElementById("list-kategori");
$.ajax({
     url:rootDirectory+"/panel/kategori",
	 type:"POST",
	 data:{namakategori:input.value},
		 success:function(data){

		 var data = jQuery.parseJSON(data);
		 if(data.status=="success")
		 {
		   var $text= '<div class="col-md-9 list-nama-kategori-'+data.id+'" >'+input.value+'</div>'+
							 '<div class="col-md-3 text-center ">'+
							 '<div class="btn-group">'+
							 '<a class="btn color-white" data-id-kategori="'+data.id+'" data-nama-kategori="'+data.nama+'"  onClick="openUpdateKategori(this)"><i class="fa fa-edit"></i></a>'+
							 '<a class="btn color-white"  data-id-kategori="'+data.id+'" data-nama-kategori="'+data.nama+'"  onClick="deleteKategori(this)"><i class="fa fa-trash-o"></i></a>'+
							 '</div>'+
					   '</div>';
		var li = document.createElement("LI");
			li.id="kategori-"+data.id;
			li.innerHTML=$text;
			document.getElementById("list-kategori").appendChild(li);
		}else{
		 alert("Gagal disimpan");
		}
	 },
	 error:function(data,jqXHR){
	   alert("gagal disimpan");
	 }
    });
}

	

</script>



<!-- 


ini bagian untuk tag


-->
<script>
function closeUpdateTag(){
	$("div.form-update-tag").hide();
	$("div.form-tambah-tag").show();
}
function openUpdateTag($data){

var $id=$($data).attr("data-id-tag");
var $nama=$($data).attr("data-nama-tag");
	$("#idTag").val($id);
	$("#namaTag").val($nama);
	$("div.form-update-tag").show();
	$("div.form-tambah-tag").hide();
}
function updateTag(){
var $id=$("#idTag").val();
var $nama=$("#namaTag").val();

$.ajax({
url:rootDirectory+"/panel/tag/"+$id+"/edit",
type:"GET",
data:{id:$id,nama:$nama},
success:function(data){
var data=jQuery.parseJSON(data);
	if(data.success=="true"){
		$("#pesanBerhasil").html("");
		$("#pesanGagal").html("");
		$("#pesanBerhasil").append(data.nama);
		$("a[data-id-tag='"+$id+"']").attr("data-nama-tag",$nama);
         $(".list-nama-tag-"+$id).html($nama);
	}else{
		$("#pesanBerhasil").html("");
		$("#pesanGagal").html("");
      $("#pesanGagal").append(data.nama);
	}

},
error:function(data,jqXHR){
  $("#pesanBerhasil").html("");
  $("#pesanGagal").html("");
  $("#pesanGagal").append("<li>"+$nama+" Gagal di Perbarui</li>");
}
});
}







function deleteTag($data){
var $id=$($data).attr("data-id-tag");
var $nama=$($data).attr("data-nama-tag");
		 $.ajax({
		url:rootDirectory+"/panel/tag/"+$id+"/delete",
		type:"get",
		success:function(data){
		var data=jQuery.parseJSON(data);
			if(data.success=="true"){
				$("#tag-"+$id).remove();
				$("#pesanBerhasil").html("");
				$("#pesanGagal").html("");
				$("#pesanBerhasil").append("<li>Tag "+$nama+" Berhasil di Hapus </li>");

			}else{
			
				$("#pesanBerhasil").html("");
				$("#pesanGagal").html("");
				$("#pesanGagal").append("<li>Tag "+$nama+" Gagal di Hapus </li>");
			 
			}
		},
		error:function(data,jqXHR){
				
				$("#pesanBerhasil").html("");
				$("#pesanGagal").html("");
				$("#pesanGagal").append("<li>Tag "+$nama+" Gagal di Hapus </li>");
			 
		}
		}); 
}








function tambahTag(){
var input=document.getElementById("add-tag");
var ul=document.getElementById("list-tag");
$.ajax({
     url:rootDirectory+"/panel/tag",
	 type:"POST",
	 data:{nama:input.value},
		 success:function(data){

		 var data = jQuery.parseJSON(data);
		 if(data.status=="success")
		 {
		   var $text= '<div class="col-md-9 list-nama-tag-'+data.id+'" >'+input.value+'</div>'+
							 '<div class="col-md-3 text-center ">'+
							 '<div class="btn-group">'+
							 '<a class="btn color-white" data-id-tag="'+data.id+'" data-nama-tag="'+data.nama+'"  onClick="openUpdateTag(this)"><i class="fa fa-edit"></i></a>'+
							 '<a class="btn color-white"  data-id-tag="'+data.id+'" data-nama-tag="'+data.nama+'"  onClick="deleteTag(this)"><i class="fa fa-trash-o"></i></a>'+
							 '</div>'+
					   '</div>';
		var li = document.createElement("LI");
			li.id="tag-"+data.id;
			li.innerHTML=$text;
			document.getElementById("list-tag").appendChild(li);
		}else{
		 alert("Gagal disimpan");
		}
	 },
	 error:function(data,jqXHR){
	   alert("gagal disimpan");
	 }
    });
}

	

</script>



<div class="col-md-6">
<h1 class="text-center">Tag</h1>
		<div class="col-md-12 "> 
			<div class="input-group form-tambah-tag">
				  <input type="text" class="form-control" id="add-tag" placeholder="Tambah Tag">
				  <span class="input-group-btn">
					<button class="btn btn-primary"  onClick="tambahTag()" type="button"><i class="fa fa-save"></i> Tambah</button> 
				  </span>
			</div>
		<div class="col-md-9">
			<div class="input-group form-update-tag">
				  <input type="text" class="form-control" id="namaTag" placeholder="Nama Tag">
				  <input type="hidden" class="form-control" id="idTag"  placeholder="ID Tag">
				  <span class="input-group-btn">
					<button class="btn btn-primary"  onClick="updateTag()" type="button"> <i class="fa fa-edit"></i>  Perbarui</button> 
					<button id="cancle" onClick="closeUpdateTag()" class="btn btn-danger">x</button>
				  </span>
			</div>		
		</div>
		</div>
		<div class="col-md-12" style="padding-top:20px;">
			<ul class="list-unstyled list-inline list-tag" id="list-tag">
			@if(isset($datatags))
			@foreach($datatags as  $tag)
			<li id="tag-{{$tag->id}}"> <div class="col-md-9 list-nama-tag-{{$tag->id}}"  >{{$tag->nama}}</div>
								 <div class="col-md-3 text-center ">
								 <div class="btn-group">
								 <a class="btn color-white" data-id-tag="{{$tag->id}}" data-nama-tag="{{$tag->nama}}" onClick="openUpdateTag(this)"><i class="fa fa-edit"></i></a>
								 <a class="btn color-white" data-id-tag="{{$tag->id}}" data-nama-tag="{{$tag->nama}}" onClick="deleteTag(this)"><i class="fa fa-trash-o"></i></a>
								 </div>
						   </div>
			</li>
			@endforeach
			@endif
			</ul>
		</div>
	</div>


</div> 
</div>  

