<?php 
	$host = "localhost";
	$username = "root";
	$password = "";
	$databaseName = "qlgiaotrinh";
	
	$link = mysqli_connect($host, $username, $password) or die ("Connect db fail!");
	mysqli_set_charset($link,"utf8");
	mysqli_select_db($link, $databaseName);
	
   
?>