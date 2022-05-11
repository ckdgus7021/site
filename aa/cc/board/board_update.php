<?php
include "../dbconn.php";

$bno = $_GET['num'];
$title = $_POST['title'];
$content = $_POST['content'];
$sql = "update board set title='$title',content='$content' where num='$bno'";
mysqli_query($conn,$sql);
mysqli_close($conn);
?>

<script type="text/javascript">alert("수정되었습니다."); </script>
<meta http-equiv="refresh" content="0 url=./board_read.php?idx=<?php echo $bno; ?>">