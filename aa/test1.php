<!DOCTYPE html>

<html lang="ko">



    <style>

        label.left {

	        left:20px;

	        background-color:#5F5F5F;

	        background-image:url('./img/left-arrow.png');

	        background-position:center center;

	        background-size:50%;

	        background-repeat:no-repeat;

        }

        label.right {

	        right:20px;

	        background-color:#5F5F5F;

	        background-image:url('./img/right-arrow.png');

	        background-position:center center;

	        background-size:50%;

	        background-repeat:no-repeat;

        }

    </style>



    <head>
        <meta name="viewport" content="user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0, width=device-width" />
        <meta charset="UTF-8">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

        <title>test1</title>

        <link type="text/css" rel="stylesheet" href="./test1.css">
        <link type="text/css" rel="stylesheet" href="./ttt.css">
        <link type="text/css" rel="stylesheet" href="./footer.css">
        <link type="text/css" rel="stylesheet" href="./header.css">

    </head>


<?php 

    session_start();
 
    $userid="";
    $username="";

 
    if( isset($_SESSION['userid'])) $userid= $_SESSION['userid'];
    if( isset($_SESSION['username'])) $username= $_SESSION['username'];

 
?>
<header>
<?php include "./header.php" ?>
</header>
    <body>






        <div class="slidebox">

            <input type="radio" name="slide" id="slide01" checked>

            <input type="radio" name="slide" id="slide02">

            <input type="radio" name="slide" id="slide03">

            <input type="radio" name="slide" id="slide04">

            <ul class="slidelist">

                <li class="slideitem">

                    <div>

                        <label for="slide04" class="left"></label>

                        <label for="slide02" class="right"></label>

                        <a><img src="img/slide01.jpg"></a>

                    </div>

                </li>

                <li class="slideitem">

                    <div>

                        <label for="slide01" class="left"></label>

                        <label for="slide03" class="right"></label>

                        <a><img src="img/slide02.jpg"></a>

                    </div>

                </li>

                <li class="slideitem">

                    <div>

                        <label for="slide02" class="left"></label>

                        <label for="slide04" class="right"></label>

                        <a><img src="img/slide03.jpg"></a>

                    </div>

                </li>

                <li class="slideitem">

                    <div>

                        <label for="slide03" class="left"></label>

                        <label for="slide01" class="right"></label>

                        <a><img src="img/slide04.jpg"></a>

                    </div>

                </li>

            </ul>
<div>
            <div style="width: 45%; float: left; overflow: scroll; margin: 10px; border: solid 1px; border-radius: 8px;">
            <?php

echo "<style>tr { position: relative;} </style>";
echo "<style>th { width: 150px; padding: 10px; font-weight: bold; vertical-align: top; border-bottom: 1px solid #ccc; }</style>";
echo "<style>td { width: 150px; padding: 10px; text-align: center; vertical-align: top; border-bottom: 1px solid #ccc;}</style>";
echo "<style> .abc { position: absolute; bottom:0;}</style>";
echo "<table><tbody>";
echo "<style>img.qwer { width: 50px; height: 50px;} </style>";
echo "<style>input[type='text'] {width: 100px;} </style>";

include 'dbconn.php';
$sql = "select menu.restaurant, menu.menu, menu.price, menu.image, sum(recommend) from menu left join rec on menu.menu=rec.menu where rec.date=CURDATE() - INTERVAL 2 DAY group by menu.menu order by sum(recommend) desc";
$result = mysqli_query($conn, $sql);
if (mysqli_num_rows($result) > 0) {
 while($row = mysqli_fetch_assoc($result)) {
   echo "<table id='qq' class='ee'><tr>";
   echo '<th>'. $row['menu']. '<br>'. '<img class=qwer src="'.$row['image'].'" >'. '</th>';
   echo '<td class=abc>' . $row['price'] . '원<br>
   <form name="rec" id="rec" method="post" action="./rec_insert.php"><input type=text name="restaurant" value="rest1" style="display: none;">
   <input type=text name="menu", value="'. $row['menu'] .'" style="display: none;"><input type=text name="rec" value=1 style="display: none;">
   <label><input type=submit value=추천 style="display: none;"><i class="fa-solid fa-thumbs-up" style="border: 2px solid #2199e8; padding: 3px; color: #2199e8; border-radius: 5px;";>&nbsp;'
    . $row['sum(recommend)'] .'</i></label></form>' .  '</td>';
   echo "</tr></table>";
 }
 }else{
 echo "메뉴 정보가 없습니다.";
 }
 mysqli_close($conn);


?>
            </div>
            <div style="width: 40%; float: right; overflow: scroll; margin: 10px; border: solid 1px; border-radius: 8px;">
            adsfsfds
            </div>
</div>

            <!--<a href="https://testasdqwe.herokuapp.com/daily.php"><img src="https://testasdqwe.herokuapp.com/img/2Q.png"></a>-->

            <!--ul class="paginglist">

                <li>

                    <label for="slide01"></label>

                </li>

                <li>

                    <label for="slide02"></label>

                </li>

                <li>

                    <label for="slide03"></label>

                </li>

                <li>

                    <label for="slide04"></label>

                </li>

            </ul>-->

        </div>


    </body>

    <footer>
        <?php //include "./footer.php" ?>
    </footer>

</html>