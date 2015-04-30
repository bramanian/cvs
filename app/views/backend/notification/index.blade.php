<div id="page-wrapper" >


  <form class="form-inline" id="formmanager" method="POST" action="">
  <table class="table table-striped table-bordered" id="data-table" width="100%" cellspacing="0">
      
          <input type="hidden" class="hidden" value="delete" name="action">
                    <thead>                           
						   <tr>
                              <td><input type="checkbox" onclick="onClickCheckedAll(this)" data-value="false" ></td>
                              <td><i></i> &nbsp; No</td>
							  <td><i ></i> &nbsp; Subject</td>
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
					@if(isset($notifications))
						@foreach($notifications as $notification)
							@if($notification->read_=="0")
								<tr class="danger" >
								<td><input type="checkbox"  name="post[]" value=""></td>  
								<td> </td>
								<td><div class="col-xs-12">{{$notification->from_}}</div>
								 <div class="col-md-12">
								 <ul class="list-unstyled list-inline message-action">
								  <li> <a href="{{URL::to('home/komentar/'.$notification->id.'/show')}}">View</a></li>
								 </ul>
								 </div>
								</td> 
								<td> 
								 <div class="col-md-12">
								 {{$notification->isi}}
								 </div>						

								</td>
								<td>{{UsersController::getDate($notification->created_at)}}</td>
							 </tr> 
							 @else
					             <tr  >
								<td><input type="checkbox"  name="post[]" value=""></td>  
								<td> </td>
								<td><div class="col-xs-12">{{$notification->from_}}</div>
								 <div class="col-md-12">
								 <ul class="list-unstyled list-inline message-action">

								  <li> <a href="{{URL::to('home/komentar/'.$notification->id.'/show')}}">View</a></li>
								 </ul>
								 </div>
								</td> 
								<td> 
								 <div class="col-md-12">
								 {{$notification->isi}}
								 </div>						

								</td>
								<td>{{UsersController::getDate($notification->created_at)}}</td>
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
  
