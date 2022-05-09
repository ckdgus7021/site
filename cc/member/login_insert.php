<DOCTYPE! HTML>
    <html>
        <head>
        <meta name="viewport" content="user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0, width=device-width" />
        <meta charset="UTF-8">
        <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
</head>

<?php
 
    $id= $_POST['id'];
    $pass= $_POST['password'];

    if(!$id){
        echo('
        <script>
        swal("","아이디를 입력하세요.", "warning")
        .then(() => {
        window.history.back();
        });
        </script>
        ');
        exit;
    }
    if(!$pass){
        echo('
        <script>
        swal("","비밀번호를 입력하세요.", "warning")
        .then(() => {
        window.history.back();
        });
        </script>
        ');
        exit;
    }

  $conn= mysqli_connect('test.crwx1himfqyb.ap-northeast-2.rds.amazonaws.com:3306','admin','shekdms8260','test');
  mysqli_query($conn,"set names utf8");

    $sql= "SELECT * FROM user WHERE id='$id' and password='$pass'";
    $result= mysqli_query($conn,$sql);
    $rowNum= mysqli_num_rows($result);

    if(!$rowNum){
        echo('
        <script>
        swal("","아이디와 비밀번호를 확인하세요.", "warning")
        .then(() => {
        window.history.back();
        });
        </script>
        ');
        exit;
    }
 
    $row=mysqli_fetch_array($result, MYSQLI_ASSOC);
 
    session_start();
    $_SESSION['userid']=$row['id'];
    $_SESSION['username']=$row['name'];
    $_SESSION['userpass']=$row['password'];
    $_SESSION['useremail']=$row['email'];

    echo "
        <script>
        window.location = history.go(-2);
        </script>
    ";
 
?>
</html>