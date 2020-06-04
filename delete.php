<?php
	$no = $_GET['no'];
	
	$host = 'localhost';
	$user = 'root';
	$pw = 'June0213';
	$dbName = 'june';

	$connect = mysqli_connect($host, $user, $pw, $dbName);

	if($connect){
		$query = "delete from free where no = ".$no;
		$result = mysqli_query($connect, $query);
		echo "<meta http-equiv='refresh' content='0; url=/free/list.php'>";
	}
?>