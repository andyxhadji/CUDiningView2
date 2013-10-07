<?php
  
	$con = mysql_connect("localhost","cudining_root","Gallonofphp1!");

	if (!$con)
		die('Could not connect: ' . mysql_error());
	mysql_select_db("cudining_cudv", $con);
	ini_set('mysql.connect_timeout', 500); 
	$selectQuery = "SELECT (DATE_FORMAT(NOW(),'%Y%m%d%H')*100 
+ 15*FLOOR(DATE_FORMAT(NOW(),'%i')/15))*100 FROM dual";
	$result = mysql_query($selectQuery);
	print_r("Result:");
	echo mysql_result($result, 0); 
	print_r("\n");


	
	$file_location =  mysql_result($result, 0) . ".csv";
	print_r("File location:" . $file_location . "\n");
	$insertQuery = "INSERT INTO modelcounts (count_time) VALUES 
(CURRENT_TIMESTAMP + INTERVAL 3 HOUR)";
	print_r($insertQuery . "\n");	
	mysql_query($insertQuery);
	print_r("ERROR:" . mysql_error() . "\n\n");
	$row = 1;

	if (($handle = fopen($file_location, "r")) !== FALSE) {
		while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
			$num = count($data);
			echo "<p> $num fields in line $row: <br /></p>\n";
			$row++;
			$hallname = "";
			for ($c=0; $c < $num; $c++) {
				echo $data[$c] . "<br />\n";
			}
			if($data[0]=="Ferris Booth Commons"){
				print_r("Found Ferris Booth Commons data \n");
				$hallname = "FER";
			}
		
			if($data[0]=="John Jay"){
				print_r("Found John Jay data \n");
				$hallname = "JAY";
			}
		
			if($data[0]=="JJ's Place"){
				print_r("Found JJ's Place data \n");
				$hallname = "JJP";
			}
			$updateQuery = "UPDATE modelcounts SET " . $hallname . " = 
" . $data[1] . " WHERE count_time >= CURRENT_TIMESTAMP - INTERVAL 1 MINUTE";
			print_r($updateQuery . "\n");	
			mysql_query($updateQuery);
			print_r("ERROR:" . mysql_error() . "\n");

		}
    fclose($handle);
	//$deleted = unlink ($file_location);
	//print_r("DELETE FILE RESULT: " . $deleted);
	mysql_close($con);
}



?>
