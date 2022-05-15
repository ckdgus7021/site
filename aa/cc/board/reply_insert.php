<?php
    date_default_timezone_set('Asia/Seoul');
    include "../dbconn.php";
    include "../session_start.php";

    $bno = $_GET['num'];
    $reply = $_POST['reply'];
    $date = date('Y-m-d');
    $time = date('H:i:s');
    
    if($bno && $_POST['reply']){
        $sql = "insert into reply (id, reply, num, date, time) values('$userid', '$reply', '$bno', '$date', '$time')";
        mysqli_query($conn,$sql);
        mysqli_close($conn);
        echo "<script>alert('댓글이 작성되었습니다.'); 
        location.href='/cc/board/board_read.php?num=$bno';</script>";
    }else{
        echo "<script>alert('댓글 작성에 실패했습니다.'); 
        history.back();</script>";
    }
	
?>