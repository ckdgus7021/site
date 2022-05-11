<?php
date_default_timezone_set('Asia/Seoul');
include "../dbconn.php";
include "../session_start.php";

$memo = $_POST['memo'];
$date = date('Y-m-d');
if($userid){
    $sql = "insert into memo(id, memo) values('$userid','$memo')"; 
    mysqli_query($conn,$sql);
    mysqli_close($conn);
    echo "<script>
    alert('글쓰기 완료되었습니다.');
    location.href='./memo.php';</script>";
}else{
    echo "<script>
    alert('로그인 후 이용해주세요.');
    history.back();</script>";
}
?>