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
    $pass_confirm= $_POST['pass_confirm'];
    $name= $_POST['name'];
    $email1= $_POST['email1'];
    $email2= $_POST['email2'];
    $email= $email1 . "@" . $email2;
    $registday= date("Y-m-d H:i");



    if (!$id){
        echo('
        <script>
        swal("","아이디를 입력해주세요.", "warning")
        .then(() => {
        window.history.back();
        });
        </script>
        ');
        exit;
    }
    if (!$pass){
        echo('
        <script>
        swal("","비밀번호를 입력해주세요.", "warning")
        .then(() => {
        window.history.back();
        });
        </script>
        ');
        exit;
    }
    if (!$name){
        echo('
        <script>
        swal("","이름을 입력해주세요.", "warning")
        .then(() => {
        window.history.back();
        });
        </script>
        ');
        exit;
    }
    if (!$email1){
        echo('
        <script>
        swal("","이메일을 입력해주세요.", "warning")
        .then(() => {
        window.history.back();
        });
        </script>
        ');
        exit;
    }
    if (!$email2){
        echo('
        <script>
        swal("","이메일을 입력해주세요.", "warning")
        .then(() => {
        window.history.back();
        });
        </script>
        ');
        exit;
    }
    if ($pass!=$pass_confirm){
        echo('
        <script>
        swal("","비밀번호를 확인해주세요.", "warning")
        .then(() => {
        window.history.back();
        });
        </script>
        ');
        exit;  
    }

  $conn= mysqli_connect('test.crwx1himfqyb.ap-northeast-2.rds.amazonaws.com:3306','admin','shekdms8260','test');
  mysqli_query($conn,"set names utf8");
 

    $sql= "SELECT * FROM user WHERE id='$id'";
    $result=mysqli_query($conn, $sql);
    $rowNum= mysqli_num_rows($result);

    if($rowNum){
        echo('
        <script>
        swal("","해당 아이디가 존재합니다.", "warning")
        .then(() => {
        window.history.back();
        });
        </script>
        ');
        exit;
    }
    $sql= "SELECT * FROM user WHERE email='$email'";
    $result=mysqli_query($conn, $sql);
    $rowNum= mysqli_num_rows($result);
    if($rowNum){
        echo('
        <script>
        swal("","해당 이메일이 존재합니다.", "warning")
        .then(() => {
        window.history.back();
        });
        </script>
        ');
        exit;
    }
    
    $sql= "INSERT INTO user(id, password, name, email, registday) VALUES('$id','$pass','$name','$email','$registday')";
 
    mysqli_query($conn,$sql);
    mysqli_close($conn);

    echo('
        <script>
        swal("","회원가입이 완료되었습니다.", "success")
        .then(() => {
            window.location.href="https://testasdqwe.herokuapp.com/test1.php";
        });
        </script>
        ');
?>
</html>