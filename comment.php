<?php
	$parentNo = $_POST['no'];
	$content = $_POST['content'];
	$writer = $_POST['writer'];

	$host = 'localhost';
	$user = 'root';
	$pw = 'June0213';
	$dbName = 'june';

	$connect = mysqli_connect($host, $user, $pw, $dbName);

	if($connect){
		$query = 'insert into comment (parent, content, writer, date) values ("'.$parentNo.'", "'.$content.'", "'.$writer.'", now())';
		$result = mysqli_query($connect, $query);
		echo "<meta http-equiv='refresh' content='0; url=/free/view.php?no=".$parentNo."'>";
	}
?>