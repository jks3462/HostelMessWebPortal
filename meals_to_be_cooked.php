<html>
<head><title> Meals to be cooked</title>
<body>
<h1 style="font-size:50px"><center>MEALS TO BE COOKED<center/></h1>
<?php
		include "config.php";
		
		
		date_default_timezone_set("Asia/Kolkata");
			$d1=date("d");
			$d2 = date("d", time() + 86400*1);
			$time=date("G");
			$count11=0;
			$count12=0;
			$count13=0;
			$count21=0;		// counts the number of meals for date-b/l/d (breakfast/lunch/dinner)
			$count22=0;
			$count23=0;
			
			$y11='d'.$d1.'_b';
			$y12='d'.$d1.'_l';
			$y13='d'.$d1.'_d';
			$y21='d'.$d2.'_b';
			$y22='d'.$d2.'_l';
			$y23='d'.$d2.'_d';
			
			
	
		$sql="SELECT sid FROM ATTENDANCE where $y11=0";
		$result = $conn->query($sql);
		if ($result->num_rows > 0)
		{
			while($row = $result->fetch_assoc())
				$count11++;
		}
			
		$sql="SELECT sid FROM ATTENDANCE where $y12=0";
		$result = $conn->query($sql);
		if ($result->num_rows > 0)
		{
			while($row = $result->fetch_assoc())
				$count12++;
		}
			
		
		$sql="SELECT sid FROM ATTENDANCE where $y13=0";
		$result = $conn->query($sql);
		if ($result->num_rows > 0)
		{
			while($row = $result->fetch_assoc())
				$count13++;
		}
		
		
		$sql="SELECT sid FROM ATTENDANCE where $y21=0";
		$result = $conn->query($sql);
		if ($result->num_rows > 0)
		{
			while($row = $result->fetch_assoc())
				$count21++;
		}
		
		
		$sql="SELECT sid FROM ATTENDANCE where $y22=0";
		$result = $conn->query($sql);
		if ($result->num_rows > 0)
		{
			while($row = $result->fetch_assoc())
				$count22++;
		}
		
		
		$sql="SELECT sid FROM ATTENDANCE where $y23=0";
		$result = $conn->query($sql);
 
		if ($result->num_rows > 0)
		{
			while($row = $result->fetch_assoc())
				$count23++;
		}
		if($time<8)
		{		
			echo "<h1><u>TODAY</u></h1>";
			echo "<h2>Breakfast &nbsp  $count11</h2>";
			echo "<h2>Lunch &nbsp &nbsp &nbsp &nbsp  $count12</h2>";
			echo "<h2>Dinner &nbsp &nbsp &nbsp &nbsp$count13</h2>";
		}
		if($time>8 && $time<13)
		{		
			echo "<h1><u>TODAY</u></h1>";
			echo "<h2>Lunch &nbsp &nbsp &nbsp &nbsp  $count12</h2>";
			echo "<h2>Dinner &nbsp &nbsp &nbsp &nbsp$count13</h2>";
		}
		if($time>13 && $time<20)
		{		
			echo "<h1><u>TODAY</u></h1>";
			echo "<h2>Dinner &nbsp &nbsp &nbsp &nbsp$count13</h2>";
		}
		
		
		echo "<h1><u>TOMORROW</u></h1>";
		echo "<h2>Breakfast &nbsp  $count21</h2>";
		echo "<h2>Lunch &nbsp &nbsp &nbsp &nbsp  $count22</h2>";
		echo "<h2>Dinner &nbsp &nbsp &nbsp &nbsp$count23</h2>";
?>

</body>
</html>