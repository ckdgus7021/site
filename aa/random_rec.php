<?php
echo "<style>
#mask {
  position:absolute;
  z-index:9000;
  background-color:#000;
  display:none;
  left:0;
  top:0;
}
.window{
  display: none;
  position:absolute;
  left:100px;
  top:100px;
  z-index:10000;
}
</style>";

include 'dbconn.php';
$sql = "SELECT * from restaurant, menu where restaurant.restaurant=menu.restaurant order by rand() limit 1";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);

echo '<script src="http://code.jquery.com/jquery-latest.js"></script>
<script>
function wrapWindowByMask(){
    //화면의 높이와 너비를 구한다.
    var maskHeight = $(document).height();
    var maskWidth = $(document).width();  

    //마스크의 높이와 너비를 화면 것으로 만들어 전체 화면을 채운다.
    $("#mask").css({"width":maskWidth,"height":maskHeight});  

    //애니메이션 효과 - 일단 1초동안 까맣게 됐다가 80% 불투명도로 간다.
    //$("#mask").fadeIn(400);
    $("#mask").fadeTo(400,0.8);    

    //윈도우 같은 거 띄운다.
    $(".window").show();
}

$(document).ready(function(){
    //검은 막 띄우기
    $(".openMask").click(function(e){
        e.preventDefault();
        wrapWindowByMask();
    });

    //닫기 버튼을 눌렀을 때
    $(".window .close").click(function (e) {
        //링크 기본동작은 작동하지 않도록 한다.
        e.preventDefault();
        $("#mask, .window").hide();
    });       

    //검은 막을 눌렀을 때
    $("#mask").click(function () {
        $(this).hide();
        $(".window").hide();
    });
});
function rrr(){
    $("#random_rec").load(location.href + " #random_rec");
}
</script>
<div id="mask" style="position: absolute;"></div><div class="window" style="position: absolute; width: 200px; height: 200px; border: solid 1px #2199e8; border-radius: 8px; margin-top: 20%;">
<div id="random_rec" style="position: absolute; background-color: yellow; width: 100%; height: 100%; border: solid 1px #2199e8; border-radius: 8px;">
<h1>메뉴추천</h1><br>'
 . $row["menu"] .
 '<br>[' . $row["restaurant"] . 
 ']<br><br><a href="./' . $row ["restaurant"] . '.php" style="color: black">음식점이동</a><br><br>
 <a href="#" onclick="rrr();"><img style="width: 20px; height: 20px;"src="./img/2Q.png"></a>
 </div></div>';
?>