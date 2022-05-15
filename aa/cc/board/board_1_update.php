<?php
include "../dbconn.php";

$bno = $_GET['num'];
$title = $_POST['title'];
$sql = "update board_1 set title='$title' where num='$bno'";
mysqli_query($conn,$sql);
mysqli_close($conn);
?>

<script type="text/javascript">alert("수정되었습니다."); </script>
<meta http-equiv="refresh" content="0 url=./board_1.php?idx=<?php echo $bno; ?>">