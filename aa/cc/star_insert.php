<DOCTYPE! HTML>
    <html>
<head>
<meta name="viewport" content="user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0, width=device-width" />
<meta charset="UTF-8">
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
</head>
<?php
    include "./session_start.php";

    $restaurant=$_POST['restaurant'];
    $star=$_POST['star'];

    if (!$userid){
        echo('
        <script>
        swal("","로그인 후 이용해주세요.", "warning")
        .then(() => {
        window.history.back();
        });
        </script>
        ');
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
</html>