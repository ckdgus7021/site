<!DOCTYPE HTML>
<html>
    <head>
    <meta name="viewport" content="user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0, width=device-width" />
    <meta charset="UTF-8">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link type="text/css" rel="stylesheet" href="./radio.css">
    <link type="text/css" rel="stylesheet" href="./header.css">
    <link type="text/css" rel="stylesheet" href="./memo.css">
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
$sql = "SELECT round(avg(star),2), restaurant FROM star where restaurant='$rest'";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);
echo '<h1 class="other">' . $row['restaurant'] . '</h1>';
echo '<a href="./map.php#rest1" style="text-decoration: none; color: black;" class="other"><img src="./img/map.png"></a><br>';
echo "<span class='other'> 평점 : </span>" . $row['round(avg(star),2)'];


?>
    <body>
    

<form name="myform" id="myform" method="post" action="./star_insert.php">
    <fieldset class="other">
    <input type="text" name="restaurant" value="<?php echo $row['restaurant'] ?>" style="display: none;">
        <input type="radio" name="star" value="5" id="rate1"><label for="rate1">⭐</label>
        <input type="radio" name="star" value="4" id="rate2"><label for="rate2">⭐</label>
        <input type="radio" name="star" value="3" id="rate3"><label for="rate3">⭐</label>
        <input type="radio" name="star" value="2" id="rate4"><label for="rate4">⭐</label>
        <input type="radio" name="star" value="1" id="rate5"><label for="rate5">⭐</label>
    </fieldset>
    <br><input type='submit' name='btn' value='별점주기' class="other" style="margin-top: 10px;">
</form>


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

   echo "<style>tr { position: relative;} </style>";
   echo "<style>th { width: 150px; padding: 10px; font-weight: bold; vertical-align: top; border-bottom: 1px solid #ccc; }</style>";
   echo "<style>td { width: 150px; padding: 10px; text-align: center; vertical-align: top; border-bottom: 1px solid #ccc;}</style>";
   echo "<style> .abc { position: absolute; bottom:0;}</style>";
   echo "<table><tbody>";
   echo "<style>img { width: 50px; height: 50px;} </style>";
   echo "<style>input[type='text'] {width: 100px;} </style>";
   //echo "<style> .ee {display: none;}</style>";
   //echo "<style> span:hover + table.ee {display: inline-block;}</style>";
  
   if (mysqli_num_rows($result) > 0) {
   while($row = mysqli_fetch_assoc($result)) {
     echo "<table id='qq' class='ee'><tr>";
     echo '<th>'. $row['menu']. '<br>'. '<img src="/cc/img/'. $row['restaurant'] . '/' .$row['image'].'" >'. '</th>';
     echo '<td class=abc>' . $row['price'] . '원<br>
     <form name="rec" id="rec" method="post" action="./rec_insert.php"><input type=hidden name="restaurant" value="' . $row['restaurant'] . '">
     <input type=hidden name="menu", value="'. $row['menu'] .'"><input type=hidden name="rec" value=1>
     <label><input type=submit value=추천 style="display: none;"><i class="fa-solid fa-thumbs-up" style="border: 2px solid #2199e8;
     padding: 3px; color: #2199e8; border-radius: 5px;";>&nbsp;' . $row['sum(recommend)'] .'</i></label></form>';
     echo "</tr></table>";
   }
   }else{
   echo "메뉴 정보가 없습니다.";
   }
   mysqli_close($conn);
   
?>

<div style="margin-bottom: 70px; position: relative; top: 0;"></div>

<script src="./memo.js"></script>
</html>