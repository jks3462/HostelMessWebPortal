<?php
include "config.php";

	$nam= $_GET['nam'];
	$id= $_GET['roll_no'];
	$yr= $_GET['yr'];
	$phon= $_GET['phon'];
	
	
/*checking that sid entered exists already pr not*/
$sql="SELECT sid FROM REGISTRATION WHERE sid=$id";
$result = $conn->query($sql);

if ($result->num_rows>0) {
   
			echo "<h1>Student already registered</h1>";
		}
    else {
  

					//INSERTING IN REGISTRATION TABLE
				$sql = "INSERT INTO REGISTRATION (name, sid,year,phone,bill,bill_upto)
				VALUES ('$nam',$id,$yr,$phon,0,0)";

				if ($conn->query($sql) === TRUE) {
					//echo "New record created successfully IN REGISTRATION";
				} else {
					echo "Error in REGISTRATION table Entry: " . $sql . "<br>" . $conn->error;
				}
			date_default_timezone_set("Asia/Kolkata");
			$time=date("G");
			$dat=date("d-m-y");
			$d=date("d");
			$value=array();
			for($i=0;$i<93;$i++)
				$value[$i]=0;
			for($i=0;$i<3*($d-1);$i++)
				$value[$i]=-1;
			$k=0;
			
					//INSERTING IN ATTENDANCE TABLE
				$sql = "INSERT INTO ATTENDANCE (sid, d01_b ,	d01_l ,d01_d ,d02_b ,d02_l , d02_d ,d03_b ,d03_l ,d03_d ,d04_b ,d04_l ,d04_d ,d05_b ,d05_l ,d05_d ,d06_b ,d06_l ,d06_d  ,d07_b ,d07_l ,d07_d  ,d08_b  ,d08_l ,d08_d ,d09_b,d09_l  ,d09_d  ,d10_b  ,	d10_l  ,d10_d ,	d11_b ,	d11_l ,	d11_d ,	d12_b ,	d12_l,	d12_d ,	d13_b ,	d13_l  ,	d13_d  ,	d14_b ,	d14_l  ,		d14_d  ,	d15_b  ,	d15_l ,	d15_d ,	d16_b  ,d16_l ,	d16_d ,	d17_b,d17_l,d17_d ,	d18_b ,	d18_l ,	d18_d ,	d19_b ,	d19_l ,	d19_d ,	d20_b ,	d20_l ,	d20_d ,d21_b ,d21_l ,d21_d ,d22_b ,d22_l ,d22_d ,d23_b ,d23_l ,d23_d ,d24_b ,d24_l ,d24_d ,d25_b ,d25_l ,d25_d ,d26_b ,d26_l ,d26_d ,	d27_b ,d27_l ,d27_d ,d28_b ,d28_l ,d28_d ,d29_b ,d29_l ,d29_d ,d30_b ,d30_l ,d30_d ,d31_b ,d31_l ,d31_d)
				VALUES ($id,$value[0],$value[1],$value[2],$value[3],$value[4],$value[5],$value[6],$value[7],$value[8],$value[9],$value[10],$value[11],$value[12],$value[13],$value[14],$value[15],$value[16],$value[17],$value[18],$value[19],$value[20],$value[21],$value[22],$value[23],$value[24],$value[25],$value[26],$value[27],$value[28],$value[29],$value[30],$value[31],$value[32],$value[33],$value[34],$value[35],$value[36],$value[37],$value[38],$value[39],$value[40],$value[41],$value[42],$value[43],$value[44],$value[45],$value[46],$value[47],$value[48],$value[49],$value[50],$value[51],$value[52],$value[53],$value[55],$value[56],$value[57],$value[58],$value[59],$value[60],$value[61],$value[61],$value[62],$value[63],$value[64],$value[65],$value[66],$value[67],$value[68],$value[69],$value[70],$value[71],$value[72],$value[73],$value[74],$value[75],$value[76],$value[77],$value[78],$value[79],$value[80],$value[81],$value[82],$value[83],$value[84],$value[85],$value[86],$value[87],$value[88],$value[89],$value[90],$value[91],$value[92])";

				if ($conn->query($sql) === TRUE) {
					//echo "New record created successfully IN ATTENDANCE";
				} else {
					echo "Error in attendance table entry: " . $sql . "<br>" . $conn->error;
				}



					
				// INSERTING IN PASSWORD TABLE
				$sql = "INSERT INTO SLOGIN (username,password)
				VALUES ($id,$id)";

				if ($conn->query($sql) === TRUE) {
					//echo "  New record created successfully IN STUDENT LOGIN TABLE";
					}
				else 
					{
					echo "Error in inserting in STUDENT LOGIN: " . $sql . "<br>" . $conn->error;
					}
					
					
					
					
					
					
				echo "<script>
					alert('*****SUCCESSFULLY REGISTERED****');
					
					window.location.href='index.html';
					</script>";
	}
?>