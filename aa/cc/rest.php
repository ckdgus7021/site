<!DOCTYPE HTML>
<html>
    <head>
    <meta name="viewport" content="user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0, width=device-width" />
    <meta charset="UTF-8">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link type="text/css" rel="stylesheet" href="./radio.css">
    <link type="text/css" rel="stylesheet" href="./header.css">
    <link type="text/css" rel="stylesheet" href="./rest.css">
    </head>
    <?php 

include "./session_start.php"


?>
<header>
<?php include "./header.php" ?>
</header>


    
    <?php
include 'dbconn.php';
$rest=$_GET['rest'];
$sql = "SELECT round(avg(star),2), restaurant.restaurant, restaurant.businesshours 
FROM restaurant left join star on restaurant.restaurant=star.restaurant where restaurant.restaurant='$rest'";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);
?>
<img src="./img/2Q.png" class="rest_img">
<div style="margin-top: 50px;">
<span class="rest"><?php echo $row['restaurant']; ?></span>
<br><span class="star"><?php echo '★' .$row['round(avg(star),2)']; ?></span>
<br>
<form name="myform" id="myform" method="post" action="./star_insert.php">
    <fieldset>
    <input type="text" name="restaurant" value="<?php echo $rest ?>" style="display: none;">
        <input type="radio" name="star" value="5" id="rate1"><label for="rate1">⭐</label>
        <input type="radio" name="star" value="4" id="rate2"><label for="rate2">⭐</label>
        <input type="radio" name="star" value="3" id="rate3"><label for="rate3">⭐</label>
        <input type="radio" name="star" value="2" id="rate4"><label for="rate4">⭐</label>
        <input type="radio" name="star" value="1" id="rate5"><label for="rate5">⭐</label>
    </fieldset>
    <br><input type="submit" name="btn" value="별점주기" style="margin-top: 10px;">
</form>
<span class="hour"><?php echo $row['businesshours']; ?></span>
</div>
<?php
include "./map.php";

?>
    <body>
    




    </body>
    <!--<script>
    $(document).ready(function(){
        $('.ee').hide();
        $('#ww').click(function(){
            $('#qq').toggle(400);
        });
        
    });
</script>-->
<?php

   $sql = "SELECT menu.restaurant, menu.menu, menu.price, menu.image, sum(recommend) 
   from menu left join rec on menu.menu=rec.menu where menu.restaurant='$rest' group by menu.menu order by sum(recommend) desc";
   $result = mysqli_query($conn, $sql);
  ?>
  <div class="menu_line">
      MENU
  </div>
  <table style="margin: auto; width: 80%;">
  <?php 
  
   if (mysqli_num_rows($result) > 0) {
   while($row = mysqli_fetch_assoc($result)) {
    ?>
        <!--<tr><td><?php //echo $row['menu']; ?></td><td>&nbsp;&nbsp;&nbsp;-----------------&nbsp;&nbsp;&nbsp;</td><td><?php //echo $row['price']; ?>원</td></tr>-->
        <tr><td><?php echo $row['menu']; ?></td>
        <td><?php echo '<form name="rec" id="rec" method="post" action="./rec_insert.php"><input type=hidden name="restaurant" value="' . $row['restaurant'] . '">
     <input type=hidden name="menu", value="'. $row['menu'] .'"><input type=hidden name="rec" value=1>
     <label><input type=submit value=추천 style="display: none;"><i class="fa-regular fa-thumbs-up" style="border: 2px solid #000;
     padding: 3px; color: #000; border-radius: 5px;";>&nbsp;' . $row['sum(recommend)'] .'</i></label></form>' ?></td></tr>
        <tr><td style="float: right;"><?php echo $row['price']; ?></td></tr>

   <?php
   } echo '</table>';
   }else{
   echo "메뉴 정보가 없습니다.";
   }
   mysqli_close($conn);
   
?>

<div style="margin-bottom: 70px; position: relative; top: 0;"></div>

<style>
iframe {margin: auto;}
#myform label {font-size: 30px; color: transparent; text-shadow: 0 0 0 #f0f0f0;}
.rest_img {float: left; width: 200px; height: 200px;}
.star {color: #00AFFF;}
.rest {font-weight: bold;}
* {font-family: 'Gowun Batang', serif;}
</style>
</html>