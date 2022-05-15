<?php
date_default_timezone_set('Asia/Seoul');
include "../dbconn.php";
include "../session_start.php";

$title = $_POST['title'];
$date = date('Y-m-d');
$time = date('H:i:s');
if($title){
    $sql = "insert into board_1 (title, id, date, time) values('$title', '$userid', '$date', '$time')"; 
    mysqli_query($conn,$sql);
    mysqli_close($conn);
    echo "<script>
    alert('글쓰기 완료되었습니다.');
    location.href='./board_1.php';</script>";
}else{
    echo "<script>
    alert('글쓰기에 실패했습니다.');
    history.back();</script>";
}
?>