<?php 
echo View::make("admin.meta");

?>
        <link rel="stylesheet" href="<?php echo URL::to('css/bootstrap.min.css');?>">
        <link rel="stylesheet" href="<?php echo URL::to('css/admin.css');?>">
        <link rel="stylesheet" href="<?php echo URL::to('css/tenya.css');?>">
        <link rel="stylesheet" href="<?php echo URL::to('font-awesome/css/font-awesome.min.css');?>">
     <script src="<?php echo URL::to('js/jquery.min.js');?>"></script>    
  </head>

  <body style="background:#ffffff url('<?php echo URL::to('/img/bg_1.png');?>);">
    <div id="wrapper">
<?php
        echo View::make('admin.menu');
?>

      <div id="page-wrapper" >
Hello

      </div><!-- /#page-wrapper -->

    </div><!-- /#wrapper -->
    <!-- JavaScript -->
    </script>
    <script src="<?php echo URL::to('js/bootstrap.min.js');?>"></script>
    <script src="<?php echo URL::to('/js/move.js');?>"></script>
  </body>
</html>