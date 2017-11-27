<?php
	echo '<?xml version="1.0" encoding="UTF-8"?><!DOCTYPE plist PUBLIC "-//Apple//DTD PLIST 1.0//EN" "http://www.apple.com/DTDs/PropertyList-1.0.dtd"><plist version="1.0"><array>';
	
	
$servername = getenv(strtoupper(getenv("DATABASE_SERVICE_NAME"))."_SERVICE_HOST");
$username = getenv("DATABASE_USER");
$password = getenv("DATABASE_PASSWORD");

// Create connection
$conn = new mysqli($servername, $username, $password);
	

	
	/*
	if(isset($_GET['num'])){
		$query = 'SELECT * FROM new WHERE app=\''.$_GET['proc'].'\' ORDER BY date ASC limit '.$_GET['num'].',99999';
	} elseif(isset($_GET['date'])){
		$query = 'SELECT * FROM new where app=\''.$_GET['proc'].'\' and DATE>date(\''.urldecode($_GET['date']).'\') ORDER BY date DESC';
	} else{
		$query = 'SELECT * FROM new WHERE app=\''.$_GET['proc'].'\' ORDER BY date ASC';
	}*/
	
	//name, descript,image,d,loc
	
	$query = 'SELECT * FROM cities;';
	
	//echo $query;
	$result = mysqli_query($conn,$query);
	if (!$result){
		echo "<string>EMPTY $query</string> ".getenv("DATABASE_SERVICE_NAME")." ".getenv("DATABASE_USER");
	} else {
		if(mysqli_num_rows($result) > 0){
			$num = 1;
			//name 	title 	udid 	image 	about 	gps 	id 	date Ascending 	idate
			while ($row = mysqli_fetch_assoc($result)){
					echo '<string>'.$row['name'].'</string>';
				
			}
		}
	} 
	mysqli_close($conn);
	
	echo '</array></plist>';
	
	
	?>