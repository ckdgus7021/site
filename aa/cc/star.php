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
<div class="window" style="position: absolute; width: 240px; height: 180px; border: solid 1px #2199e8; border-radius: 8px; margin-top: 20%;">
<div id="random_rec" style="position: absolute; background-color: white; width: 100%; height: 100%; border: solid 1px #2199e8; border-radius: 8px;">
<h1>별점주기</h1><br>
<form name="myform" id="myform" method="post" action="./star_insert.php">
    <fieldset>
    <input type="text" name="restaurant" value="' . $row['restaurant'] . '" style="display: none;">
        <input type="radio" name="star" value="5" id="rate1"><label for="rate1">⭐</label>
        <input type="radio" name="star" value="4" id="rate2"><label for="rate2">⭐</label>
        <input type="radio" name="star" value="3" id="rate3"><label for="rate3">⭐</label>
        <input type="radio" name="star" value="2" id="rate4"><label for="rate4">⭐</label>
        <input type="radio" name="star" value="1" id="rate5"><label for="rate5">⭐</label>
    </fieldset>
    <br><input type="submit" name="btn" value="별점주기" style="margin-top: 10px;">
</form>
</div></div>';
?>