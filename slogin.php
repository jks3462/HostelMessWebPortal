<?php
include "config.php";

session_start();

$id=$_GET['username'];
$pass = $_GET['password'];
$_SESSION['user']=$id;
/*validating user id password */

$sql="SELECT username, password FROM SLOGIN WHERE username=$id";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
		if($row["password"]==$pass){
			
			$_SESSION['username']=$id;
			//echo "Hello ". $row["user"]."!!";
			header('Location: user_page_student.html');
			
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
