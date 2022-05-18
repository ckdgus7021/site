<head>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<link type="text/css" rel="stylesheet" href="./header.css">
</head>

<script>
    $(document).ready(function(){
        $('.small_menu').hide();
        $('.big_menu').click(function(){
            $(this).children('.small_menu').toggle(400);
        });
    });
</script>


<a href="/cc/test1.php"><img src="/cc/img/22-removebg-preview.png" style="height: 100px; width: 200px; position: absolute; margin-left: 140px; margin-top:0; top: 0;"></a>
<input type="checkbox" id="menuicon">

    <label for="menuicon">

        <span></span>

        <span></span>

        <span></span>

    </label>



<div class="sidebar">

    <ul id="menu">
    <?php if(!$userid){  ?>
        <li class="join" style="font-size: 20px; float: left;"><a class="side_menu" href="/cc/member/member_join.php">회원가입</a></li>

        <li class="join" style="font-size: 20px; float: left;"><a class="side_menu" href="/cc/member/login.php">로그인</a></li>
        <li style="border-bottom: solid 1px; color: white;">&nbsp;</li>
    <?php }else{ ?>
        <li class="join"><a class="side_menu" href="/cc/member/logout.php">로그아웃</a></li>

        <li class="join"><a class="side_menu" href="/cc/member_modify_form.php">정보수정</a></li>
        <li style="border-bottom: solid 1px; color: white;">&nbsp;</li>
    <?php }?>

    </ul>
    
            
    <ul>
        <li id="big1" class="big_menu"><a class="side_menu" href="#">MENU1</a>
            <ul id="small1" class="small_menu">
                <li><a class="side_menu" href="/cc/rest1.php">small menu1</a></li>
                <li><a class="side_menu" href="/cc/paging/paging.php">small menu2</a></li>
                <li><a class="side_menu" href="rest3">small menu3</a></li>
            </ul>
        </li>
        <li id="big2" class="big_menu"><a class="side_menu" href="#">MENU2</a>
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
                <li><a class="side_menu" href="rest4">small menu1</a></li>
                <li><a class="side_menu" href="rest5">small menu2</a></li>
                <li><a class="side_menu" href="rest6">small menu3</a></li>
            </ul>
        </li>
    </ul>

</div>