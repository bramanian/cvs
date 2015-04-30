@if(isset($profile))
<div class="col-md-8">
	<br>
	
	<div class="table-responsive">
		<div class="col-xs-12 text-right"> <a href="{{URL::to('home/edit')}}" class="btn"><i class="fa fa-edit"></i> Edit</a></div>
		<table class="table ">
			<tr>
				<td style="border:0px;">username</td>
				<td style="border:0px;"> {{$profile->username}}</td>
			</tr>
			<tr>
				<td>nama</td>
				<td> {{$profile->nama}}</td>
			</tr>
			<tr>
				<td>email</td>
				<td> {{$profile->email}}</td>
			</tr>
			<tr>
				<td>Alamat</td>
				<td>{{$profile->alamat}}</td>
			</tr>
			<tr>
				<td>No Telepon</td>
				<td>{{$profile->no_telepon}}</td>
			</tr>
		</table>
	</div>
	<div class="col-xs-12">
		<a href="{{URL::to("home/leaderboard")}}">Leader Board >></a>
	</div>
</div>

<div class="col-md-4">
	<div class="col-xs-12" id="prosesFile"><span class="fa fa-spinner fa-spin"></span></div>
	<div class="col-xs-12" >
		<center>
		<img data-src="holder.js/150x150/#4466FF:#fff/text:150px X 150px" src="{{URL::to($profile->photo)}}" id="upload" style="width:200px; height:200px;" class="thumbnail">
		</center>
	</div>
	<button class="btn btn-primary form-control" id="fileprofile" data-file="profile">Upload</button>
</div>
@endif
<script>
		$("#fileprofile").click(function(){
			var	$folder=$("#fileprofile").attr("data-file");
		var btnUpload=$('#fileprofile');
		new AjaxUpload(btnUpload, {
			action: rootDirectory+'/home/file_photo/profile',
			name: 'uploadfile',
			data:{tipe:$folder},
			type:'post',
			onSubmit: function(file, ext){
						$("#prosesFile").show();
				if (! (ext && /^(jpg|png|jpeg|gif)$/.test(ext))){
							$("#prosesFile").hide();
					alert('Hanya JPG, PNG dan GIF File');
					return false;
				}
				
			},
			onComplete: function(file, response,data){
				
				$data=JSON.parse(response);
								$("#prosesFile").hide();
				if($data.status=="success")
				{
					$("#upload").attr("src",$data.url);

			}else{
				alert('Gagal Upload File'+response);
				}
			
			}
		});
		});
</script>