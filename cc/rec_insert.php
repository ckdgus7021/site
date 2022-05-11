<?php
    include "../session_start.php";

    $restaurant=$_POST['restaurant'];
    $rec=$_POST['rec'];
    $menu=$_POST['menu'];
    $date = date('Y-m-d');;

    if (!$userid){
        echo("
        <script>
        alert('로그인 후 이용해주세요.');
        history.back();
        </script>
        ");
        exit;
    }


    include "../dbconn.php";
   
  

    $sql= "INSERT INTO rec(restaurant, menu, id, recommend, date) VALUES('$restaurant','$menu','$userid','$rec', '$date')";
 
    mysqli_query($conn,$sql);
    mysqli_close($conn);

    echo "
        <script>
        alert('완료');
        window.location = document.referrer;
        </script>
    ";

?>