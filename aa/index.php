<!DOCTYPE html>
<html>
    <head>
    <meta name="viewport" content="user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0, width=device-width" />
    <link href="./index.css" rel="stylesheet" >
    </head>


<h1><a href="./index.php">TEST<a></h1>
<?php 

    session_start();
 
    $userid="";
    $username="";

 
    if( isset($_SESSION['userid'])) $userid= $_SESSION['userid'];
    if( isset($_SESSION['username'])) $username= $_SESSION['username'];

 
?>
        <div id="top">
 
            <!-- 2. 회원가입/로그인 버튼 표시 영역 -->
            <ul id="top_menu">
                <!-- 로그인 안되었을 때 -->
                <?php if(!$userid){  ?>
                    <li><a href="./member_join.php">회원가입</a></li>
                    <li> | </li>
                    <li><a href="./login.php">로그인</a></li>
                <?php }else{ ?>
                    <li><a href="./logout.php">로그아웃</a></li>
                    <li> | </li>
                    <li><a href="./member_modify_form.php">정보수정</a></li>
                <?php }?>

            </ul>
        </div>
 
        <!-- 헤더 영역의 네비게이션 메뉴 영역 -->
        <div id="menu_bar">
            <ul>
                <li><a href="./index.php">HOME</a></li>
                <li><a href="./test1.php">TEST1</a></li>
                <li><a href="./top.php">TOP</a></li>
            </ul>
        </div>


</html>