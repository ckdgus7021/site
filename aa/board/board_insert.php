<?php

include "../dbconn.php";


$title = $_POST['title'];
$content = $_POST['content'];
$date = date('Y-m-d');
if($title && $content){
    $sql = "insert into board(title,content,date) values('$title','$content','$date')"; 
    mysqli_query($conn,$sql);
    mysqli_close($conn);
    echo "<script>
    alert('글쓰기 완료되었습니다.');
    location.href='./board.php';</script>";
}else{
    echo "<script>
    alert('글쓰기에 실패했습니다.');
    history.back();</script>";
}
?>