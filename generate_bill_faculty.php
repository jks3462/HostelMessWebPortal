<html>
<body>
Click here to send bill as message to students??</br></br> 
<form action="send-msg1.php">
<input type="submit" value="Send message">
</form>
</body>
</html>
<?php
		include "config.php";
		
		session_start();
		
		
	
		date_default_timezone_set("Asia/Kolkata");
			$time=date("G");
			$dat=date("d/m/y");
		$x=date('01');
		$z=0;
		$d = date("d", time());
			$y1='d'.$d.'_b';
			$y2='d'.$d.'_l';
			$y3='d'.$d.'_d';
		
		
			$count0=0;
			$count1=0;
			$count2=0;
			$total_bill=0;
			$bill_0=0;		// bill for not coming
			$bill_1=0;		// bill for coming
			$bill_2=0;		// bill for coming on -1 
			$meal_cost_0=10;
			$meal_cost_1=50;
			$meal_cost_2=60;
			$x = 1;
			$var;
			/*generating bill of the user*/
		$sql="SELECT * FROM ATTENDANCE";
		$result = $conn->query($sql);
		//echo "<h2>SID</h2>";
		
			if ($result->num_rows > 0) {
				echo"<h1>&nbsp &nbsp &nbsp  &nbsp &nbspBILL DETAILS</h1>";
									
				while($row = $result->fetch_assoc())
				{
					$d = date("d", time());
					$z=0;
					$count0=0;
					$count1=0;
					$count2=0;
					$total_bill=0;
					$bill_0=0;		// bill for not coming
					$bill_1=0;		// bill for coming
					$bill_2=0;		// bill for coming on -1 
					$meal_cost_0=10;
					$meal_cost_1=50;
					$meal_cost_2=60;
					$x = 1;
					$id=$row['sid'];
					
					while($d>1){		// it will not add bill for day 1 of the month 
						// we go backwards from the current date to 1st date of the month
						$y1 = 'd'.$d.'_b';
						$y2 = 'd'.$d.'_l';
						$y3 = 'd'.$d.'_d';
						$var=$row[$y1];
						if($var==0)
							$count0++;
						if($var==1)
							$count1++;
						if($var==2)
							$count2++;
						
						// for lunch
						$var=$row[$y2];
						if($var==0)
							$count0++;
						if($var==1)
							$count1++;
						if($var==2)
							$count2++;
						
						// for dinner
						
						$var=$row[$y3];
						if($var==0)
							$count0++;
						if($var==1)
							$count1++;
						if($var==2)
							$count2++;
						
						// decrement day
						$z++;
						$d= date("d", time() - 86400*$z);
						
						
					}
					// calculating for the 1st day of the month 
					// as itwas not calculated from the while loop
					$y1 = 'd'.$d.'_b';
						$y2 = 'd'.$d.'_l';
						$y3 = 'd'.$d.'_d';
						$var=$row[$y1];
						if($var==0)
							$count0++;
						if($var==1)
							$count1++;
						if($var==2)
							$count2++;
						
						// for lunch
						$var=$row[$y2];
						if($var==0)
							$count0++;
						if($var==1)
							$count1++;
						if($var==2)
							$count2++;
						
						// for dinner
						
						$var=$row[$y3];
						if($var==0)
							$count0++;
						if($var==1)
							$count1++;
						if($var==2)
							$count2++;
					
					
					
					$bill_0=$count0*$meal_cost_0;
					$bill_1=$count1*$meal_cost_1;
					$bill_2=$count2*$meal_cost_2;
					$total_bill=$bill_0+$bill_1+$bill_2;
					
					// UPDATING BILL INTO REGISTERATION TABLE
				$d = date("d", time());
					$sql1 = "UPDATE REGISTRATION SET bill =$total_bill WHERE sid=$id";
					
						
						// UPDATING BILL_UPTO INTO REGISTERATION TABLE
					
						$sql2 = "UPDATE REGISTRATION SET bill_upto ='$d' WHERE sid=$id";

						if ($conn->query($sql1) === TRUE && $conn->query($sql2) === TRUE) 

						{
							//echo "<h1>BILL updated successfully</h1>";
						} 
						else
						{
						echo "<h1>Error updating BILL: </h1>" . $conn->error;
						}
					
					
					}
				
			}
			
			// printing bill in table format
				
			
			
			$sql="SELECT * FROM REGISTRATION";
		$result = $conn->query($sql);
		//echo "<h2>SID</h2>";
		$d = date("d", time());
			if ($result->num_rows > 0) {
			
									echo "<table border=3 >";
					echo "<tr margin=2 padding=3><th> NAME </th> <th> SID </th> <th> YEAR </th><th> PHONE </th><th> BILL </th><th> BILL UPTO </th></tr>";

				while($row = $result->fetch_assoc())
				{
echo "<tr><td>&nbsp" . $row['name'] . "&nbsp</td><td>&nbsp" . $row['sid'] . "&nbsp</td><td> &nbsp &nbsp &nbsp" . $row['year'] . "&nbsp</td><td>&nbsp" . $row['phone'] . "&nbsp</td><td>&nbsp<b>Rs&nbsp  " . $row['bill'] . "</b>&nbsp</td><td>&nbsp &nbsp &nbsp" . $d . "&nbspDays &nbsp</td></tr>";
				}
						echo "</table>";
			}
			
			
			
			
			
			
			
			
			
			
			
?>