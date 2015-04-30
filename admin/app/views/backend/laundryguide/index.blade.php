<div id="page-wrapper" >
          <h1 class="menu-title btn-block ">Laundry Guide</h1>
          <br>
  <form class="form-inline" id="formmanager" method="POST" action="">
  <table class="table table-striped table-bordered" id="data-table" width="100%" cellspacing="0">
      
          <input type="hidden" class="hidden" value="delete" name="action">
                    <thead>                           
						   <tr>
                              <td><input type="checkbox" onclick="onClickCheckedAll(this)" data-value="false" ></td>
                              <td><i ></i>&nbsp No</td>
							  <td><i  ></i>&nbsp;Images</td>							  
                              <td><i ></i> &nbsp;Judul</td>
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
                        <td><input type="checkbox"  name="post[]" value="{{$value->id}}"></td>  
                        <td> {{$n}}</td>
                        <td><img src="{{URL::to($value->photo)}}" width="50" height="50"></td> 
						<td>{{$value->judul}} </td>
					    <td style="max-width:180px;">{{substr($value->desc,0,144)}} ...</td> 
                        <td style="min-width:100px;"> 
						<a class=" btn btn-warning" href="{{URL::to("panel/laundryguide/".$value->id)}}/edit"><i class="fa fa-edit"></i></a>
						<a class=" btn btn-danger" href="{{URL::to("/panel/laundryguide/".$value->id)}}/delete"><i class="fa fa-trash-o"></i></a>
						</td>
                     </tr>                          
                    @else
                     <tr class="success" >
						<td><input type="checkbox"  name="post[]" value="{{$value->id}}"></td>  
                        <td> {{$n}}</td>
                        <td><img src="{{URL::to($value->photo)}}" width="50" height="50"></td> 
						<td>{{$value->judul}} </td>
					    <td style="max-width:180px;">{{substr($value->desc,0,144)}} ...</td> 
                        <td style="min-width:100px;"> 
						<a class=" btn btn-warning" href="{{URL::to("/panel/laundryguide/".$value->id)}}/edit"><i class="fa fa-edit"></i></a>
						<a class=" btn btn-danger" href="{{URL::to("/panel/laundryguide/".$value->id)}}/delete"><i class="fa fa-trash-o"></i></a>
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
  
