
<div class="modal fade" id="getModalShow1" role="dialog"  aria-hidden="true">
          <div class="modal-dialog modal-lg">
            <div class="modal-content">
              <div class="modal-header btn-warning">
               <button  type="button" class="close " data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                <h4 class="modal-title" >IMAGE</h4>
              </div>
              <div class="modal-body" style="width:100%;">
                <ul class="nav nav-tabs" role="tablist">
                  <li class="active"  onclick="galerryphotoselect1()"><a href="#imageSelect1" role="tab" data-toggle="tab">Select Image</a></li>
                  <li><a href="#uploadImage1" role="tab" data-toggle="tab">Upload Image</a></li>
                </ul>
                <div class="tab-content">
                  <div class="tab-pane active" id="imageSelect1"> 
                      <br>
                      <div class="row">
                          <div class="col-sm-12" id="galerry-photo-select1">
                       &nbsp;
                          </div>
                      </div>
                  </div>
                  <div class="tab-pane " id="uploadImage1">
                      <iframe class="col-md-12" style="height:350px; border:0px;" src="{{URL::to("/")}}/plugin/index.html" width="100%" height="100%"></iframe> 

                </div>                            
                  </div>
                </div>
              </div>
            </div>
          </div>		  
   <style>
                                div > img.imageGalery{
                                      width:125px; 
                                      height:125px; 
                                  }
									.modal-dialog {
									width:1024px;
									    height:90%;
										margin:auto;
									}								  							  
                                  div.canvas-image-Galery{
                                      float:left;
                                      margin:5px;
                                      padding:10px;
                                      display:block;
									  width:160px;
									  height:160px;
									  overflow:hidden;									  
                                      position: relative;
                                      border-radius:5px;
                                      -moz-border-radius:5px;
                                      -o-border-radius:5px;
                                      -webkit-border-radius:5px;
                                      box-shadow: 0px 0px 3px 0px rgba(50,50,50,0,46);
                                 -moz-box-shadow: 0px 0px 3px 0px rgba(50,50,50,0,46);
                              -webkit-box-shadow: 0px 0px 3px 0px rgba(50,50,50,0,46);
                                   -o-box-shadow: 0px 0px 3px 0px rgba(50,50,50,0,46);
                                  }
                                  .canvas-image-Galery-hidden{
                                      width:100%;
                                      height: 100%;
                                      background:#c3c3c3;
                                      opacity:0.65;
                                      position: absolute;
                                      top:0px;
                                      left: 0px;
                                      visibility: hidden;
                                      display:inline-block;
                                  }
                                  div.canvas-image-Galery > a{
                                      position: absolute;
                                      top:65px;
                                      left:35px;
                                      visibility: hidden;
                                      display:inline-block;
                                      
                                  }
                                  div.canvas-image-Galery:hover > a{
                                      visibility:visible;
                                    
                                  }
                                  div.canvas-image-Galery:hover > div.canvas-image-Galery-hidden{
                                      visibility: visible;
                                      text-align: center;
                                  }
            h1.menu-title{
                background:#F5F8F8;
                padding:5px 10px;
                border-left:5px #39b3d7 solid;
                
            }
			.modal-content{
			min-height:500px;
			}
  </style>   
    <!-- JavaScript -->
    <script>
       function setImageTo(url){
           $("input[name='Image']").attr("value",url);
           $("input[name='urlImage']").attr("value",url);
           $('#getModalShow').modal('hide');
       }
       function setImageTo2(url){
           $("input[name='Preview']").attr("value",url);
           $("input[name='urlPreview']").attr("value",url);
           $('#getModalShow1').modal('hide');
       }	   
       function galerryphotoselect(){
         $.ajax({
             url: rootDirectory+"/admin/selected/image/gallery",
            type: 'POST',
            success: function (data, textStatus, jqXHR) {
                        $("#galerry-photo-select").html(data);
                    },
            error: function (jqXHR, textStatus, errorThrown) {
                        $("#galerry-photo-select").html("gagal");
                        
                    }
         });
       }	
	          function galerryphotoselect1(){
         $.ajax({
             url: rootDirectory+"/admin/selected/image/gallery",
            type: 'POST',
            success: function (data, textStatus, jqXHR) {
                        $("#galerry-photo-select1").html(data);
                    },
            error: function (jqXHR, textStatus, errorThrown) {
                        $("#galerry-photo-select1").html("gagal");
                        
                    }
         });
       }	
    </script>	