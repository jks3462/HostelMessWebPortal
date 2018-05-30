	<?php
include "config.php";

	date_default_timezone_set("Asia/Kolkata");
	
    $x=date("d");
	$y1 = 'd'.(string)$x.'_b';


	session_start();
	$_SESSION['time']=$y1;
		//$_SESSION['username']=$id;
	
	header('Location: daily_attendance2_b1.php');

		
?>