<?php
	echo '<?xml version="1.0" encoding="UTF-8"?><!DOCTYPE plist PUBLIC "-//Apple//DTD PLIST 1.0//EN" "http://www.apple.com/DTDs/PropertyList-1.0.dtd"><plist version="1.0"><array>';
	
	
$servername = getenv(strtoupper(getenv("DATABASE_SERVICE_NAME"))."_SERVICE_HOST");
$username = getenv("DATABASE_USER");
$password = getenv("DATABASE_PASSWORD");

// Create connection
$conn = mysqli_connect($servername, $username, $password, "default");
	


if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
	
	/*
	if(isset($_GET['num'])){
		$query = 'SELECT * FROM new WHERE app=\''.$_GET['proc'].'\' ORDER BY date ASC limit '.$_GET['num'].',99999';
	} elseif(isset($_GET['date'])){
		$query = 'SELECT * FROM new where app=\''.$_GET['proc'].'\' and DATE>date(\''.urldecode($_GET['date']).'\') ORDER BY date DESC';
	} else{
		$query = 'SELECT * FROM new WHERE app=\''.$_GET['proc'].'\' ORDER BY date ASC';
	}*/
	
	//name, descript,image,d,loc
	
	$query = 'SELECT * FROM cities limit 10;';
	
	//echo $query;
	//$result = mysqli_query($conn,$query);

    $result = $conn->query($query);
	if (!$result){
        printf("Errormessage: %s\n", $mysqli->error);
		echo "<string>EMPTY $query</string> ".getenv("DATABASE_SERVICE_NAME")." ".getenv("DATABASE_USER");
	} else {
			$num = 1;
			//name 	title 	udid 	image 	about 	gps 	id 	date Ascending 	idate
			while($row = $result->fetch_assoc()) {
					echo '<string>'.$row['name'].'</string>';
				
			}
	} 
	mysqli_close($conn);
	
	echo '</array></plist>';
	
	
	?>