<html>
<head><title></title>

</head>
<body>





<h1>LUNCH ATTENDANCE</h1>


<form action="daily_attendance2_l.php" method="get">

SID : <input type="number" name="roll_no" min=10000000 max=19999999 placeholder="Valid ID" ><br><br/><br/>

<input type="submit">
</form>
<a href="user_page_faculty.html" ><h2>Faculty home page</h2></a>
<a href="index.html" ><h2>HOME</h2></a>

</body>
</html>


<?php
include "config.php";
session_start();
	$day=$_SESSION['time'];
	//echo $day;
	$count=0;
	$flag=0;
	$sql="SELECT * FROM ATTENDANCE WHERE $day=1";
	$result = $conn->query($sql);

	if ($result->num_rows > 0)
			{
				while($row = $result->fetch_assoc())
				{	
						echo "<tr><td>&nbsp<b>" . $row['sid'] . "<b>&nbsp</td></tr>";
						$flag++;
							$count++;
							if($count==8)
							{
								echo "</br>";
								$count=0;
								
							}
				}
			}
				echo "<h3><b> &nbsp Total attendance ".$flag."</b></h3>";
			
?>

