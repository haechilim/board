<?php
	$title = $_POST['title'];
	$content = $_POST['content'];
	$writer = $_POST['writer'];
	
	$host = 'localhost';
	$user = 'root';
	$pw = 'June0213';
	$dbName = 'june';

	$connect = mysqli_connect($host, $user, $pw, $dbName);

	if($connect){
		$query = 'insert into free (title, contents, writer, count, date) values ("'.$title.'", "'.$content.'", "'.$writer.'", 0, now())';
		$result = mysqli_query($connect, $query);
		echo "<meta http-equiv='refresh' content='0; url=/free/list.php'>";
	}
?>