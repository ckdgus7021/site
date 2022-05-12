<?php
date_default_timezone_set('Asia/Seoul');
include "../dbconn.php";
include "../session_start.php";
?>
<!doctype html>
<head>
<meta name="viewport" content="user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0, width=device-width" />
<meta charset="UTF-8">
<title>게시판</title>
<link rel="stylesheet" type="text/css" href="./board_read.css" />
<link rel="stylesheet" type="text/css" href="../header.css" />
</head>
<header>
	<?php include "../header.php"; ?>
</header>
<body>
	<?php
		$bno = $_GET['num'];
		$hit = $_POST['hit'];
		$sql= "SELECT * FROM hit WHERE id='$userid' and num='$bno'";
    	$result=mysqli_query($conn, $sql);
    	$rowNum= mysqli_num_rows($result);

		if($rowNum){
		}
		else{
		$sql= "INSERT INTO hit(num, id, hit) VALUES('$bno', '$userid','$hit')";
    	mysqli_query($conn,$sql);
		}
		$sql = "SELECT board.num, board.title, board.content, board.id, board.date, sum(hit) from board left join hit on board.num=hit.num where board.num='$bno'";
        $result = mysqli_query($conn, $sql);
        $board = mysqli_fetch_array($result);
	?>
<!-- 글 불러오기 -->
<div id="board_read">
	<h2><?php echo $board['title']; ?></h2>
		<div id="user_info">
			<?php echo $board['id']; ?> <?php echo $board['date']; ?> 조회:<?php echo $board['sum(hit)']; ?>
				<div id="bo_line"></div>
			</div>
			<div id="bo_content">
				<?php echo nl2br("$board[content]"); ?>
			</div>
	<!-- 목록, 수정, 삭제 -->
	<div id="bo_ser">
		<ul>
			<li><a href="/cc/board/board.php">[목록으로]</a></li>
			<?php if ($userid==$board['id']) {?>
			<li><a href="board_modify.php?num=<?php echo $board['num']; ?>">[수정]</a></li>
			<li><a href="board_delete.php?num=<?php echo $board['num']; ?>">[삭제]</a></li>
			<?php } else {}?>
		</ul>
	</div>
</div>
</body>
</html>