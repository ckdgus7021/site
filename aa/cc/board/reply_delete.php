<?php
    date_default_timezone_set('Asia/Seoul');
    include "../dbconn.php";
    include "../session_start.php";

    $bno = $_POST['num'];
    $rno = $_POST['rno'];

    
        $sql = "delete from reply where re_num='$rno'";
        mysqli_query($conn,$sql);
        mysqli_close($conn);
        echo "<script>alert('댓글이 삭제되었습니다.'); 
        location.href='/cc/board/board_read.php?num=$bno';</script>";
?>