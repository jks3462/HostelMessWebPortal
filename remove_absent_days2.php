<?php
include "config.php";
session_start();
	$id= $_SESSION['username'];
	$count=0;		// represent how many updates in attendance table were tried
	$count1=0;		// represent how many updates in attendance table were successful
					//if $COUNT==$COUNT1 then we have a successful update of days not coming
   //echo" sid : $id<br/>";
	$sql="SELECT * FROM ATTENDANCE";
	$result = $conn->query($sql);
		
	if ($result->num_rows > 0)
	{
		while($row = $result->fetch_assoc())
		{
			if($id==$row['sid'])
			break;
		}
			
		
		$d12=$_GET['day12'];
		$d13=$_GET['day13'];
		$d21=$_GET['day21'];
		$d22=$_GET['day22'];
		$d23=$_GET['day23'];
		$d31=$_GET['day31'];
		$d32=$_GET['day32'];
		$d33=$_GET['day33'];
		$d41=$_GET['day41'];
		$d42=$_GET['day42'];
		$d43=$_GET['day43'];
		$d51=$_GET['day51'];
		$d52=$_GET['day52'];
		$d53=$_GET['day53'];
		$d61=$_GET['day61'];
		$d62=$_GET['day62'];
		$d63=$_GET['day63'];
		$d71=$_GET['day71'];
		$d72=$_GET['day72'];
		$d73=$_GET['day73'];
		
		
		date_default_timezone_set("Asia/Kolkata");
			$time=date("G");
			$dat=date("d/m/y");
			$d=date("d");
			$day2 = date("d-m-y", time() + 86400*1);
			$day3 = date("d-m-y", time() + 86400*2);
			$day4 = date("d-m-y", time() + 86400*3);
			$day5 = date("d-m-y", time() + 86400*4);
			$day6 = date("d-m-y", time() + 86400*5);
			$day7 = date("d-m-y", time() + 86400*6);
			$firstDayNextMonth = date('01-m-y', strtotime('next month'));	// finding date of 1st day of next month 
			
			$flag=8;		// initially it represents that all seven days chechbokxes are acvailable
			if($day2==$firstDayNextMonth)
				$flag=2;
			if($day3==$firstDayNextMonth)
				$flag=3;
			if($day4==$firstDayNextMonth)	// to check how many check boxes appeared 
				$flag=4;
			if($day5==$firstDayNextMonth)
				$flag=5;
			if($day6==$firstDayNextMonth)
				$flag=6;
			if($day7==$firstDayNextMonth)
				$flag=7;
			
			
				$y1='d'.$d.'_b';
				$y2='d'.$d.'_l';
				$y3='d'.$d.'_d';
			
	
		
		if($time<9)		// means we have got lunch and dinner for day 1 as well
		{
			if($d12==0)
			{
				$sql = "UPDATE ATTENDANCE SET $y2 =  $d12 WHERE sid=$id";
				$count++;
				if ($conn->query($sql) == TRUE) 
					$count1++;
			}
			if($d13==0)
			{
				$sql = "UPDATE ATTENDANCE SET $y3 =  $d13 WHERE sid=$id";	
				$count++;
				if ($conn->query($sql) == TRUE) 
					$count1++;
			}
			
			

		}
		if($time>9 && $time<15)		// means we have got dinner for day 1 
		{
			if($d13==0)
			{
				$sql = "UPDATE ATTENDANCE SET $y3 =  $d13 WHERE sid=$id";	
				$count++;
				if ($conn->query($sql) == TRUE) 
					$count1++;
			}
		}
		
				
		if($flag!=2)
		{
			$d=date("d", time() + 86400*1);
			$y1='d'.$d.'_b';
			$y2='d'.$d.'_l';
			$y3='d'.$d.'_d';
			if($d21==0)
			{
				$sql = "UPDATE ATTENDANCE SET $y1 =  $d21 WHERE sid=$id";
				$count++;
				if ($conn->query($sql) == TRUE) 
					$count1++;
			}
			if($d22==0)
			{
				$sql = "UPDATE ATTENDANCE SET $y2 =  $d22 WHERE sid=$id";	
				$count++;
				if ($conn->query($sql) == TRUE) 
					$count1++;
			}
			
		
			if($d23==0)
			{
				$sql = "UPDATE ATTENDANCE SET $y3 =  $d23 WHERE sid=$id";	
				$count++;
				if ($conn->query($sql) == TRUE) 
					$count1++;
			}
			
			
			
			
			if($flag!=3)
			{
				$d=date("d", time() + 86400*2);
				$y1='d'.$d.'_b';
				$y2='d'.$d.'_l';
				$y3='d'.$d.'_d';
				if($d31==0)
				{
					$sql = "UPDATE ATTENDANCE SET $y1 =  $d31 WHERE sid=$id";	
					$count++;
					if ($conn->query($sql) == TRUE) 
						$count1++;
				}
			
				if($d32==0)
				{
					$sql = "UPDATE ATTENDANCE SET $y2 =  $d32 WHERE sid=$id";	
					$count++;
					if ($conn->query($sql) == TRUE) 
						$count1++;
				}
			
				if($d33==0)
				{
					$sql = "UPDATE ATTENDANCE SET $y3 =  $d33 WHERE sid=$id";	
					$count++;
					if ($conn->query($sql) == TRUE) 
						$count1++;
				}
			
							
				
				if($flag!=4)
				{
						$d=date("d", time() + 86400*3);
						$y1='d'.$d.'_b';
						$y2='d'.$d.'_l';
						$y3='d'.$d.'_d';
						if($d41==0)
						{
							$sql = "UPDATE ATTENDANCE SET $y1 =  $d41 WHERE sid=$id";	
							$count++;
							if ($conn->query($sql) == TRUE) 
								$count1++;
						}
				
						if($d42==0)
						{
							$sql = "UPDATE ATTENDANCE SET $y2 =  $d42 WHERE sid=$id";	
							$count++;
							if ($conn->query($sql) == TRUE) 
								$count1++;
						}
				
						
						if($d43==0)
						{
							$sql = "UPDATE ATTENDANCE SET $y3 =  $d43 WHERE sid=$id";	
							$count++;
							if ($conn->query($sql) == TRUE) 
								$count1++;
						}
				
			
					if($flag!=5)
					{
						$d=date("d", time() + 86400*4);
						$y1='d'.$d.'_b';
						$y2='d'.$d.'_l';
						$y3='d'.$d.'_d';
						if($d51==0)
						{
							$sql = "UPDATE ATTENDANCE SET $y1 =  $d51 WHERE sid=$id";	
							$count++;
							if ($conn->query($sql) == TRUE) 
								$count1++;
						}
									
						if($d52==0)
						{
							$sql = "UPDATE ATTENDANCE SET $y2 =  $d52 WHERE sid=$id";	
							$count++;
							if ($conn->query($sql) == TRUE) 
								$count1++;
						}
							
						if($d53==0)
						{
							$sql = "UPDATE ATTENDANCE SET $y3 =  $d53 WHERE sid=$id";	
							$count++;
							if ($conn->query($sql) == TRUE) 
								$count1++;
						}
			
						
						
						if($flag!=6)
						{
							$d=date("d", time() + 86400*5);
							$y1='d'.$d.'_b';
							$y2='d'.$d.'_l';
							$y3='d'.$d.'_d';
							if($d61==0)
							{
								$sql = "UPDATE ATTENDANCE SET $y1 =  $d61 WHERE sid=$id";	
								$count++;
								if ($conn->query($sql) == TRUE) 
									$count1++;
							}
			
							if($d62==0)
							{
								$sql = "UPDATE ATTENDANCE SET $y2 =  $d62 WHERE sid=$id";	
								$count++;
								if ($conn->query($sql) == TRUE) 
									$count1++;
							}
							
								
							if($d63==0)
							{
								$sql = "UPDATE ATTENDANCE SET $y3 =  $d63 WHERE sid=$id";
								$count++;
								if ($conn->query($sql) == TRUE) 
									$count1++;
							}
			
								
							
							
							if($flag!=7)
							{
								$d=date("d", time() + 86400*6);
								$y1='d'.$d.'_b';
								$y2='d'.$d.'_l';
								$y3='d'.$d.'_d';
								
								if($d71==0)
								{
									$sql = "UPDATE ATTENDANCE SET $y1 =  $d71 WHERE sid=$id";
									$count++;
									if ($conn->query($sql) == TRUE) 
										$count1++;
								}
								
								if($d72==0)
								{
									$sql = "UPDATE ATTENDANCE SET $y2 =  $d72 WHERE sid=$id";	
									$count++;
									if ($conn->query($sql) == TRUE) 
										$count1++;
								}
								
								if($d73==0)
								{
									$sql = "UPDATE ATTENDANCE SET $y3 =  $d73 WHERE sid=$id";
									$count++;
									if ($conn->query($sql) == TRUE) 
										$count1++;
								}						
							}
						}
					}
				}
			}
		}	
		if($count==$count1)
		{
			echo "<script>
					alert(' YOUR FOOR WILL NOW BE MADE ');
					window.location.href='user_page_student.html';
					</script>";
		
		}
		else
		{
			echo "<script>
					alert('*****ERROR IN UPDATION*****');
					alert('*****PLEASE TRY AGAIN*****');
					
					window.location.href='user_page_student.html';
					</script>";
			
		}
	}
	
?>
	
	
	