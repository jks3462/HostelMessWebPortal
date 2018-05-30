<html>
<body>



<form action="add_absent_days2.php" method="get">
		<?php	
		include "config.php";
		session_start();
		$id= $_SESSION['username'];
		
		// creating hidden textboxes 
		
		
		echo "<input type='hidden' name='day12' value='0' />";
		echo "<input type='hidden' name='day13' value='0' />";
		echo "<input type='hidden' name='day21' value='0' />";
		echo "<input type='hidden' name='day22' value='0' />";
		echo "<input type='hidden' name='day23' value='0' />";
		echo "<input type='hidden' name='day31' value='0' />";
		echo "<input type='hidden' name='day32' value='0' />";
		echo "<input type='hidden' name='day33' value='0' />";
		echo "<input type='hidden' name='day41' value='0' />";
		echo "<input type='hidden' name='day42' value='0' />";
		echo "<input type='hidden' name='day43' value='0' />";
		echo "<input type='hidden' name='day51' value='0' />";
		echo "<input type='hidden' name='day52' value='0' />";
		echo "<input type='hidden' name='day53' value='0' />";
		echo "<input type='hidden' name='day61' value='0' />";
		echo "<input type='hidden' name='day62' value='0' />";
		echo "<input type='hidden' name='day63' value='0' />";
		echo "<input type='hidden' name='day71' value='0' />";
		echo "<input type='hidden' name='day72' value='0' />";
		echo "<input type='hidden' name='day73' value='0' />";
		
		
			
		//*************************************************************************************
		// DISPLAYING TABLE
		date_default_timezone_set("Asia/Kolkata");
			$time=date("G");
			$dat=date("d-m-y");
			$d=date("d");
			$date2 = date("d-m-y", time() + 86400*1);
			$date3 = date("d-m-y", time() + 86400*2);
			$date4 = date("d-m-y", time() + 86400*3);
			$date5 = date("d-m-y", time() + 86400*4);
			$date6 = date("d-m-y", time() + 86400*5);
			$date7 = date("d-m-y", time() + 86400*6);
			$firstDayNextMonth = date('01-m-y', strtotime('next month'));	// finding date of 1st day of next month 
			
			$flag=8;		// initially it represents that all seven days are acvailable
			if($date2==$firstDayNextMonth)
				$flag=2;
			if($date3==$firstDayNextMonth)
				$flag=3;
			if($date4==$firstDayNextMonth)	// to check how many check boxes appeared 
				$flag=4;
			if($date5==$firstDayNextMonth)
				$flag=5;
			if($date6==$firstDayNextMonth)
				$flag=6;
			if($date7==$firstDayNextMonth)
				$flag=7;
			
			
				$y1='d'.$d.'_b';
				$y2='d'.$d.'_l';
				$y3='d'.$d.'_d';
		
		$sql="SELECT * FROM ATTENDANCE ";
		$result = $conn->query($sql);
		
		if ($result->num_rows > 0)
		{
			while($row = $result->fetch_assoc())
			{
				if($id==$row['sid'])
				break;
			}
			echo"<h2> MEALS YOU ARE NOT COMING FOR </h2>";
			echo "<table border=2>";
			echo "<tr><th>&nbsp DATE&nbsp &nbsp </th><th>&nbsp MEAL&nbsp &nbsp </th></tr>";
			
			if($time<9)		// means we have got lunch and dinner for day 1 as well
			{
				if($row[$y2]==-1)
					echo "<tr><td>" . $dat . "</td><td>Lunch</td></tr>";
				if($row[$y3]==-1)
					echo "<tr><td>" . $dat . "</td><td>Dinner</td></tr>";
				

			}
			if($time>9 && $time<15)		// means we have got dinner for day 1 
			{
				if($row[$y3]==-1)
					echo "<tr><td>" . $dat . "</td><td>Dinner</td></tr>";
			}
			
			
			if($flag!=2)
			{
				$d=date("d", time() + 86400*1);
				$y1='d'.$d.'_b';
				$y2='d'.$d.'_l';
				$y3='d'.$d.'_d';
				if($row[$y1]==-1)
					echo "<tr><td>" . $date2 . "</td><td>Breakfast</td></tr>";
				if($row[$y2]==-1)
					echo "<tr><td>" . $date2 . "</td><td>Lunch</td></tr>";
				if($row[$y3]==-1)
					echo "<tr><td>" . $date2 . "</td><td>Dinner</td></tr>";
				
				
				if($flag!=3)
				{
					$d=date("d", time() + 86400*2);
					$y1='d'.$d.'_b';
					$y2='d'.$d.'_l';
					$y3='d'.$d.'_d';
					if($row[$y1]==-1)
						echo "<tr><td>" . $date3 . "</td><td>Breakfast</td></tr>";
					if($row[$y2]==-1)
						echo "<tr><td>" . $date3 . "</td><td>Lunch</td></tr>";
					if($row[$y3]==-1)
						echo "<tr><td>" . $date3 . "</td><td>Dinner</td></tr>";
				
				
					if($flag!=4)
					{
						$d=date("d", time() + 86400*3);
						$y1='d'.$d.'_b';
						$y2='d'.$d.'_l';
						$y3='d'.$d.'_d';
						if($row[$y1]==-1)
							echo "<tr><td>" . $date4 . "</td><td>Breakfast</td></tr>";
						if($row[$y2]==-1)
							echo "<tr><td>" . $date4 . "</td><td>Lunch</td></tr>";
						if($row[$y3]==-1)
							echo "<tr><td>" . $date4 . "</td><td>Dinner</td></tr>";
				
				
						if($flag!=5)
						{
							$d=date("d", time() + 86400*4);
							$y1='d'.$d.'_b';
							$y2='d'.$d.'_l';
							$y3='d'.$d.'_d';

							if($row[$y1]==-1)
								echo "<tr><td>" . $date5 . "</td><td>Breakfast</td></tr>";
							if($row[$y2]==-1)
								echo "<tr><td>" . $date5 . "</td><td>Lunch</td></tr>";
							if($row[$y3]==-1)
								echo "<tr><td>" . $date5 . "</td><td>Dinner</td></tr>";
							
							
							if($flag!=6)
							{
								$d=date("d", time() + 86400*5);
								$y1='d'.$d.'_b';
								$y2='d'.$d.'_l';
								$y3='d'.$d.'_d';
								if($row[$y1]==-1)
									echo "<tr><td>" . $date6 . "</td><td>Breakfast</td></tr>";
								if($row[$y2]==-1)
									echo "<tr><td>" . $date6 . "</td><td>Lunch</td></tr>";
								if($row[$y3]==-1)
									echo "<tr><td>" . $date6 . "</td><td>Dinner</td></tr>";
								
								
								if($flag!=7)
								{
									$d=date("d", time() + 86400*6);
									$y1='d'.$d.'_b';
									$y2='d'.$d.'_l';
									$y3='d'.$d.'_d';
									if($row[$y1]==-1)
										echo "<tr><td>" . $date7 . "</td><td>Breakfast</td></tr>";
									if($row[$y2]==-1)
										echo "<tr><td>" . $date7 . "</td><td>Lunch</td></tr>";
									if($row[$y3]==-1)
										echo "<tr><td>" . $date7 . "</td><td>Dinner</td></tr>";
				
								}
							}
						}
					}
				}
			}		
		}
		echo "</table><br/>";

		//********************************************************************************************************************
		
		
		
		
		
		
		
		
		
		
		echo"<h2>ADD MORE MEALS YOU ARE NOT COMING FOR</h2>";
		
		
		//*************************************************************************************
		// DISPLAYING CHECK BOXEX
		$time=date("G");
	
		
		if($time<15)		// to check whether applicaple for today
		echo "<b>$dat </b>";
		if($time<9)		// to check for lunch
		{
			echo "&nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbspLunch <input type='checkbox' value='-1'  name='day12'/>";
			echo "	&nbsp &nbsp &nbsp &nbsp&nbspDinner <input type='checkbox' value='-1' name='day13'/>";
			echo "<br/><br/>";
		}
		if($time<15 && $time>9)		// to check for dinner
		{
			echo "&nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp Dinner <input type='checkbox' value='-1' name='day13'/>";
			echo "<br/><br/>";
		}	
		
		
		
		
		date_default_timezone_set("Asia/Kolkata");
		$dat=date("d-m-y");
		$day2 = date("d-m-y", time() + 86400*1);
		//$d=date("d", time() + 86400*1);
		$firstDayNextMonth = date('01-m-y', strtotime('next month'));	// finding date of 1st day of next month 
		// to check that we dont go to next month 
		
							
		if($firstDayNextMonth==$day2);
			//echo"$day2";// because meals that are not to be prepared can be listed only for curr month
		else		//if date becomes equal to date of next month we skip the res of the code
		{
			echo "<b>$day2  </b>";
			echo "&nbsp &nbsp &nbsp &nbsp &nbsp Breakfast <input type='checkbox' value='-1' name='day21'/>";	
			echo " &nbsp &nbsp &nbsp &nbsp &nbsp Lunch <input type='checkbox' value='-1' name='day22'/>";
			echo "&nbsp &nbsp &nbsp &nbsp &nbsp Dinner <input type='checkbox' value='-1' name='day23'/>";
			echo "<br/><br/>";

					
					
			
					
			date_default_timezone_set("Asia/Kolkata");
			$dat=date("d-m-y");
			$day3 = date("d-m-y", time() + 86400*2);
			$firstDayNextMonth = date('01-m-y', strtotime('next month'));	// finding date of 1st day of next month
		//	echo"$firstDayNextMonth";
			if($firstDayNextMonth==$day3);
			//	echo"$day3";//because meals that are not to be prepared can be listed only for curr month
			else		//if date becomes equal to date of next month we skip the res of the code
			{
				echo "<b>$day3 </b>";
				echo "&nbsp &nbsp &nbsp &nbsp &nbsp Breakfast <input type='checkbox' value='-1' name='day31'/>";
				echo " &nbsp &nbsp &nbsp &nbsp &nbsp Lunch <input type='checkbox' value='-1' name='day32'/>";
				echo "&nbsp &nbsp &nbsp &nbsp &nbsp Dinner <input type='checkbox' value='-1' name='day33'/>";
				echo "<br/><br/>";
			
			
			
			
			
			
				//date_default_timezone_set("Asia/Kolkata");
				$dat=date("d-m-y");
				$day4 = date("d-m-y", time() + 86400*3);
			
				if($firstDayNextMonth==$day4);   //because meals that are not to be prepared can be listed only for curr month
				else			//if date becomes equal to date of next month we skip the res of the code
				{
					echo "<b>$day4 </b>";
					echo "&nbsp &nbsp &nbsp &nbsp &nbsp Breakfast <input type='checkbox' value='-1' name='day41'/>";
					echo " &nbsp &nbsp &nbsp &nbsp &nbsp Lunch <input type='checkbox' value='-1' name='day42'/>";
					echo "&nbsp &nbsp &nbsp &nbsp &nbsp Dinner <input type='checkbox' value='-1' name='day43'/>";
					echo "<br/><br/>";
				
				
				
				
				
				
					
					//date_default_timezone_set("Asia/Kolkata");
					$dat=date("d-m-y");
					$day5 = date("d-m-y", time() + 86400*4);
				
					if($firstDayNextMonth==$day5);		//because meals that are not to be prepared can be listed only for curr month
					else					//if date becomes equal to date of next month we skip the res of the code
					{
						echo "<b>$day5 </b>";
						echo "&nbsp &nbsp &nbsp &nbsp &nbsp Breakfast <input type='checkbox' value='-1' name='day51'/>";
						echo " &nbsp &nbsp &nbsp &nbsp &nbsp Lunch <input type='checkbox' value='-1' name='day52'/>";
						echo "&nbsp &nbsp &nbsp &nbsp &nbsp Dinner <input type='checkbox' value='-1' name='day53'/>";
						echo "<br/><br/>";
					
					



					
						//date_default_timezone_set("Asia/Kolkata");
						$dat=date("d-m-y");
						$day6 = date("d-m-y", time() + 86400*5);
				
						if($firstDayNextMonth==$day6);			//because meals that are not to be prepared can be listed only for curr month
						else						//if date becomes equal to date of next month we skip the res of the code
						{
							echo "<b>$day6 </b>";
							echo "&nbsp &nbsp &nbsp &nbsp &nbsp Breakfast <input type='checkbox' value='-1' name='day61'/>";
							echo " &nbsp &nbsp &nbsp &nbsp &nbsp Lunch <input type='checkbox' value='-1' name='day62'/>";
							echo "&nbsp &nbsp &nbsp &nbsp &nbsp Dinner <input type='checkbox' value='-1' name='day63'/>";
							echo "<br/><br/>";	
							
							
							
							
							
							
							
							//date_default_timezone_set("Asia/Kolkata");
							$dat=date("d-m-y");
							$day7 = date("d-m-y", time() + 86400*6);
							$firstDayNextMonth = date('01/m/y', strtotime('next month'));	// finding date of 1st day of next month
							if($firstDayNextMonth==$day7);			//because meals that are not to be prepared can be listed only for curr month
							else						//if date becomes equal to date of next month we skip the res of the code
							{
								echo "<b>$day7 </b>";
								echo "&nbsp &nbsp &nbsp &nbsp &nbsp Breakfast <input type='checkbox' value='-1' name='day71'/>";
								echo " &nbsp &nbsp &nbsp &nbsp &nbsp Lunch <input type='checkbox' value='-1' name='day72'/>";
								echo "&nbsp &nbsp &nbsp &nbsp &nbsp Dinner <input type='checkbox' value='-1' name='day73'/>";
								echo "<br/><br/>";	
							}							
						}
					}
				}
			}
		}
		?>



<input type="submit" value="Submit" />
</form>

</body>
</html>