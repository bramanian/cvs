          <div class="container-fluid">
              <br>
              <div class="container-fluid" style="margin:0px 10px;">
                <div class="btn-group"> 
                    <a class="btn btn-default " href="<?php echo URL::to('/admin/message?action=search');?>"><i class="fa fa-backward"></i> back</a> 
                    <a class="btn btn-default" onclick="onClickDeteleMessage(this)" data-id="<?php echo $data->message_id; ?>"><i class="fa fa-trash-o"></i> Delete</a>
                </div>
              </div>
              <?php
              
              if(isset($data)){
                 echo '<div class="container-fluid containerPesan" >';
                 echo ' <p class="subject"><i class="fa fa-user"></i>&nbsp'.$data->message_name.'</p>';
                 echo '<p class="email"><i class="fa fa-envelope"></i>&nbsp'.$data->message_email.'</p>';
                 echo '<p class="phone"><i class="fa fa-phone"></i>&nbsp'.$data->message_contactno. '</p>';
                 echo '<div class="container-fluid containerPesanContent" >';
                 echo $data->message_yourmessage;
                 echo '</div>';
                 echo '</div>'; 
                  
               }
              ?>

              
              
          </div>
              
