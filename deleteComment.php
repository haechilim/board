<?php
	$no = $_GET['no'];
	$parentNo = $_GET['parent'];
	
	$host = 'localhost';
	$user = 'root';
	$pw = 'June0213';
	$dbName = 'june';

	$connect = mysqli_connect($host, $user, $pw, $dbName);

	if($connect){
		$query = 'delete from comment where no="'.$no.'"';
		$result = mysqli_query($connect, $query);
		echo "<meta http-equiv='refresh' content='0; url=/free/view.php?no=".$parentNo."'>";
	}
?>