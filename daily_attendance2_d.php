	<html> <body><audio id="song"> <source src="beep.mp3" type="audio/mpeg"> </audio> </body></html>

	<?php
include "config.php";
	session_start();

	$id= $_GET['roll_no'];
	$day= $_SESSION['time'];
	echo"$day";

	//session_start();
	//$_SESSION['username']=$id;

/*first checking food eaten or not*/
$sql="SELECT $day FROM ATTENDANCE WHERE sid=$id";
$result = $conn->query($sql);

if ($conn->connect_error) {
  //  echo "<h1> Outsiders not allowed</h1>"
	die("Connection failed: " . $conn->connect_error);
} 
else
{
echo "Connected successfully";
		if ($result->num_rows>0) {
			while($row = $result->fetch_assoc())
			{
				if($row["$day"]>0)
				{
					
					echo "<script>
					document.bgColor='#ff0000';
					document.getElementById('song').play();
							alert('***You have already eaten food**Go home you are drunk*** :)');
							window.location.href='daily_attendance2_d1.php';
				
							</script>";
				}
				else
				{	
					if($row["$day"]==-1)
					{
						
						$sql = "UPDATE ATTENDANCE SET $day =2 WHERE sid=$id";					
						if ($conn->query($sql) === TRUE) 
						{
							echo "<script>
							document.bgColor='blue';
							alert('***Enjoy Your Food***You will be charged Extra*** :)');
							window.location.href='daily_attendance2_d1.php';
				
							</script>";
							
						}
						else
						{
							echo "Error updating record: " . $conn->error;
						}
					}
					else
					{
						$sql = "UPDATE ATTENDANCE SET $day =1 WHERE sid=$id";

						if ($conn->query($sql) === TRUE) 
						{
													
							echo "<script>
							document.bgColor='green';
							window.location.href='daily_attendance2_d1.php';
				
							</script>";
						} 
						else
						{
						echo "Error updating record: " . $conn->error;
						}

					}
					
				}
			}
		}
		  
		else
		{
			  
				// OUTSIDER FOUND
				echo "<script>
				document.bgColor='#ff0000';
				document.getElementById('song').play();
					alert('***You are not allowed in mess ***');
					window.location.href='daily_attendance2_d1.php';
				
					</script>";
					
		}

			
			
							
						
			
			
			
			
			
			
			
			
			
			
			
			
			}

		
?>