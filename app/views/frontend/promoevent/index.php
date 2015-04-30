
<?php 
$myfile = fopen("content.php", "r") or die("Unable to open file!");
$content= fread($myfile,filesize("content.php"));
include_once("../layout/main.php"); 
?>