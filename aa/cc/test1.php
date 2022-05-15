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
    <div id="left">
        <?php
        echo "<style>tr { position: relative;} </style>";
        echo "<style>th { width: 150px; padding: 10px; font-weight: bold; vertical-align: top; border-bottom: 1px solid #ccc; }</style>";
        echo "<style>td { width: 150px; padding: 10px; text-align: center; vertical-align: top; border-bottom: 1px solid #ccc;}</style>";
        echo "<style> .abc { position: absolute; bottom:0;}</style>";
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
        echo '<table id="qq" class="ee"><tr>';
        echo '<th>'. $row['menu']. '<br>'. '<a href="/cc/' . $row['restaurant'] . '.php"><img class=qwer src="'.$row['image'].'" ></a>'. '<br>' . $row['price'] . '</th>';
        echo "</tr></table>";
        } 
        }else{
        echo "메뉴 정보가 없습니다.";
        }
        ?>
    </div>
    <div id="right">
        <div style="border-bottom: solid 1px; margin: 1px 4px 1px 4px; padding: 4px 0px 4px 0px;">
        <h4 style="float: left; margin: 1px 4px 1px 10px; padding: 4px 0px 4px 0px;">자유 게시판</h4>
        <a href="/cc/board/board.php" style="text-decoration: none; -webkit-tap-highlight-color : transparent; color: black; margin-left: 26%;">더보기 +</a>
        </div>
            <table class="list-table">
      <thead>
          <tr>
                <th style="width: 70%">제목</th>
                <th style="width: 30%">작성자</th>
            </tr>
        </thead>
            <?php
          $sql = "SELECT * from board order by num desc limit 5";
          $result = mysqli_query($conn, $sql);
            while($board = mysqli_fetch_array($result))
            {
              //title변수에 DB에서 가져온 title을 선택
              $title=$board["title"]; 
              
        ?>
        <tbody>
        <tr>
          <td class="title" width="70%">
<form action="/cc/board/board_read.php?num=<?php echo $board["num"];?>" method="post">
<label>
<?php echo $title;?>
<input type="hidden" name="hit" value="1">
<input type="submit" style="display: none;">
<label>
</form>
</td>
          <td width="30%"><?php echo $board['id']?></td>
        </tr>
      </tbody>
      <?php } ?>
    </table>
    </div>
            
</div>
<div style="float: left; left: 30px;"><a href="#" class="openMask"><img src="./img/9kk.png" style="width: 50px; height: 50px;";></a></div>
<?php include "./random_rec.php" ?>
<div>
    <a href="./board/board.php"><img src="./img/9k.png" style="width: 50px; height: 50px;"></a>
    <a href="./board/board_1.php"><img src="./img/2Q.png" style="width: 50px; height: 50px;"></a>
</div>

        </div>


    </body>


</html>