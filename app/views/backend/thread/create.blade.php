<script src="//cdn.ckeditor.com/4.4.7/standard/ckeditor.js"></script>
<link href="//cdnjs.cloudflare.com/ajax/libs/select2/4.0.0/css/select2.min.css" rel="stylesheet" />
<script src="//cdnjs.cloudflare.com/ajax/libs/select2/4.0.0/js/select2.min.js"></script>

<form class="form form-horizontal" action="{{URL::to("/home/thread")}}" method="POST">
	<div class="col-md-12">
		<div class="form-group">
			<label class="col-md-2 control-label">Kategori</label>
			<div class="col-md-10">
				<select  class="form-control" name="kategori">
					@if(isset($kategoris))
					@foreach($kategoris as  $kategori)
					@if(Input::old("kategori")==$kategori)
					<option value="{{$kategori->id}}" selected>{{$kategori->nama}}</option>
					@else
					<option value="{{$kategori->id}}">{{$kategori->nama}}</option>
					@endif
					@endforeach
					@endif
				</select>
			</div>
		</div>
		<div class="form-group">
			<label class="col-md-2 control-label">Judul</label>
			<div class="col-md-10">
				<input type="text" class="form-control" name="judul" value="{{Input::old("judul")}}" placeholder="judul">
			</div>
		</div>
		<div class="form-group">
			<label class="col-md-2 control-label">Upload Photo</label>
			<div class="col-md-10">
				<img data-src="holder.js/150x150/#4466FF:#fff/text:Cover Thread" src="#" id="img-below-artikel" style="display:none; width:150px; height:150px; margin-bottom:5px;" class="thumbnail">
				<button class="btn btn-primary " type="button" id="file-artikel"  data-file="artikel">Upload Photo</button>
				<p><small> foto ditampikan pada bagian atas isi thread</small></p>
				<div class="col-md-12"><input type="hidden" id="foto-artikel" name="foto-artikel" value="{{Input::old("foto-artikel")}}"></div>
			</div>
		</div>
		<div class="form-group">
			<label class="col-md-2 control-label">Isi Thread</label>
			<div class="col-md-10">
                <div data-control="wysiwyg">
                    <textarea id="description" placeholder="Isi Thread" name="isi">{{Input::old("isi")}}</textarea>
                </div>
            </div>

            <script>
                CKEDITOR.replace('description', {
                    height: 400,
                    filebrowserBrowseUrl: '/elfinder/ckeditor4'
            //        filebrowserImageUploadUrl: '/upload/image'
                });
            </script>
		</div>
		<div class="form-group">
		    <label class="col-md-2 control-label">Tags</label>
        	<div class="col-md-10">
        		<style>
                    #tags{
                        width: 100% !important;
                    }
                </style>

                {{ Form::select('tag[]', $tags, null, ['id' => 'tags', 'multiple'=>'true']) }}

                <script type="text/javascript">
                    $(function(){
                        $('#tags').select2();
                    });
                </script>
        	</div>
		</div>
	</div>
	<div class="col-md-12">
        <div class="col-md-offset-2 col-md-8 text-center">
            <button type="submit" class="btn btn-primary" style="padding:7px 30px;"><i class="fa fa-save"></i> Simpan</button>
        </div>
	</div>
</form>
	<script>
			$("#file").click(function(){
				var	$folder=$("#file").attr("data-file");
			var btnUpload=$('#file');
			new AjaxUpload(btnUpload, {
				action: rootDirectory+'/home/file_photo',
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
				onComplete: function(file, response){
					$data=JSON.parse(response);
									$("#prosesFile").hide();
					if($data.status=="success")
					{
						$("#upload").attr("src",$data.url);
						$("#filePhoto").val($data.value);
	
				}else{
					alert('Gagal Upload File'+response);
					}
				
				}
			});
				});
	$("#file-artikel").click(function(){
				var	$folder=$("#file-artikel").attr("data-file");
			var btnUpload=$('#file-artikel');
			new AjaxUpload(btnUpload, {
				action: rootDirectory+'/home/file_photo',
				name: 'uploadfile',
				data:{tipe:$folder},
				type:'post',
				onSubmit: function(file, ext){
							$("#img-below-artikel").hide();
						if (! (ext && /^(jpg|png|jpeg|gif)$/.test(ext))){
						alert('Hanya JPG, PNG dan GIF File');
						return false;
					}
					
				},
				onComplete: function(file, response){
					$data=JSON.parse(response);
									$("#prosesFile").hide();
					if($data.status=="success")
					{
					
					$("#img-below-artikel").attr("src",$data.url);
					$("#img-below-artikel").show();
						$("#foto-artikel").val($data.value);
	
				}else{
					alert('Gagal Upload File'+response);
					}
				
				}
			});
								});
			
			$("#file-other").click(function(){
				var	$folder=$("#file-other").attr("data-file");
			var btnUpload=$('#file-other');
			new AjaxUpload(btnUpload, {
				action: rootDirectory+'/home/file_photo',
				name: 'uploadfile',
				data:{tipe:$folder},
				type:'post',
				onSubmit: function(file, ext){
							
						if (! (ext && /^(jpg|png|jpeg|gif)$/.test(ext))){
						alert('Hanya JPG, PNG dan GIF File');
						return false;
					}
					
				},
				onComplete: function(file, response){
					$data=JSON.parse(response);
							
					if($data.status=="success")
					{
					
						$("#photoupload").val($data.url);
	
				}else{
					alert('Gagal Upload File'+response);
					}
				
				}
			});
						});
	</script>