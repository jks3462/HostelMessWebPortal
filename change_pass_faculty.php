<?php
include "config.php";
$id=$_GET["username"];
$old_pass=$_GET["old_pass"];
$new_pass=$_GET["new_pass"];
$new_pass2=$_GET["new_pass2"];
$sql="SELECT password FROM FLOGIN WHERE username=$id";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()){
		if($row["password"]==$old_pass){
			if($new_pass==$new_pass2){
				$sql2="UPDATE FLOGIN SET password='$new_pass' WHERE username='$id'";
				//$result2=$conn->query($sql2);
				if ($conn->query($sql2) === TRUE) {
					echo "<h2>Password updated successfully</h2>";
				} else {
					echo "<h2>Error updating password </h2>" . $conn->error;
				}
			}
			else
			{
				echo "<h2>Re-enter password does not match</h2>";
			}
		}
        else{
			echo "<h2>Invalid Username or Password</h2>";
		}
	}
} 
else {
    echo "<h2>Username not found</h2>";
}
?>