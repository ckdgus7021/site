<?php
    include "./session_start.php"

    $restaurant=$_POST['restaurant'];
    $star=$_POST['star'];

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
   
    $sql= "SELECT * FROM star WHERE id='$userid' and restaurant='$restaurant'";
    $result=mysqli_query($conn, $sql);
    $rowNum= mysqli_num_rows($result);

    if($rowNum){
        $sql= "UPDATE star SET star='$star' where id='$userid' and restaurant='$restaurant'";
        mysqli_query($conn,$sql);
        mysqli_close($conn);

        echo "
            <script>
            alert('완료');
            window.location = document.referrer;
            </script>
        ";
    }
    else{
        $sql= "INSERT INTO star(restaurant, id, star) VALUES('$restaurant','$userid','$star')";
 
        mysqli_query($conn,$sql);
        mysqli_close($conn);

        echo "
        <script>
        alert('완료');
        window.location = document.referrer;
        </script>
        ";
    }
?>