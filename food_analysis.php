<?php
	include "config.php";
		$day= $_GET['date'];
		session_start();
		$_SESSION['date']=$day;
		$count1=0;
		$wasted1=0;
		$total1;
		
		$count2=0;
		$wasted2=0;
		$total2;
		
		$count3=0;
		$wasted3=0;
		$total3;
		date_default_timezone_set("Asia/Kolkata");
		$d1=date("d");
		$d2 = date("d", time() + 86400*1);
		$time=date("G");
		
		if($day<10)
		{
			$y1='d0'.$day.'_b';
			$y2='d0'.$day.'_l';
			$y3='d0'.$day.'_d';	
		}			
		else
		{
			$y1='d'.$day.'_b';
			$y2='d'.$day.'_l';
			$y3='d'.$day.'_d';	
			
		}
		/*calculating no of days a particular student camee to mess*/
		$sql="SELECT * FROM ATTENDANCE";
		$result = $conn->query($sql);
		

			if ($result->num_rows > 0) {
			while($row = $result->fetch_assoc()){
	
				if($row[$y1]>0)
					$count1++;
				if($row[$y1]==0)
					$wasted1++;
				
				if($row[$y2]>0)
					$count2++;
				if($row[$y2]==0)
					$wasted2++;
				
				if($row[$y3]>0)
					$count3++;
				if($row[$y3]==0)
					$wasted3++;

				
		}
		$total1=$count1+$wasted1;
		$total2=$count2+$wasted2;
		$total3=$count3+$wasted3;
		echo "<h2><u>BREAKFAST</u></h2>";
		echo "<h3>Total Meals Prepared : ".$total1."</h3>";
		echo "<h3>Total Meals Eaten &nbsp &nbsp &nbsp: ".$count1."</h3>";
		echo "<h3>Total Meals Wasted &nbsp &nbsp: ".$wasted1."</h3>";
		echo "<h3><b> Wastage &nbsp </b>: ".($wasted1*100/$total1)." % </h3>";
		echo "<h3><a href='food_analysis_breakfast_details.php'> View details </a>";
		
		
		echo "<h2><u>LUNCH</u></h2>";
		echo "<h3>Total Meals Prepared : ".$total2."</h3>";
		echo "<h3>Total Meals Eaten &nbsp &nbsp &nbsp: ".$count2."</h3>";
		echo "<h3>Total Meals Wasted &nbsp &nbsp: ".$wasted2."</h3>";
		echo "<h3><b> Wastage &nbsp </b>: ".($wasted2*100/$total2)." % </h3>";
		echo "<h3><a href='food_analysis_lunch_details.php'> View details </a>";
		
		
		echo "<h2><u>DINNER</u></h2>";
		echo "<h3>Total Meals Prepared : ".$total3."</h3>";
		echo "<h3>Total Meals Eaten &nbsp &nbsp &nbsp: ".$count3."</h3>";
		echo "<h3>Total Meals Wasted &nbsp &nbsp: ".$wasted3."</h3>";
		echo "<h3><b> Wastage &nbsp </b>: ".($wasted3*100/$total3)." % </h3>";
		echo "<h3><a href='food_analysis_dinner_details.php'> View details </a>";
		//	echo "<h2>Day not found</h2;
			}
?>