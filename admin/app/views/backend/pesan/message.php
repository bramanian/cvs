<?php 
echo View::make("admin.meta");

?>
    <link rel="stylesheet" href="<?php echo URL::to('css/bootstrap.min.css');?>">
        <link rel="stylesheet" href="<?php echo URL::to('css/admin.css');?>">
      <link rel="stylesheet" href="<?php echo URL::to('plugins/flexslider.css');?>">
      <link rel="stylesheet" href="<?php echo URL::to('font-awesome/css/font-awesome.min.css');?>">
      <link rel="stylesheet" href="<?php echo URL::to('css/tenya.css');?>">
     <script src="<?php echo URL::to('js/jquery.min.js');?>"></script>    
  </head>

  <body style="background:#ffffff url(<?php echo URL::to('/img/bg_1.png');?>);">
    <div id="wrapper">
        <?php
            echo View::make('admin.menu');
         ?>
      <div id="page-wrapper" >       
          <div class="container-fluid" id="body-page-wrapper">
            <?php 
            echo $inbox;
            ?>
          </div>
              
      </div><!-- /#page-wrapper -->

    </div><!-- /#wrapper -->
    <!-- JavaScript -->
   <script>
       function onClickTableMessage(data){
           
 var id=$(data).attr("data-id");
        $.ajax({
             url:"<?php echo URL::to('/admin/message/inbox/readMessage');?>",
             type: 'POST',
             data:{"id":id},
             beforeSend: function (xhr) {
                        
                    },
             success: function (data, textStatus, jqXHR) {  
                 if(data!=0)
                        $("#body-page-wrapper").html(data);
                     },
             error: function (jqXHR, textStatus, errorThrown) {
                        alert(textStatus);
                    }
           });
   }
   
   function onClickBackMessage(data){
          $.ajax({
             url:"<?php echo URL::to('/admin/message/inbox');?>",
             beforeSend: function (xhr) {
                    },
             success: function (data, textStatus, jqXHR) {    
                       $("#body-page-wrapper").html(data);
                     },
             error: function (jqXHR, textStatus, errorThrown) {
                       alert(jqXHR);
                    }
           });
   }
   function onClickDeteleMessage(data){
      var id= $(data).attr("data-id");
        $.ajax({
            url:"<?php echo URL::to('/admin/message/inbox/deleteMessage');?>",
            type: 'POST',
            data:{"id":id},
            beforeSend: function (xhr) {
                        
                    },
            success: function (data, textStatus, jqXHR) {
                 if(data!="0")
                       $("#body-page-wrapper").html(data); 
                    },
            error: function (jqXHR, textStatus, errorThrown) {
                        alert(textStatus);
                    }
        });
   
   }
   function onClickCheckedAllMessage(data){
                var value=$(data).is( ":checked" );
                if(value){
                  $('input[type="checkbox"]').attr('checked','checked');

                }else{
                      $('input[type="checkbox"]').removeAttr("checked"); 
                }
    }
               function onClickformDeleteMessage(){
                  var data=$('#formDeleteMessage').serializeArray();
                    $.ajax({
                        url:"<?php echo URL::to('/admin/message/inbox/deleteMessage');?>",
                        type: 'POST',
                        data:data,
                        beforeSend: function (xhr) {

                                },
                        success: function (data, textStatus, jqXHR) {
                            if(data.toString()!="0")
                                   $("#body-page-wrapper").html(data); 
                                },
                        error: function (jqXHR, textStatus, errorThrown) {
                                    alert(textStatus);
                                }
                    });      

               }
     $(document).ready(function(){
     var input = $("<input>")
               .attr("type", "hidden")
               .attr("name", "action").val("search");
                $('#formSearchMessage').append($(input));
     
     });         
   </script>
    <script src="<?php echo URL::to('js/bootstrap.min.js');?>"></script>
   <script src="<?php echo URL::to('/js/move.js');?>"></script>
  </body>
</html>