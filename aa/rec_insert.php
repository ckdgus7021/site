<?php
    session_start();
 
    $userid="";
    $username="";

 
    if( isset($_SESSION['userid'])) $userid= $_SESSION['userid'];
    if( isset($_SESSION['username'])) $username= $_SESSION['username'];

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


    $conn= mysqli_connect('test.crwx1himfqyb.ap-northeast-2.rds.amazonaws.com:3306','admin','shekdms8260','test');
    mysqli_query($conn,"set names utf8");
   
  

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