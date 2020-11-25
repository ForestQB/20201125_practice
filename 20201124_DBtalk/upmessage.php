<?php
   	include("connect.php");
   	
   	$link=Connection();

	$Account=$_POST["Account"];
	$Message=$_POST["Message"];

	// if($Serch!=)
	// {
		$query = "INSERT INTO `boarduser` (`Account`, `Message`) 
		VALUES ('".$Account."','".$Message."')"; 
	   
  	 	mysql_query($query,$link);
		mysql_close($link);
  	 	header("Location: index.php");
	// }

	
?>
