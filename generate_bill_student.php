<?php
		include "config.php";
		
		session_start();
		$id=$_SESSION['user'];
		date_default_timezone_set("Asia/Kolkata");
			$time=date("G");
			$dat=date("d/m/y");
		$x=date('01');
		$z=0;
		$d = date("d", time());
			$y1='d'.$d.'_b';
			$y2='d'.$d.'_l';
			$y3='d'.$d.'_d';

	//	$dd=date('d', strtotime('last day of this month'));    // lastday of month to calculate bill 
		
			
			
		
// code to get name of the person who has logged in		
					$sql3="SELECT * FROM REGISTRATION";
					$result3 = $conn->query($sql3);
					if ($result3->num_rows > 0)
						{
							
							
							
							while($row3 = $result3->fetch_assoc())
							{
							if($id==$row3['sid'])
									break;
							}
						}		
				$name3=$row3['name'];

				

		
$sql="SELECT * FROM ATTENDANCE";
$result = $conn->query($sql);
if ($result->num_rows > 0) {



		while($row = $result->fetch_assoc())
		{
		if($id==$row['sid'])
				break;
		}
	
		
	
	
	}
else{
	echo "No database found";
}
		
		
		
		
			
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
			$id=$_SESSION['username'];
				$x=date('01');
			$var;
			/*generating bill of the user*/
		$sql="SELECT * FROM ATTENDANCE";
		$result = $conn->query($sql);
		//echo "<h2>SID</h2>";
			if ($result->num_rows > 0) {
		while($row = $result->fetch_assoc())
		{
			if($id==$row['sid'])
				break;
		}
		echo "<table border=1>";
	echo "<tr><th> DAY </th><th> MEAL COOKED </th><th> ATTENDANCE </th><th> CHARGE </th></tr>";
		
		
		
		
		
		
		//**********************LOOP FOR CALCULATING BILL ******************************************************************
		
		while($d!=01)	// it will not do for the first day of the month 
							// so at the end we will do it manually out of the loop   see     ->>>>>  ^^^^^^^^^^^^^^^^^^^^^^^^^^^^
							// printing table for his attendance
		{						// we go backwards from the current date to 1st date of the month
		$p="&nbsp &nbsp &nbsp &nbsp Present &nbsp";
		$a="&nbsp &nbsp &nbsp &nbsp Absent &nbsp";
		$y="&nbsp &nbsp &nbsp &nbsp &nbsp &nbsp Yes";
		$n="&nbsp &nbsp &nbsp &nbsp &nbsp &nbsp No";
		

		
			$y1='d'.$d.'_b';
			$y2='d'.$d.'_l';
			$y3='d'.$d.'_d';
			$var=$row[$y1];
			if($var==0)
				{
					$count0++;
					echo "<tr><td>" . $y1 . "</td><td>" . $y . "</td><td>" . $a . "</td><td>" . "&nbsp &nbsp Rs 10" . "</td></tr>";
				}
			if($var==1)
				{
					$count1++;
					echo "<tr><td>" . $y1 . "</td><td>" . $y . "</td><td>" . $p . "</td><td>" . "&nbsp &nbsp Rs 50" . "</td></tr>";
				}
			if($var==2)
				{
					$count2++;
					echo "<tr><td>" . $y1 . "</td><td><b>" . $n . "</b></td><td>" . $p . "</td><td>" . "&nbsp &nbsp Rs 60" . "</td></tr>";
				}
			if($var==-1)
				{
					echo "<tr><td>" . $y1 . "</td><td>" . $n . "</td><td>" . $a . "</td><td>" . "&nbsp &nbsp -------" . "</td></tr>";
				}
			
			//echo "$y1 &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp $var<br/>";
	
			// for lunch
			$var=$row[$y2];
			if($var==0)
				{
					$count0++;
					echo "<tr><td>" . $y2 . "</td><td>" . $y . "</td><td>" . $a . "</td><td>" . "&nbsp &nbsp Rs 10" . "</td></tr>";
				}
			if($var==1)
				{
					$count1++;
					echo "<tr><td>" . $y2 . "</td><td>" . $y . "</td><td>" . $p . "</td><td>" . "&nbsp &nbsp Rs 50" . "</td></tr>";
				}
			if($var==2)
				{
					$count2++;
					echo "<tr><td>" . $y2 . "</td><td><b>" . $n . "</b></td><td>" . $p . "</td><td>" . "&nbsp &nbsp Rs 60" . "</td></tr>";
				}
			if($var==-1)
				{
					echo "<tr><td>" . $y2 . "</td><td>" . $n . "</td><td>" . $a . "</td><td>" . "&nbsp &nbsp -------" . "</td></tr>";
				}
			//echo "$y2 &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp $var<br/>";
			// for dinner
			
			$var=$row[$y3];
		if($var==0)
				{
					$count0++;
					echo "<tr><td>" . $y3 . "</td><td>" . $y . "</td><td>" . $a . "</td><td>" . "&nbsp &nbsp Rs 10" . "</td></tr>";
				}
			if($var==1)
				{
					$count1++;
					echo "<tr><td>" . $y3 . "</td><td>" . $y . "</td><td>" . $p . "</td><td>" . "&nbsp &nbsp Rs 50" . "</td></tr>";
				}
			if($var==2)
				{
					$count2++;
					echo "<tr><td>" . $y3 . "</td><td><b>" . $n . "</b></td><td>" . $p . "</td><td>" . "&nbsp &nbsp Rs 60" . "</td></tr>";
				}
			if($var==-1)
				{
					echo "<tr><td>" . $y3 . "</td><td>" . $n . "</td><td>" . $a . "</td><td>" . "&nbsp &nbsp -------" . "</td></tr>";
				}	
				// we go backwards from the current date to 1st date of the month
			$z++;
			$d= date("d", time() - 86400*$z);
			$y1='d'.$d.'_b';
			$y2='d'.$d.'_l';
			$y3='d'.$d.'_d';
			
			
		}
		
		// ->>> ^^^^^^^^^^^^^^^^^^^^^^^^^^^  calculating billl for the first day of the month ^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^
		//^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^
		

		
			$var=$row[$y1];
			if($var==0)
				{
					$count0++;
					echo "<tr><td>" . $y1 . "</td><td>" . $y . "</td><td>" . $a . "</td><td>" . "&nbsp &nbsp Rs 10" . "</td></tr>";
				}
			if($var==1)
				{
					$count1++;
					echo "<tr><td>" . $y1 . "</td><td>" . $y . "</td><td>" . $p . "</td><td>" . "&nbsp &nbsp Rs 50" . "</td></tr>";
				}
			if($var==2)
				{
					$count2++;
					echo "<tr><td>" . $y1 . "</td><td><b>" . $n . "</b></td><td>" . $p . "</td><td>" . "&nbsp &nbsp Rs 60" . "</td></tr>";
				}
			if($var==-1)
				{
					echo "<tr><td>" . $y1 . "</td><td>" . $n . "</td><td>" . $a . "</td><td>" . "&nbsp &nbsp -------" . "</td></tr>";
				}
			
			//echo "$y1 &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp $var<br/>";
	
			// for lunch
			$var=$row[$y2];
			if($var==0)
				{
					$count0++;
					echo "<tr><td>" . $y2 . "</td><td>" . $y . "</td><td>" . $a . "</td><td>" . "&nbsp &nbsp Rs 10" . "</td></tr>";
				}
			if($var==1)
				{
					$count1++;
					echo "<tr><td>" . $y2 . "</td><td>" . $y . "</td><td>" . $p . "</td><td>" . "&nbsp &nbsp Rs 50" . "</td></tr>";
				}
			if($var==2)
				{
					$count2++;
					echo "<tr><td>" . $y2 . "</td><td><b>" . $n . "</b></td><td>" . $p . "</td><td>" . "&nbsp &nbsp Rs 60" . "</td></tr>";
				}
			if($var==-1)
				{
					echo "<tr><td>" . $y2 . "</td><td>" . $n . "</td><td>" . $a . "</td><td>" . "&nbsp &nbsp -------" . "</td></tr>";
				}
			//echo "$y2 &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp $var<br/>";
			// for dinner
			
			$var=$row[$y3];
		if($var==0)
				{
					$count0++;
					echo "<tr><td>" . $y3 . "</td><td>" . $y . "</td><td>" . $a . "</td><td>" . "&nbsp &nbsp Rs 10" . "</td></tr>";
				}
			if($var==1)
				{
					$count1++;
					echo "<tr><td>" . $y3 . "</td><td>" . $y . "</td><td>" . $p . "</td><td>" . "&nbsp &nbsp Rs 50" . "</td></tr>";
				}
			if($var==2)
				{
					$count2++;
					echo "<tr><td>" . $y3 . "</td><td><b>" . $n . "</b></td><td>" . $p . "</td><td>" . "&nbsp &nbsp Rs 60" . "</td></tr>";
				}
			if($var==-1)
				{
					echo "<tr><td>" . $y3 . "</td><td>" . $n . "</td><td>" . $a . "</td><td>" . "&nbsp &nbsp -------" . "</td></tr>";
				}
				
				
				
				
				//****************END OF CALCULATING BILL ****************************************************
				//^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^
				//^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^
		
		
		
		
		
		
		
		
		
		
		
		
		
		$bill_0=$count0*$meal_cost_0;
		$bill_1=$count1*$meal_cost_1;
		$bill_2=$count2*$meal_cost_2;
		$total_bill=$bill_0+$bill_1+$bill_2;
		
			
		echo "<br/><h1> Hey $name3 , your Bill upto today is : Rs ".$total_bill ."  <br/>";
		echo "</table>";

	//	echo "<br/><h1> Hey $name3 , your Bill Details upto day $no_of_days are  <br/>";
		echo "<h2>Bill For not coming &nbsp  &nbsp  &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp ".$bill_0."</h2>";
		echo "<h2>Bill for coming &nbsp &nbsp&nbsp  &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp  &nbsp &nbsp &nbsp &nbsp".$bill_1."</h2>";
		echo "<h2>Bill for coming on Unexpected days &nbsp".$bill_2."</h2>";
		//echo "<br/><h1>TOTAL BILL &nbsp ".$total_bill."</h1>";
		//	echo "<h2>Day not found</h2;
			}
?>