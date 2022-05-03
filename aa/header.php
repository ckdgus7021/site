<head>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
</head>

<script>
    $(document).ready(function(){
        $('.small_menu').hide();
        $('#big1').click(function(){
            $('#small1').toggle(400);
        });
        $('#big2').click(function(){
            $('#small2').toggle(400);
        });
        
    });
</script>


<a href="./test1.php"><img src="./img/22-removebg-preview.png" style="height: 100px; width: 200px; position: absolute; margin-left: 140px; margin-top:0; top: 0;"></a>
<input type="checkbox" id="menuicon">

    <label for="menuicon">

        <span></span>

        <span></span>

        <span></span>

    </label>



<div class="sidebar">

    <ul id="menu">
    <?php if(!$userid){  ?>
        <li class="join"><a href="./member/member_join.php">회원가입</a></li>

        <li class="join"><a href="./member/login.php">로그인</a></li>
    <?php }else{ ?>
        <li class="join"><a href="./member/logout.php">로그아웃</a></li>

        <li class="join"><a href="./member_modify_form.php">정보수정</a></li>
    <?php }?>

    </ul>
            
    <ul>
        <li id="big1" class="big_menu"><a href="#">MENU1</a>
            <ul id="small1" class="small_menu">
                <li><a href="./rest1.php">small menu1</a></li>
                <li><a href="./paging.php">small menu2</a></li>
                <li><a href="rest3">small menu3</a></li>
            </ul>
        </li>
        <li id="big2" class="big_menu"><a href="#">MENU2</a>
            <ul id="small2" class="small_menu">
                <li><a href="rest4">small menu1</a></li>
                <li><a href="rest5">small menu2</a></li>
                <li><a href="rest6">small menu3</a></li>
            </ul>
        </li>
    </ul>

</div>