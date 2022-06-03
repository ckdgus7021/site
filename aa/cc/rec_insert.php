<?php
    include "./session_start.php";

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


    include "./dbconn.php";
   
    $sql= "SELECT * FROM rec WHERE id='$userid' and menu='$menu'";
    $result=mysqli_query($conn, $sql);
    $rowNum= mysqli_num_rows($result);
    if ($rowNum){
        $sql = "DELETE from rec where id='$userid' and menu='$menu'";
        mysqli_query($conn,$sql);
        mysqli_close($conn);
        echo "
        <script>
        window.location = document.referrer;
        </script>
    ";
    }else{
    $sql= "INSERT INTO rec(restaurant, menu, id, recommend, date) VALUES('$restaurant','$menu','$userid','$rec', '$date')";
 
    mysqli_query($conn,$sql);
    mysqli_close($conn);

    echo "
        <script>
        window.location = document.referrer;
        </script>
    ";
    }
    

?>