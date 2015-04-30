<div id="page-wrapper" >
@if(Session::has("status"))
   @if(Session::get("status")=="success")	
         <h4 class="text-center alert-success">{{Session::get("message")}}</h4>	   
   @else
	   <h4 class="text-center alert-danger">{{Session::get("message")}}</h4>
   @endif

@endif

  <form class="form-inline" id="formmanager" method="POST" action="">
  <table class="table table-striped table-bordered" id="data-table" width="100%" cellspacing="0">
      
          <input type="hidden" class="hidden" value="delete" name="action">
                    <thead>                           
						   <tr>
                              
                              <td><i></i> &nbsp; No</td>
							  <td><i ></i> &nbsp; Thread</td>
							  <td><i  ></i>&nbsp;Komentar</td>							  
                              <td><i ></i> &nbsp;Tanggal</td>
	
                            </tr>
							<style>

							ul.message-action li{
							border-left:1px solid black;
							}
							ul.message-action li:first-child{
							border:0px;
							}							
							</style>
			        </thead>
					<tbody id="content-data">			
 <?php 
 $n=0;
 ?>					
					@if(isset($komentars))
						@foreach($komentars as $komentar)
					<?php $n++; ?>
							@if($komentar->read_=="0")
								<tr class="danger" >
								<td>{{$n}}</td>  
								<td> {{$komentar->judul}}</td>
								<td><div class="col-xs-12">{{KomentarController::cekQuote($komentar->isi)}}</div>
								 <div class="col-md-12">
								 <ul class="list-unstyled list-inline message-action">
								  <li> <a href="{{URL::to('home/komentar/'.$komentar->id.'/'.$komentar->id_tulisan.'/edit')}}">Edit</a></li>
								  <li> <a href="{{URL::to('home/komentar/'.$komentar->id.'/'.$komentar->id_tulisan.'/delete')}}">Trash</a></li>
								  <li> <a href="{{URL::to('home/komentar/'.$komentar->id.'/'.$komentar->id_tulisan.'/show')}}">View</a></li>
								 </ul>
								 </div>
								</td> 
								<td> 
								 {{$komentar->created_at}}
								</td>
								
							 </tr> 
							 @else
					             <tr  >
								<td>{{$n}}</td>  
								<td> {{$komentar->judul}}</td>
								<td><div class="col-xs-12">{{KomentarController::cekQuote($komentar->isi)}}</div>
								 <div class="col-md-12">
								 <ul class="list-unstyled list-inline message-action">
								  <li> <a href="{{URL::to('home/komentar/'.$komentar->id.'/'.$komentar->id_tulisan.'/edit')}}">Edit</a></li>
								  <li> <a href="{{URL::to('home/komentar/'.$komentar->id.'/'.$komentar->id_tulisan.'/delete')}}">Trash</a></li>
								  <li> <a href="{{URL::to('home/komentar/'.$komentar->id.'/'.$komentar->id_tulisan.'/show')}}">View</a></li>
								 </ul>
								 </div>
								</td> 
								<td> 
								 {{$komentar->created_at}}
								</td>
								
							 </tr> 
							@endif	
							
							 @endforeach
					 @endif
					</tbody>                                                 
        </table>
         </form>		
      </div>
		  <script>
     $(document).ready(function(){
	 $('#data-table').dataTable();
     });     
</script>	  
  
