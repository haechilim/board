<!doctype html>

<html>
	<head>
		<title>해치 게시판</title>
		
		<style>
			body {
				margin: 0px;
			}
		
			.write {
				width: 170px;
				height: 80px;
				font-size: 40px;
				padding-top: 25px;
				padding-left: 45px;
				margin-top: 30px;
				margin-right: 30px;
				background: #ff545b;
				border: 1px solid #ff545b;
				color: #fff;
				float: right;
			}
		
			.table {
				margin-top: 30px;
				border-top: #58ACFA 3px solid;
			}
			
			.post{
				width: 100%;
				height: 200px;
				border-bottom: 1px solid #000;
			}
			
			.title {
				width: 100%;
				height: 80px;
				font-size: 40px;
				padding-top: 35px;
				padding-left: 35px;
			}
			
			.additionalElements {
				display: inline;
				height: 60px;
				font-size: 35px;
				margin-top: 5px;
				padding-top: 5px;
				padding-left: 35px;
				color: #848484;
				float: left;
			}
			
			.titleText {
				color: #000;
				text-decoration: none;
			}
			
			.clear {
				clear: both;
			}
		</style>
	</head>
	
	<body>
		<a href="edit.php"><div class="write">글쓰기</div></a>
		<div class="clear"></div>
		
		<div class="table">
			<?php
				$host = 'localhost';
				$user = 'root';
				$pw = 'June0213';
				$dbName = 'june';

				$connect = mysqli_connect($host, $user, $pw, $dbName);

				if($connect){
					$query = "select * from free order by no desc";
					$result = mysqli_query($connect, $query);
					
					while($row = mysqli_fetch_array($result)) {
						echo "<div class='post'>";
							echo "<div class='title'><a class='titleText' href='view.php?no=".$row['no']."'>".$row['title']."</a></div>";
							echo "<div class='additionalElements'>".$row['writer']."</div>";
							echo "<div class='additionalElements'>조회 ".$row['count']."</div>";
							echo "<div class='additionalElements'>".$row['date']."</div>";
						echo "</div>";
					}
				}
			?>
		</div>
	</body>
</html>