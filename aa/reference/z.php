<!DOCTYPE html>
<html>
    <head>
        <meta name="viewport" content="user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0, width=device-width" />
        <meta charset="UTF-8">


    
</head>
<body>


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
$conn= mysqli_connect('192.168.0.8:3306','root','shekdms8260','test');
$sql = "SELECT * from restaurant, menu where restaurant.restaurant=menu.restaurant order by rand() limit 1";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);

echo "<script src='http://code.jquery.com/jquery-latest.js'></script>
<script>
function wrapWindowByMask(){
    //화면의 높이와 너비를 구한다.
    var maskHeight = $(document).height();
    var maskWidth = $(window).width();  

    //마스크의 높이와 너비를 화면 것으로 만들어 전체 화면을 채운다.
    $('#mask').css({'width':maskWidth,'height':maskHeight});  

    //애니메이션 효과 - 일단 1초동안 까맣게 됐다가 80% 불투명도로 간다.
    //$('#mask').fadeIn(1000);
    $('#mask').fadeTo('slow',0.8);    

    //윈도우 같은 거 띄운다.
    $('.window').show();
}

$(document).ready(function(){
    //검은 막 띄우기
    $('.openMask').click(function(e){
        e.preventDefault();
        wrapWindowByMask();
    });

    //닫기 버튼을 눌렀을 때
    $('.window .close').click(function (e) {
        //링크 기본동작은 작동하지 않도록 한다.
        e.preventDefault();
        $('#mask, .window').hide();
    });       

    //검은 막을 눌렀을 때
    $('#mask').click(function () {
        $(this).hide();
        $('.window').hide();
    });
});
</script>
<div id='mask'></div><div class='window' style='position: relative; width: 200px; height: 200px;'>
<span style='position: absolute; display: inline-block; background-color: yellow; width: 100%; height: 100%'>
<h1>추천메뉴</h1><br>"
 . $row['menu'] .
 "<br>[" . $row['restaurant'] . 
 "]<br><a href='./" . $row ['restaurant'] . ".php'>음식점이동</a></div></span>";
?>

        <!--<input type="button" href="#" class="close" value="나는야 닫기 버튼(.window .close)"/>-->

    <a href="#" class="openMask">검은 막 띄우기</a>
</body>
</html>



</html>