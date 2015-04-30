							<style>

							ul.message-action li,
							ul.mythread-action li{
							border-left:1px solid black;
							}
							ul.message-action li:first-child,
							ul.mythread-action li:first-child{
							border:0px;
							}							
							</style>
<div id="page-wrapper" >
<br><br>
  <form class="form-inline" id="formmanager" method="POST" action="">
  <table class="table table-striped table-bordered" id="data-table" width="100%" cellspacing="0">
          <input type="hidden" class="hidden" value="delete" name="action">
                    <thead>                           
						   <tr>
                              <td><input type="checkbox" onclick="onClickCheckedAll(this)" data-value="false" ></td>
                              <td><i></i> &nbsp; Title</td>
							  <td><i ></i> &nbsp; Author</td>
							  <td><i  ></i>&nbsp; Kategori</td>							  
                              <td><i ></i> &nbsp; Tag</td>
	                          <td><i ></i> &nbsp; Date</td>
                            </tr>

			        </thead>
					<tbody id="content-data">					 
                    @if(isset($artikels))
					@foreach($artikels as $artikel)
					<tr class="danger" >
						<td><input type="checkbox"  name="post[]" value="{{$artikel->id}}"></td>  
					   <td>
					    <span class="text-capitalize">{{$artikel->judul}}</span>
							   <div class="col-md-12">
								 <ul class="list-unstyled list-inline mythread-action">
								  <li> <a href="{{URL::to("/home/thread/$artikel->id/edit")}}" > <i class="fa fa-edit"></i>  Edit</a></li>
								  <li> <a href="{{URL::to("/home/thread/$artikel->id/delete")}}"> <i class="fa fa-trash"></i> Trash</a></li>
								 <li> <a href="{{URL::to('/thread')}}/{{UsersController::getDate($artikel->created_at)}}/{{$artikel->id}}/{{ArtikelController::getURL($artikel->judul)}}"> <i class="fa fa-eye"></i> View</a></li>
								 </ul>
							 </div>
					   </td>
                      
					   <td>{{$artikel->namauser}} </td> 
					   <td> {{$artikel->kategori}}</td>
					   <td>
						   @if(isset($taggings))
						     @foreach($taggings as $tagging)
						      <ul class="list-unstyled list-inline">
							  @if($tagging->id==$artikel->id)

						   
							   <li><a class="btn btn-xs btn-primary">{{$tagging->nama}}</a></li>
				
							  @endif
							     </ul>
							 @endforeach
						   @endif
						   
					   </td>
					   <td> {{ ArtikelController::setTahun($artikel->taggal)}}</td>					   
                     </tr> 
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
  
