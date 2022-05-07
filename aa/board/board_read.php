<?php
	include "../dbconn.php";
?>
<!doctype html>
<head>
<meta charset="UTF-8">
<title>게시판</title>
<link rel="stylesheet" type="text/css" href="./board_read.css" />
</head>
<body>
	<?php
		$bno = $_GET['num'];
		$sql = "select * from board where num='$bno'";
        $result = mysqli_query($conn, $sql);
        $board = mysqli_fetch_array($result);
	?>
<!-- 글 불러오기 -->
<div id="board_read">
	<h2><?php echo $board['title']; ?></h2>
		<div id="user_info">
			<?php echo $board['id']; ?> <?php echo $board['date']; ?> 조회:
				<div id="bo_line"></div>
			</div>
			<div id="bo_content">
				<?php echo nl2br("$board[content]"); ?>
			</div>
	<!-- 목록, 수정, 삭제 -->
	<div id="bo_ser">
		<ul>
			<li><a href="/">[목록으로]</a></li>
			<li><a href="board_modify.php?num=<?php echo $board['num']; ?>">[수정]</a></li>
			<li><a href="board_delete.php?num=<?php echo $board['num']; ?>">[삭제]</a></li>
		</ul>
	</div>
</div>
</body>
</html>