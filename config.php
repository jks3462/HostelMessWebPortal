<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname="mess";

// Create connection
$conn = new mysqli($servername, $username, $password);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
//echo "Connected successfully";
/*
// Create database
$sql = "CREATE DATABASE mess";
if ($conn->query($sql) === TRUE) {
    echo "Database created successfully";
} else {
    echo "Error creating database: " . $conn->error;
}
*/


//CREATING TABLES

// sql to create registration  table


/*
		$sql = "CREATE TABLE REGISTRATION (
		name CHAR(20) NOT NULL,
		sid INT NOT NULL,
		year INT NOT NULL ,
		phone CHAR(20) NOT NULL ,
		bill int ,
		bill_upto int
		)";

		if ($conn->query($sql) === TRUE) {
			echo "REGISTRATION Table created successfully";
		} else {
			echo "Error creating REGISTRATION table: " . $conn->error;
		}




// sql to create table



		$sql = "CREATE TABLE ATTENDANCE (
		sid INT NOT NULL,
		d01_b INT ,
		d01_l INT ,
		d01_d INT ,
		d02_b INT ,
		d02_l INT ,
		d02_d INT ,
		d03_b INT ,
		d03_l INT ,
		d03_d INT ,
		d04_b INT ,
		d04_l INT ,
		d04_d INT ,
		d05_b INT ,
		d05_l INT ,
		d05_d INT ,
		d06_b INT ,
		d06_l INT ,
		d06_d INT ,
		d07_b INT ,
		d07_l INT ,
		d07_d INT ,
		d08_b INT ,
		d08_l INT ,
		d08_d INT ,
		d09_b INT ,
		d09_l INT ,
		d09_d INT ,
		d10_b INT ,
		d10_l INT ,
		d10_d INT ,
		d11_b INT ,
		d11_l INT ,
		d11_d INT ,
		d12_b INT ,
		d12_l INT ,
		d12_d INT ,
		d13_b INT ,
		d13_l INT ,
		d13_d INT ,
		d14_b INT ,
		d14_l INT ,
		d14_d INT ,
		d15_b INT ,
		d15_l INT ,
		d15_d INT ,
		d16_b INT ,
		d16_l INT ,
		d16_d INT ,
		d17_b INT ,
		d17_l INT ,
		d17_d INT ,
		d18_b INT ,
		d18_l INT ,
		d18_d INT ,
		d19_b INT ,
		d19_l INT ,
		d19_d INT ,
		d20_b INT ,
		d20_l INT ,
		d20_d INT ,
		d21_b INT ,
		d21_l INT ,
		d21_d INT ,
		d22_b INT ,
		d22_l INT ,
		d22_d INT ,
		d23_b INT ,
		d23_l INT ,
		d23_d INT ,
		d24_b INT ,
		d24_l INT ,
		d24_d INT ,
		d25_b INT ,
		d25_l INT ,
		d25_d INT ,
		d26_b INT ,
		d26_l INT ,
		d26_d INT ,
		d27_b INT ,
		d27_l INT ,
		d27_d INT ,
		d28_b INT ,
		d28_l INT ,
		d28_d INT ,
		d29_b INT ,
		d29_l INT ,
		d29_d INT ,
		d30_b INT ,
		d30_l INT ,
		d30_d INT ,
		d31_b INT ,
		d31_l INT ,
		d31_d INT 
		
		)";

		if ($conn->query($sql) === TRUE) {
			echo "attendance Table created successfully";
		} else {
			echo "Error creating attendance table: " . $conn->error;
		}


		
		// creating table for 7 days of next month
		
				$sql = "CREATE TABLE NEW_ATTENDANCE (
		sid INT NOT NULL,
		d01_b INT ,
		d01_l INT ,
		d01_d INT ,
		d02_b INT ,
		d02_l INT ,
		d02_d INT ,
		d03_b INT ,
		d03_l INT ,
		d03_d INT ,
		d04_b INT ,
		d04_l INT ,
		d04_d INT ,
		d05_b INT ,
		d05_l INT ,
		d05_d INT ,
		d06_b INT ,
		d06_l INT ,
		d06_d INT 
		
		)";

		if ($conn->query($sql) === TRUE) {
			echo "Next month attendance Table created successfully";
		} else {
			echo "Error creating next month attendance table: " . $conn->error;
		}

	
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		

// creating STUDENT LOGIN table
		// sql to create table
		$sql = "CREATE TABLE SLOGIN (
		username INT NOT NULL,
		password CHAR(20) NOT NULL 

		)";

		if ($conn->query($sql) === TRUE) {
			echo "STUDENT LOGIN Table created successfully";
		} else {
			echo "Error creating STUDENT LOGIN table: " . $conn->error;
		}



// CREATING FACULTY LOGIN TABLE
	// sql to create table
		$sql = "CREATE TABLE FLOGIN (
		username CHAR(20) NOT NULL,
		password CHAR(20) NOT NULL 

		)";

		if ($conn->query($sql) === TRUE) {
			echo "FACULTY LOGIN Table created successfully";
		} else {
			echo "Error creating FACULTY LOGIN table: " . $conn->error;
		}

*/

$conn->query("use mess");




?>