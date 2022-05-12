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
        <link type="text/css" rel="stylesheet" href="./header.css">

    </head>


<?php include "./session_start.php" ?>
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
            <div style="width: 45%; height: 300px; float: left; overflow: scroll; margin: 10px 5px 10px 10px; border: solid 1px; border-radius: 8px;">
            <?php

echo "<style>tr { position: relative;} </style>";
echo "<style>th { width: 150px; padding: 10px; font-weight: bold; vertical-align: top; border-bottom: 1px solid #ccc; }</style>";
echo "<style>td { width: 150px; padding: 10px; text-align: center; vertical-align: top; border-bottom: 1px solid #ccc;}</style>";
echo "<style> .abc { position: absolute; bottom:0;}</style>";
echo "<table><tbody>";
echo "<style>img.qwer { width: 50px; height: 50px;} </style>";
echo "<style>input[type='text'] {width: 100px;} </style>";

include 'dbconn.php';
$sql = 

"SELECT menu.restaurant, menu.menu, menu.price, menu.image, sum(recommend) 
from menu left join rec on menu.menu=rec.menu 
where rec.date=CURDATE() - INTERVAL 10 DAY group by menu.menu order by sum(recommend) desc limit 10";

$result = mysqli_query($conn, $sql);
if (mysqli_num_rows($result) > 0) {
 while($row = mysqli_fetch_assoc($result)) {
   echo "<table id='qq' class='ee'><tr>";
   echo '<th>'. $row['menu']. '<br>'. '<img class=qwer src="'.$row['image'].'" >'. '<br>' . $row['price'] . '</th>';
   echo "</tr></table>";
 }
 }else{
 echo "메뉴 정보가 없습니다.";
 }


?>
            </div>
            <div style="width: 45%; height: 300px; float: right; overflow: scroll; margin: 10px 10px 10px 5px; border: solid 1px; border-radius: 8px;">
            <table class="list-table">
      <thead>
          <tr>
                <th>제목</th>
                <th>글쓴이</th>
            </tr>
        </thead>
            <?php
          $sql = "SELECT board.num, board.title, board.id, board.date, sum(hit) from board left join hit on board.num=hit.num group by board.num order by board.num desc limit 5";
          $result = mysqli_query($conn, $sql);
            while($board = mysqli_fetch_array($result))
            {
              //title변수에 DB에서 가져온 title을 선택
              $title=$board["title"]; 
              if(strlen($title)>30)
              { 
                //title이 30을 넘어서면 ...표시
                $title=str_replace($board["title"],mb_substr($board["title"],0,30,"utf-8")."...",$board["title"]);
              }
        ?>
        <tbody>
        <tr>
          <td>
<form action="/cc/board/board_read.php?num=<?php echo $board["num"];?>" method="post">
<label>
<?php echo $title;?>
<input type="hidden" name="hit" value="1">
<input type="submit" style="display: none;">
<label>
</form>
</td>
          <td><?php echo $board['id']?></td>
        </tr>
      </tbody>
      <?php } ?>
    </table>
            </div>
            
</div>
<div style="float: left; left: 30px;"><a href="#" class="openMask"><img src="./img/9kk.png" style="width: 50px; height: 50px;";></a></div>
<?php include "./random_rec.php" ?>
<div><a href="./board/board.php"><img src="./img/9k.png" style="width: 50px; height: 50px;"></div>

        </div>


    </body>


</html>