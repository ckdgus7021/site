<head>
<link type="text/css" rel="stylesheet" href="/cc/header.css?after">
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Dongle:wght@300;400;700&display=swap" rel="stylesheet">
</head>

<script>
    $(document).ready(function(){
        $('.small_menu').hide();
        $('.big_menu').click(function(){
            $(this).children('.small_menu').toggle(400);
        });
    });
</script>



<a href="/cc/test1.php"><img src="/cc/img/bbbb.png" style="height: 85px; width: 100%; position: absolute; padding-left: 5px; top: 0; background-color: #b7eff8;"></a>
<input type="checkbox" id="menuicon">

    <label for="menuicon">

        <span style="background: #fff;"></span>

        <span style="background: #fff;"></span>

        <span style="background: #fff;"></span>

    </label>



<div class="sidebar">

    <ul id="menu" style="text-align: center;">
    <?php if(!$userid){  ?>
        <li class="join"><a class="side_menu" href="/cc/member/member_join.php">회원가입</a></li>

        <li class="join2"><a class="side_menu" href="/cc/member/login.php">로그인</a></li>
        <li class="join_line"></li>
    <?php }else{ ?>
        
        <li class="join3"><a class="side_menu" href="/cc/member/logout.php">로그아웃</a></li>

        <li class="join_line"></li>
    <?php }?>

    </ul>
    
            
    <ul>
        <li id="big2" class="big_menu"><a class="side_menu" href="#">한식</a>
            <ul id="small2" class="small_menu">
                <?php
                include 'dbconn.php';
                $sql = "select * from restaurant where category='한식'";
                $result = mysqli_query($conn, $sql);
                if (mysqli_num_rows($result) > 0) {
                while($row = mysqli_fetch_assoc($result)){
                echo '<li style="margin-top:5px;"><a class="side_menu" href="' . $row["restaurant"] . '">' . $row["restaurant"] . '</a></li>';
                }
            }   else{
                    echo "정보가 없습니다.";
                }
                ?>
            </ul>
        </li>
        <li id="big2" class="big_menu"><a class="side_menu" href="#">일식</a>
            <ul id="small2" class="small_menu">
                <?php
                include 'dbconn.php';
                $sql = "select * from restaurant where category='일식'";
                $result = mysqli_query($conn, $sql);
                if (mysqli_num_rows($result) > 0) {
                while($row = mysqli_fetch_assoc($result)){
                echo '<li style="margin-top:5px;"><a class="side_menu" href="/cc/rest.php?rest=' . $row["restaurant"] . '">' . $row["restaurant"] . '</a></li>';
                }
            }   else{
                    echo "정보가 없습니다.";
                }
                ?>
            </ul>
        </li>
        <li id="big1" class="big_menu"><a class="side_menu" href="#">MENU1</a>
            <ul id="small1" class="small_menu">
                <li><a class="side_menu" href="/cc/rest1.php">small menu1</a></li>
                <li><a class="side_menu" href="/cc/paging/paging.php">small menu2</a></li>
                <li><a class="side_menu" href="/cc/total.php">small menu3</a></li>
            </ul>
        </li>
    </ul>

</div>