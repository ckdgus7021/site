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
  left: 50px;
  top:0px;
  z-index:10000;
}
</style>";

include 'dbconn.php';
$sql = "SELECT * from restaurant, menu where restaurant.restaurant=menu.restaurant order by rand() limit 1";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);

echo '<script src="http://code.jquery.com/jquery-latest.js"></script>
<script>
function wrapWindow(){
    var maskHeight = $(document).height();
    var maskWidth = $(document).width();  

    $("#mask").css({"width":maskWidth,"height":maskHeight});  
    $("#mask").fadeTo(400,0.8);    
    $(".window").show();
}

$(document).ready(function(){
    $(".openMask").click(function(e){
        e.preventDefault();
        wrapWindow();
    });
    
    $("#mask").click(function () {
        $(this).hide();
        $(".window").hide();
    });
});
function rrr(){
    $("#random_rec").load(location.href + " #random_rec");
}
</script>
<div id="mask" style="position: absolute;"></div>
<div class="window" style="position: absolute; width: 300px; height: 300px; margin-top: 20%;">
<div id="random_rec" style="position: absolute; width: 100%; height: 100%;">
<div style="position: relative; top: 66%;"><a href="./rest.php?rest=' . $row["restaurant"] .'">'
. $row['restaurant'] .
'</a></div>
<div style="position: relative; top: 78%;">'
. $row['menu'] .
'</div>
<div style="position: relative; top: 88%;"><a href="#" onclick="rrr();"><img style="width: 20px; height: 20px; "src="./img/re.png"></a></div>
<img style="width: 100%; height: 100%;" src="./img/rec25.png">
 </div></div>';
?>