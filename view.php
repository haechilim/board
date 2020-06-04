<!doctype html>

<html>
	<head>
		<title>작성 글</title>
		
		<style>
			.titleLine {
				width: 100%;
				height: 300px;
				margin-top: 80px;
				border-top: 1px solid #444;
			}
			
			.title {
				padding-top: 40px;
				padding-left: 40px;
				font-size: 70px;
			}
			
			.writer {
				padding-top: 40px;
				padding-left: 50px;
				font-size: 40px;
			}
			
			.additionalElements {
				font-size: 40px;
				padding-left: 50px;
				float: left;
			}
			
			.contents {
				width: 100%;
				height: 1000px;
				padding: 35px;
				padding-top: 80px;
				font-size: 40px;
				font-weight: bold;
				border: none;
				border-top: 1px solid #444;
			}
			
			.button {
				display: inline;
				width: 100px;
				height: 60px;
				font-size: 35px;
				padding-top: 15px;
				padding-left: 30px;
				border: 1px solid #444;
				color: #444;
			}

			.list {
				margin-top: 40px;
				margin-left: 35px;
			}
			
			.modify {
				margin-top: 40px;
			}
			
			.delete {
				display: inline;
				width: 140px;
				height: 60px;
				font-size: 35px;
				margin-top: 40px;
				margin-left: 35px;
				margin-right: 35px;
				padding-top: 15px;
				padding-left: 30px;
				border: 1px solid #58ACFA;
				background-color: #58ACFA;
				color: #fff;
			}
			
			.positionLeft {
				float: left;
			}
			
			.positionRight {
				float: right;
			}
			
			.commentarea {
				width: 100%;
				padding: 40px;
				border-top: 1px solid #444;
				border-bottom: 1px solid #444;
			}
			
			.comment {
				font-size: 45px;
				margin-bottom: 20px;
			}
			
			.additionalElement {
				display: inline;
				padding-right: 30px;
				font-size: 30px;
			}
			
			.deleteComment {
				font-size: 25px;
			}
			
			.color {
				color: #444;
			}
		</style>
		
	</head>
	
	<body>
		<?php
			$no = $_GET['no'];
		
			$host = 'localhost';
			$user = 'root';
			$pw = 'June0213';
			$dbName = 'june';

			$connect = mysqli_connect($host, $user, $pw, $dbName);

			if($connect){
				$query = "update free set count = count + 1 where no = ".$no;
				$result = mysqli_query($connect, $query);
				
				$query = "SELECT * FROM free where no = ".$no;
				$result = mysqli_query($connect, $query);
				$row = mysqli_fetch_array($result);
				
				$title = $row['title'];
				$content = $row['contents'];
				$writer = $row['writer'];
				
				echo "<div class='titleLine'>";
					echo "<div class='title'>".$title."</div>\n";
					echo "<div class='writer color'>".$writer."</div>\n";
					echo "<div class='additionalElements color'>".$row['date']."</div>\n";
					echo "<div class='additionalElements color'>조회 ".$row['count']."</div>\n";
				echo "</div>";
				echo "<textarea class='contents' readonly>".$content."</textarea>\n";
				
				$query = 'select * from comment where parent="'.$no.'"';
				$result = mysqli_query($connect, $query);
				
				while($row = mysqli_fetch_array($result)) {
					echo "<div class='commentarea'>";
						echo "<div class='comment'>".$row['content']."</div>";
						echo "<div class='additionalElement color'>작성자: ".$row['writer']."</div>";
						echo "<div class='additionalElement color'>작성일: ".$row['date']."</div>";
						echo "<a href='deleteComment.php?no=".$row['no']."&parent=".$row['parent']."'><div class='deleteComment color positionRight'>삭제</div></a>";
					echo "</div>\n";
				}
				
				echo "<a href='list.php'><div class='list button positionLeft'>목록</div></a>";
				echo "<a href='modifyEdit.php?no=".$no."'><div class='modify button positionLeft'>수정</div></a>";
				echo "<a href='commentEdit.php?no=".$no."&title=".$title."'><div class='modify button positionLeft'>답글</div></a>";
				echo "<a href=delete.php?no=".$no."><div class='delete positionRight'>글삭제</div></a>";
			}
		?>
	</body>
</html>