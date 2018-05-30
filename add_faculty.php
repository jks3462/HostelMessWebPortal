<?php
include "config.php";

	$id= $_GET['user'];

					
				// INSERTING IN FLOGIN TABLE
				$sql = "INSERT INTO FLOGIN (username,password)
				VALUES ('$id','$id')";

				if ($conn->query($sql) === TRUE) {
					echo "  New record created successfully IN FACULTY LOGIN TABLE";
					}
				else 
					{
					echo "Error: " . $sql . "<br>" . $conn->error;
					}
					
					
					
					
					
					
					
					
					
echo "<h1>Successfully Registered</h1>";
	
?>