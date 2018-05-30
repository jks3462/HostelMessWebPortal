
<?php
/*
$servername = "localhost";
		$username = "root";
		$password = "";
		$dbname="pecfest";
		*/
		include "config.php";
		
	//	$conn = mysqli_connect($servername, $username, $password, $dbname);


		// define variables and set to empty values
		function PostRequest($url, $referer, $_data)
		{
			 // convert variables array to string:
			 $data = array();
			 while(list($n,$v) = each($_data)){
			 $data[] = "$n=$v";
			 }
			 $data = implode('&', $data);
			 // format --> test1=a&test2=b etc.
			 // parse the given URL
			 $url = parse_url($url);
			 if ($url['scheme'] != 'http') {
			 die('Only HTTP request are supported !');
			 }
			 // extract host and path:
			 $host = $url['host'];
			 $path = $url['path'];
			 // open a socket connection on port 80
			 $fp = fsockopen($host, 80);
			 // send the request headers:
			 fputs($fp, "POST $path HTTP/1.1\r\n");
			 fputs($fp, "Host: $host\r\n");
			 fputs($fp, "Referer: $referer\r\n");
			 fputs($fp, "Content-type: application/x-www-form-urlencoded\r\n");
			 fputs($fp, "Content-length: ". strlen($data) ."\r\n");
			 fputs($fp, "Connection: close\r\n\r\n");
			 fputs($fp, $data);
			 $result = '';
			 while(!feof($fp)) {
			 // receive the results of the request
			 $result .= fgets($fp, 128);
			 }
			 // close the socket connection:
			 fclose($fp);
			 // split the result header from the content
			 $result = explode("\r\n\r\n", $result, 2);
			 $header = isset($result[0]) 
			 
			 
			 ? $result[0] : '';
			 $content = isset($result[1]) ? $result[1] : '';
			 // return as array:
			 return array($header, $content);
		}
 
									 //***************************************************************************************************************************	
						//***************************************************************************************************************************	
						//***************************************************************************************************************************	
						//############################			END OF 	SENDING MESSAGE   ###############################################################		




	
			//	$phone=$row['tempid'];
				// WE HAVE NOW GOT THE ID....NNOW THIS ID WILL BE SENT TO MOBILE NUMBER OF THE PARTICIPANT
				//**********************************************************************************************
				//***************************************************************************************************************************	
								//############################				SENDING MESSAGE   ###############################################################				
									
				if ($_SERVER["REQUEST_METHOD"] == "POST")
				{
						$count=0;	
					$seconds=0;
				ini_set('max_execution_time', 3000);
					$sql="SELECT * FROM REGISTRATION";
					$result = $conn->query($sql);
					
						while($row = $result->fetch_assoc())
						{
								
							$phone=$row['phone'];
							$bill=$row['bill'];
							$bill_upto=$row['bill_upto'];
						
							$name=$row['name'];
						
									$phone1="91"."$phone";
									 
								 
									$data = array(
									 'user' => "getjatin2010",
									 'password' => "391734",
									 'msisdn' => $phone1,
									// 'msisdn' => "919041092408",
									 'sid' => "PECCHD",
									 'msg' => "Your PECFEST ID is : $bill . Please validate your PECFEST ID.",
									 'fl' =>"0",
									 'gwid'=>"2",
									 );

									list($header, $content) = PostRequest(
									 "http://www.smslane.com//vendorsms/pushsms.aspx", // the url to post to
									 "http://pecfest.in/final.php", // its your url
									 $data
									 );
									 echo "<br/>$phone1<br/>";
									 $count++;
									 echo "$content<br/>";
									 echo "$count";
						}
		
									 
											 
											 //***************************************************************************************************************************	
								//***************************************************************************************************************************	
								//***************************************************************************************************************************	
								//############################			END OF 	SENDING MESSAGE   ##############################################################
		
		
				}
				else
				{
								echo "not DONE";
				}
			echo "DONE";
	
		?>



