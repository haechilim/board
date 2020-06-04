<?php
	$host = 'localhost';
    $user = 'root';
    $pw = 'June0213';
    $dbName = 'june';

	$connect = mysqli_connect($host, $user, $pw, $dbName);

    if($connect){
        $query = "SELECT * FROM free"; 
		$result = mysqli_query($connect, $query); 
		
		while($row = mysqli_fetch_array($result)) {
			echo $row['no']."   ".$row['title']."<br/>";
		}
    }
	else{}
?>
