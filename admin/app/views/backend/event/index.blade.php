
      <div id="page-wrapper" >
          <h1 class="menu-title btn-block ">Event</h1>
          <br>
    <div class="container-fluid" >
        <a class="btn btn-primary" href="{{URL::to('admin/event/create')}}" style="float:right; margin:10px"><i class="fa fa-list"></i>&nbsp;Insert</a>
        <a class="btn btn-danger " id="linkDelete"  onClick="deleteAllManage('event')" style="float:right;margin:10px"><i class="fa fa-trash-o"></i>&nbsp; Delete</a>
    </div>
	@if($message=Session::get("message"))
	<h4 class=" text-center alert-success">{{$message}}</h4>
	@endif
	
	@if($warning=Session::get("warning"))
	<h4 class=" text-center alert-warning">{{$warning}}</h4>
	@endif
  <form class="form-inline" id="formmanager" method="POST" action="">
  <table class="table table-striped table-bordered" id="data-table" width="100%" cellspacing="0">
      
          <input type="hidden" class="hidden" value="delete" name="action">
                    <thead>                           
						   <tr>
                              <td><input type="checkbox" onclick="onClickCheckedAll(this)" data-value="false" ></td>
                              <td><i ></i>&nbsp No</td>
                              <td><i ></i> &nbsp;Judul</td>
							  <td><i  ></i>&nbsp;Images</td>
                              <td><i ></i> &nbsp;Sort Desc</td>
							  <td><i ></i> &nbsp;Desc</td>
							  <td><i></i> &nbsp; Action</td>
                            </tr>
			        </thead>
					<tbody id="content-data">					 
             @if(isset($data))
              <?php $n=1; ?>
               @foreach($data as $value)
                @if($n%2==0)					 
                     <tr class="danger" >
                     <td><input type="checkbox"  name="post[]" value="{{base64_encode($value->id.'imammagribi')}}"></td>  
                        <td> {{$n}}</td>
                        <td>{{$value->nama}} </td>
                        <td><img src="{{$value->image}}" width="50" height="50"></td> 
					     <td style="max-width:180px;">{{substr($value->sortdesc,0,144)}} ...</td> 
                        <td style="max-width:180px;">{{substr($value->desc,0,144)}} ...</td>    
                        <td style="min-width:100px;"> 
						<a class=" btn btn-primary" href="{{URL::to("/admin/event/".base64_encode($value->id."imammagribi"))}}"><i class="fa fa-search"></i></a>
						<a class=" btn btn-warning" href="{{URL::to("/admin/event/".base64_encode($value->id."imammagribi"))}}/edit"><i class="fa fa-edit"></i></a>
						<a class=" btn btn-danger" href="{{URL::to("/admin/event/".base64_encode($value->id."imammagribi"))}}/delete"><i class="fa fa-trash-o"></i></a>
						</td>
                     </tr>                          
                    @else
                     <tr class="success" >
                     <td><input type="checkbox"  name="post[]" value="{{base64_encode($value->id.'imammagribi')}}"></td>  
                        <td> {{ $n}}</td>
                        <td>{{$value->nama}} </td>
                        <td><img src="{{$value->image}}" width="50" height="50"></td> 
					     <td style="max-width:180px;">{{substr($value->sortdesc,0,144)}} ...</td> 
                        <td style="max-width:180px;">{{substr($value->desc,0,144)}} ...</td>
						<td  style="min-width:100px;"> 
						<a class=" btn btn-primary" href="{{URL::to("/admin/event/".base64_encode($value->id."imammagribi"))}}"><i class="fa fa-search"></i></a>
						<a class=" btn btn-warning" href="{{URL::to("/admin/event/".base64_encode($value->id."imammagribi"))}}/edit"><i class="fa fa-edit"></i></a>
						<a class=" btn btn-danger" href="{{URL::to("/admin/event/".base64_encode($value->id."imammagribi"))}}/delete"><i class="fa fa-trash-o"></i></a>
						</td>
                     </tr> 
                   @endif
                   <?php $n++; ?>
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
  
