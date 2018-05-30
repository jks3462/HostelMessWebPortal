

<?php

 include "config.php";

	session_start();
	$d=$_SESSION['date'];
	if($d<10)
		$y='d0'.$d.'_d';
	else
		$y='d'.$d.'_d';
	echo "<h2>Dinner Details</h2>";


	$sql="SELECT * FROM ATTENDANCE";
		$result = $conn->query($sql);
		echo "<table border=3 >";
		echo "<th> SID </th> <th> ATTENDANCE </th></tr>";

		if ($result->num_rows > 0)
		{
			while($row = $result->fetch_assoc())
			{
	
				if($row[$y]>0)

					echo "<tr><td>&nbsp" . $row['sid'] . "&nbsp</td><td>&nbsp &nbsp &nbsp &nbsp Present &nbsp</td></tr>";

				if($row[$y]==0)
			
					echo "<tr><td>&nbsp" . $row['sid'] . "&nbsp </td><td>&nbsp&nbsp &nbsp &nbsp<b> Absent </b>&nbsp</td></tr>";
			}
		}
		
?>