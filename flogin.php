<?php
include "config.php";

session_start();

$id=$_GET['username'];
$pass = $_GET['password'];
/*validating user id password */

$sql="SELECT username, password FROM FLOGIN WHERE username=$id";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
		if($row["password"]==$pass){
			
			//echo "Hello ". $row["user"]."!!";
			header('Location: user_page_faculty.html');
			
			exit;
		}
        else{
			echo "<h1>*****Invalid Username or Password*****</h1>";
		}
    }
} else {
    echo "<h1>*****User not found*****</h1>";
}

?>
