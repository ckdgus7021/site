<?php
date_default_timezone_set('Asia/Seoul');
include "../dbconn.php";
include "../session_start.php";
$date = date('Y-m-d');
?>
<!doctype html>
<head>
<meta name="viewport" content="user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0, width=device-width" />
<meta charset="UTF-8">
<title>게시판</title>
<link rel="stylesheet" type="text/css" href="./board_read.css" />
<link rel="stylesheet" type="text/css" href="../header.css" />
<link rel="stylesheet" type="text/css" href="./reply.css" />
</head>
<header>
	<?php include "../header.php"; ?>
</header>
<body>
	<?php
		$bno = $_GET['num'];
    	$hit = "UPDATE board set hit = hit + 1 where num='$bno'";
		$hit_result = mysqli_query($conn, $hit);
		$sql = "SELECT * from board where num='$bno'";
        $result = mysqli_query($conn, $sql);
        $board = mysqli_fetch_array($result);
	?>
<!-- 글 불러오기 -->
<div id="board_read">
	<h2><?php echo $board['title']; ?></h2>
		<div id="user_info">
			<?php echo $board['id']; ?>
			<?php if ($board['date']==date('Y-m-d')) { 
				echo $board['time'];
			}else{
				echo $board['date'];
				}?> 
			조회:<?php echo $board['hit']; ?>
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

<div class="reply_view">
	<h3>댓글목록</h3>
		<?php
			$sql = "SELECT * from reply where num='".$bno."' order by re_num asc";
			$result = mysqli_query($conn, $sql);
            while($reply = mysqli_fetch_array($result)){ 
		?>
		<div class="dap_lo">
			<div><b><?php echo $reply['id'];?></b></div>
			<div class="dap_to comt_edit"><?php echo nl2br("$reply[reply]"); ?></div>
			<div class="rep_me dap_to">
				<?php if ($reply['date']==date('Y-m-d')) {
				echo $reply['time'];}
				else{
					echo $reply['date'];
				}
				?><div class="rep_me rep_menu" style="width: 15%;">
				<a class="dat_edit_bt" href="#"><input type="button" value="수정" style="float: left;margin-right: 5px;"></a>
				<form action="./reply_delete.php" name="reply" method="POST">
				<input type="hidden" name="num" value="<?php echo $bno; ?>">
				<input type="hidden" name="rno" value="<?php echo $reply['re_num']; ?>">
				<input type="submit" class="dat_delete_bt" value="삭제">
				</form>
			</div></div>
				
				</div>
			
			<!-- 댓글 수정 폼 dialog -->
			<div class="dat_edit">
				<form method="post" action="rep_modify.php">
					<input type="hidden" name="re_num" value="<?php echo $reply['re_num']; ?>" /><input type="hidden" name="num" value="<?php echo $bno; ?>">
					<textarea name="reply" class="dap_edit_t"><?php echo $reply['reply']; ?></textarea>
					<input type="submit" value="수정하기" class="re_mo_bt">
				</form>
			</div>
		</div>
	<?php } ?>

	<!--- 댓글 입력 폼 -->
	<div class="dap_ins">
		<form action="reply_insert.php?num=<?php echo $bno; ?>" method="post">
			<input type="hidden" name="id" value="<?php $userid ?>">
			<div style="margin-top:10px; ">
				<textarea name="reply" class="reply_content" id="re_content" ></textarea>
				<button id="rep_bt" class="re_bt">댓글</button>
			</div>
		</form>
	</div>
</div>
<div id="foot_box"></div>
</div>

</body>
</html>