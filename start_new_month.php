<?php
	include "config.php";

	// VERIFYING THAT IT IS A FACULTY MEMBER AND NOT A INTRUDER
	
$id=$_GET['username_verify'];
$pass = $_GET['password_verify'];
/*validating user id password */

$sql="SELECT username, password FROM FLOGIN WHERE username=$id";
$result = $conn->query($sql);
$count=0;

if ($result->num_rows > 0) {
   $row = $result->fetch_assoc();
   if($row["password"]==$pass){
			
			
			
			$d_last=date('d', strtotime('last day of this month'));
			$d_first=date("01");
			$d=date("d");
			
		
			$time=date("G");
			$z=0;
			$y1='d'.$d.'_b';
			$y2='d'.$d.'_l';
			$y3='d'.$d.'_d';
		
			$sql="SELECT * FROM ATTENDANCE ";
			$result = $conn->query($sql);

			if ($result->num_rows>0)
				{
					//****************  updating dates after the current date
			   
					while($d!=$d_last)//updation will not take place for the first day of the month 
								// we have to do at the ned of the while loop 
					{		
							
							// UPADATING ATTENDANCE TABLE
							$sql1 = "UPDATE ATTENDANCE SET $y1=0";
							$sql2 = "UPDATE ATTENDANCE SET $y2=0";
							$sql3 = "UPDATE ATTENDANCE SET $y3=0";
							
							if ($conn->query($sql1) == TRUE && $conn->query($sql2) == TRUE && $conn->query($sql3) == TRUE )
							{
								$count++;
							
							}   
							// increment day
							$z++;
						
							
							
							$d= date("d", time() + 86400*$z);
							$y1='d'.$d.'_b';
							$y2='d'.$d.'_l';
							$y3='d'.$d.'_d';
							
							
					}
					// updating for the last day of the mont *********************************
							$sql1 = "UPDATE ATTENDANCE SET $y1=0";
							$sql2 = "UPDATE ATTENDANCE SET $y2=0";
							$sql3 = "UPDATE ATTENDANCE SET $y3=0";
							$count++;
							
					
					
					//****************  updating dates prev from the current date*********************************************
					$d_last=date('d', strtotime('last day of this month'));
					
					$d=date("d");
					
					$z=0;
					$y1='d'.$d.'_b';
					$y2='d'.$d.'_l';
					$y3='d'.$d.'_d';
							
					while($d!=$d_first)//updation will not take place for the first day of the month 
								// we have to do at the ned of the while loop 
					{		
							
							// UPADATING ATTENDANCE TABLE
							$sql1 = "UPDATE ATTENDANCE SET $y1=0";
							$sql2 = "UPDATE ATTENDANCE SET $y2=0";
							$sql3 = "UPDATE ATTENDANCE SET $y3=0";
							
							if ($conn->query($sql1) == TRUE && $conn->query($sql2) == TRUE && $conn->query($sql3) == TRUE )
							{
								$count++;
							
							}   
							// increment day
							$z++;
						
							
						
							$d= date("d", time() - 86400*$z);
							$y1='d'.$d.'_b';
							$y2='d'.$d.'_l';
							$y3='d'.$d.'_d';
							
							
					}
					// updating for the last day of the mont *********************************
							$sql1 = "UPDATE ATTENDANCE SET $y1=0";
							$sql2 = "UPDATE ATTENDANCE SET $y2=0";
							$sql3 = "UPDATE ATTENDANCE SET $y3=0";
							$count++;
							
					
					
					
					$sql="SELECT * FROM REGISTRATION ";
					$result = $conn->query($sql);

					if ($result->num_rows>0)
					{
						$sql4 = "UPDATE REGISTRATION SET bill=0";
						$sql5 = "UPDATE REGISTRATION SET bill_upto=0";
					
					$count=$count-1;  // beacause the current date is updates 2wice in both while loops 
					if ($conn->query($sql4) == TRUE && $conn->query($sql5) == TRUE && $count==$d_last)
					{
						echo "<script>
								alert('*****New Month record Created');
					
								window.location.href='user_page_faculty.html';
								</script>";
						
					}
					}
					
					
							
				}
				else
				{
					echo "<script>
								alert('*****ERROR IN UPDATION22222*****');
								alert('*****PLEASE TRY AGAIN*****');
					
								window.location.href='user_page_faculty.html';
								</script>";
				}
		}
        else
		{
			echo "<script>
								alert('****Invalid Username or Password****');
								
					
								window.location.href='user_page_faculty.html';
								</script>";
		}
}  
else
{
   echo "<script>
								alert('*****Faculty bot found*****');
					
								window.location.href='user_page_faculty.html';
								</script>";
}

?>