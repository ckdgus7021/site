<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0, width=device-width" />
    <link href="./index.css" rel="stylesheet" >

</head>
<h1 style="margin-left: 10px; margin-top: 20px; margin-bottom: 10px;"><a href="./index.php">TEST<a></h1>
<?php 
    //로그인을 하면 session에 정보를 저장하고 각 페이지들에서 모두 사용하고자 함.
    //로그인에 띠라 화면구성이 다르기에 세션에 저장되어 있는 회원정보 중 id, name, password, email 값 읽어오기
    session_start(); //세션을 저장하든 읽어오든 사용하고자 하면 이 함수로 시작

    $userid="";
    $username="";
    $userpass="";
    $useremail="";
 
    if( isset($_SESSION['userid'])) $userid= $_SESSION['userid'];
    if( isset($_SESSION['username'])) $username= $_SESSION['username'];
    if( isset($_SESSION['userpass'])) $userpass= $_SESSION['userpass'];
    if( isset($_SESSION['useremail'])) $useremail= $_SESSION['useremail'];


?>

 
<div>

    <h2 style="margin-left: 10px">id: <?=$userid ?></h2>
    <h2 style="margin-left: 10px">password: <?=$userpass ?></h2>
    <h2 style="margin-left: 10px">name: <?=$username ?></h2>
    <h2 style="margin-left: 10px">email: <?=$useremail ?></h2>

</div>


</html>