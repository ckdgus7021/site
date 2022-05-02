<!DOCTYPE html>
<html>
    <head>
    <meta name="viewport" content="user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0, width=device-width" />
    <link href="./top.css" rel="stylesheet" >
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    </head>
<script>
    $(function(){
    $(".side_menu").hide();
    $(".side_button").click(function(){
        $(".side_menu").toggle(300);
    })
    });
    $(function(){
    $(".small").hide();
    $(".big_menu_button").click(function(){
        $(".small").toggle(300);
    })
    });
</script>
<?php
    session_start();
 
    $userid="";
    $username="";

 
    if( isset($_SESSION['userid'])) $userid= $_SESSION['userid'];
    if( isset($_SESSION['username'])) $username= $_SESSION['username'];
?>
    <header>
    <nav id="top">
        <ul>
        <!--<li class="side_button"><a>a</a></li>-->
        <li class="side_button">a</li>
        <li><a href="./top.php" class="title">TEST</a></li>
</ul>
<!--<button class=toggle type="button" onclick="$('.side_bar').stop().fadeToggle(500)">눌러보세용</button>-->
</nav>
<div class="side_bar">
    <!--<button class="side_button">a</button>-->
</div>
<div class="side_menu">
    <ul id="top_menu">
        <?php if(!$userid){  ?>
            <li class="join"><a href="./member_join.php">회원가입</a></li>
            <li><a href="./login.php">로그인</a></li>
        <?php }else{ ?>
            <li><a href="./logout.php">로그아웃</a></li>
            <li><a href="./member_modify_form.php">정보수정</a></li>
                <?php }?>
            </ul>
    <ul class="big_menu">
        <li class="big_menu_button">MENU</li>
        <ul class="small_menu">
            <li class="small">menu1</li>
            <li class="small">menu2</li>
            <li class="small">menu3</li>
    </ul>
</div>
</header>

</html>