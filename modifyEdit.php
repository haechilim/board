<!doctype html>

<html>
	<head>
		<title>새 글 작성</title>
		
		<style>
			.titleBox {
				width: 800px;
				height: 50px;
				font-size: 40px;
				padding: 9px 35px 10px 10px;
				margin-left: 50px;
				margin-top: 40px;
				border: 1px solid #444;
			}
			
			.contentsBox {
				width: 800px;
				height: 800px;
				font-size: 40px;
				padding: 9px 35px 10px 10px;
				border: 1px solid #444;
				margin-left: 50px;
				margin-top: 40px;
			}
			
			.writerBox {
				width: 400px;
				height: 50px;
				font-size: 40px;
				padding: 9px 35px 10px 10px;
				margin-left: 50px;
				margin-top: 40px;
				border: 1px solid #444;
			}
			
			.cancel {
				display: inline;
				width: 100px;
				height: 60px;
				font-size: 35px;
				margin-top: 40px;
				margin-left: 50px;
				padding-top: 15px;
				padding-left: 30px;
				border: 1px solid #444;
				color: #444;
				float: left;
			}
			
			.write {
				display: inline;
				width: 130px;
				height: 76px;
				font-size: 35px;
				margin-top: 40px;
				margin-right: 70px;
				border: 1px solid #444;
				color: #444;
				background-color: #fff;
				float: right;
			}
			
			.hide {
				display: none;
			}
			
			.clear {
				clear: both;
			}
		</style>
		
		<script>
			function isEmpty() {
				var titleValue = document.getElementById("title").value;
				var contentsValue = document.getElementById("content").value;
				var writerValue = document.getElementById("writer").value;
				
				if(titleValue.length != 0 && contentsValue.length != 0 && writerValue.length != 0) return true;
				else {
					if(titleValue.length == 0) alert("제목을 입력해주세요");
					else if(contentsValue.length == 0) alert("내용을 입력해주세요");
					else alert("작성자를 입력해주세요");
					return false;
				}
			}
		</script>
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
				$query = "SELECT * FROM free where no = ".$no;
				$result = mysqli_query($connect, $query);
				$row = mysqli_fetch_array($result);
				
				$title = $row['title'];
				$content = $row['contents'];
				$writer = $row['writer'];
		
				echo "<form action='modify.php' method='post' onsubmit='return isEmpty();'>";
					echo "<input class='hide' name='no' value='".$no."'></input>";
					echo "<input class='titleBox' id='title' name='title' value='".$title."'></input>";
					echo "<textarea class='contentsBox' id='content' name='content'>".$content."</textarea>";
					echo "<input class='writerBox' id='writer' name='writer' value='".$writer."'></input>";
					echo "<div>";
						echo "<a href='list.php'><div class='cancel'>취소</div></a>";
						echo "<input class='write' type='submit' value='수정'></input>";
					echo "</div>";
				echo "<from>";
			}
		?>
	</body>
</html>