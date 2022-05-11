<?php
	include "../dbconn.php";
	
	$bno = $_GET['num'];
	$sql = "delete from board where num='$bno';";
    mysqli_query($conn, $sql);
    mysqli_close($conn);
?>
<script type="text/javascript">alert("삭제되었습니다.");</script>
<meta http-equiv="refresh" content="0 url=./board.php" />