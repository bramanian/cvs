
<ul class="nav nav-tabs hidden" role="my" id="myTabs">
  <li role="presentation" class="active "><a href="#inbox" role="tab" data-toggle="tab">Inbox</a></li>
  <li role="presentation"><a href="#pesanTab" role="tab" data-toggle="tab" id="tabPesan">Pesan</a></li>
</ul>

<!-- Tab panes -->
<div class="tab-content">
  <div role="tabpanel" class="tab-pane active" id="inbox">
<!-- --------------------------------------------------------------------------------------------------------------------------- -->
<h1 class="btn-block">Pesan Masuk</h1>
          <div class="container-fluid">
		  <!--
              <form class=" form-inline" action="{{ URL::to('/')}}/admin/pesan/mencari" id="formSearchMessage" method="post">
                  <div class="input-group" style="float:right; width:320px;margin:10px 0px;">  
                  <span class="input-group-addon" style="cursor:pointer;" onclick="$('#formSearchMessage').submit();"><i class="fa fa-search fa-fw"></i></span>
                  <input class="form-control" style="width:200px; " name="keywords" type="text" placeholder="Suject / Date">
                  <input  type="submit" value="Search" class="btn btn-group btn-primary">                 
                   </div>                 
          </form>
		  -->
          </div>
          <div  style=" margin-right:20px; margin-bottom:25px; display: inline-block; width:100%;" class="" >
		   <div style="float:left" class="input-group">
              <a  class="btn btn-danger btn-group" onclick="onClickformDeleteMessage()"><i class="fa fa-trash-o"></i>&nbsp;Delete</a>
			  <a  class="btn btn-primary btn-group" onclick="javascript:location.href=rootDirectory+'/admin/pesan'"><span class="fa fa-refresh"></span></a>
            </div>             
			 <a class="message-read"   href="{{ URL::to('/')}}/admin/pesan/baca">read</a> 
              <a class="message-noread" href="{{ URL::to('/')}}/admin/pesan/belumbaca">noread</a>
          </div>
		 
		  @if($message=Session::get('message'))
		  <h4 class=" btn-success control-block text-center" style="padding:10px 0px">{{$message}}</h4>
		  @elseif($message=Session::get('warning'))
		  <h4 class=" btn-warning control-block text-center" style="padding:10px 0px">{{$message}}</h4>
		  @endif
		  <form class="form-inline" id="formDeleteMessage">
          <table class="table table-striped table-bordered" id="tabelPesan" width="100%" cellspacing="0" >
              
			  <thead>
                            <tr>
                              <td><input type="checkbox" onclick="onClickCheckedAllMessage(this)" data-value="false" ></td>
                              <td><i class="fa fa-users"></i>&nbsp Subject</td>
                              <td><i class="fa fa-envelope"></i> &nbsp;Pesan</td>
                              <td><i class="fa fa-calendar"></i>&nbsp;Tanggal</td>
							  <td><i class="fa "></i>&nbsp;&nbsp;&nbsp;&nbsp;</td>
                            </tr>
			  </thead>
			  <tbody>
             <?php
             if(isset($data))
             {

               foreach($data as $value){
                     if($value->status=='0'){
                     echo '<tr class="danger">';
                     echo '<td><input type="checkbox"  name="post[]" value="'.base64_encode($value->id."imammagribi").'"></td>';  
                     echo '   <td onclick="onClickTableMessage(this)" data-id="'.base64_encode($value->id."imammagribi").'" data-nama="'.$value->nama.'">'.$value->nama.'</td>';
                     echo '   <td onclick="onClickTableMessage(this)" data-id="'.base64_encode($value->id."imammagribi").'" data-nama="'.$value->nama.'">'.$value->email.'; '.substr($value->pesan,0,50).'...'.'</td>';
                     echo '   <td onclick="onClickTableMessage(this)" data-id="'.base64_encode($value->id."imammagribi").'" data-nama="'.$value->nama.'">'.$value->created_at.'</td>';                                        
                     echo '   <td onclick="onClickTableMessage(this)" data-id="'.base64_encode($value->id."imammagribi").'" data-nama="'.$value->nama.'"><i class="fa fa-search"></i></td>';                                        
					 echo '</tr>';                          
                    }else{
                     echo '<tr class="success" >';
                     echo '<td><input type="checkbox"  name="post[]" value="'.base64_encode($value->id."imammagribi").'"></td>';  
                     echo '   <td onclick="onClickTableMessage(this)" data-id="'.base64_encode($value->id."imammagribi").'" data-nama="'.$value->nama.'">'.$value->nama.'</td>';
                     echo '   <td onclick="onClickTableMessage(this)" data-id="'.base64_encode($value->id."imammagribi").'" data-nama="'.$value->nama.'">'.$value->email.'; '.substr($value->pesan,0,50).'...'.'</td>';
                     echo '   <td onclick="onClickTableMessage(this)" data-id="'.base64_encode($value->id."imammagribi").'" data-nama="'.$value->nama.'">'.$value->created_at.'</td>';
					 echo '   <td onclick="onClickTableMessage(this)" data-id="'.base64_encode($value->id."imammagribi").'" data-nama="'.$value->nama.'"><i class="fa fa-search"></i></td>';
                     echo '</tr>'; 
                     }
                 }
              // echo "<tr><td  colspan='4'><div style='float:right;'>".$data->links()."</div></td></tr>";     
             }
             
             ?>
			 </tbody>
             
          </table>   
		   </form>
<!-- --------------------------------------------------------------------------------------------------------------------------- -->  
  </div>
  <div role="pesanTab" class="tab-pane" id="pesanTab">
  <!-- --------------------------------------------------------------------------------------------------------------------------- -->  
            <div class="container-fluid">
              <br>
              <div class="container-fluid" style="margin:0px 10px;">
                <div class="btn-group">      
                    <a class="btn btn-default" id="firstdeletePesan" onclick="onClickDeteleMessage(this)"  data-id=""><i class="fa fa-trash-o"></i> Delete</a>
                </div>
              </div>

                 <div class="container-fluid containerPesan" >
					 <p class="subject"><i class="fa fa-user"></i><span id="nama">&nbsp;</span></p>;
					 <p class="email"><i class="fa fa-envelope"></i><span id="email">&nbsp;</span></p>;
					 <p class="phone"><i class="fa fa-phone"></i><span id="kontak">&nbsp;</span></p>;
					 <div class="container-fluid containerPesanContent" id="pesan">&nbsp;</div>
                 </div>             
          </div>
     <!-- --------------------------------------------------------------------------------------------------------------------------- -->                   
  </div>

</div>
<!-- end tabbedpanel-->        
		  <script>
     $(document).ready(function(){
	 $('#tabelPesan').dataTable();
     var input = $("<input>")
               .attr("type", "hidden")
               .attr("name", "action").val("search");
                $('#formSearchMessage').append($(input));
     
     });     
</script>
		  		  
 