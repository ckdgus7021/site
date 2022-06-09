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
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
        
        <title>test1</title>

        <link type="text/css" rel="stylesheet" href="./test1.css?after">
        

        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Dongle:wght@300;400;700&display=swap" rel="stylesheet">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Gowun+Batang&display=swap" rel="stylesheet">

    </head>


<?php include "./session_start.php" ?>
<header>
<?php include "./header.php" ?>
</header>
    <body>

    <style>

.top_nav{
    margin-top: 15px;
    width: 100%;
    height: 150px;
    text-align: center;
    vertical-align: center;
}

.nav {
    float: left;
    width: 33.33333%;
    height: 60px;
    vertical-align: center;
}

* {
	font-family: 'Gowun Batang', serif !important;
}

</style>

<?php
include 'dbconn.php';

//$sql = "SELECT round(avg(star),2), restaurant.* 
//FROM restaurant left join star on restaurant.restaurant=star.restaurant group by restaurant.restaurant order by round(avg(star),2) desc limit 5";
$sql = "select * from restaurant where restaurant='via 246' or restaurant='스타동' or restaurant='서경꼬마김밥' or restaurant='카츠선'";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_row($result);
$row_num = mysqli_num_rows($result);

?>


        <div class="slidebox">

            <input type="radio" name="slide" id="slide01" checked>

            <input type="radio" name="slide" id="slide02">

            <input type="radio" name="slide" id="slide03">

            <input type="radio" name="slide" id="slide04">

            <ul class="slidelist">

            <?php
if (mysqli_num_rows($result) > 0) {
    while($row = mysqli_fetch_assoc($result)) {
        echo '<li class="slideitem">

        <div>
            <a href="./rest.php?rest='.$row['restaurant'].'"><img src="./img/slide/' . $row['slide'] . '" style="position: relative;"><a href="#" style="position: absolute; bottom: 10px; left: 10px;"></a>
        </div>

    </li>';
    }
    }else{
    }
    mysqli_close($conn);
?>

            </ul>
</div>
<div class="top_nav">
<div class="nav" style="border: solid 1px;">
    <label><a href="./category.php?category=한식">한식<br><img src="./img/gkstlr.png" style="width: 25px; height: 25px;"></a><label>
</div>
<div class="nav" style="border-top: solid 1px; border-right: solid 1px; border-bottom: solid 1px;">
    <label><a href="./category.php?category=중식">중식<br><img src="./img/wndtlr.png" style="width: 25px; height: 25px;"></a><label>
</div>
<div class="nav" style="border-top: solid 1px; border-right: solid 1px; border-bottom: solid 1px;">
    <label><a href="./category.php?category=일식">일식<br><img src="./img/dlftlr.png" style="width: 25px; height: 25px;"></a><label>
</div>
<div class="nav" style="border: solid 1px; border-top: 0;">
    <label><a href="./category.php?category=양식">양식<br><img src="./img/didtlr.png" style="width: 25px; height: 25px;"></a><label>
</div>
<div class="nav" style="border-right: solid 1px; border-bottom: solid 1px;">
    <label><a href="./category.php?category=기타">기타<br><img src="./img/dot.png" style="width: 25px; height: 20px;"></a><label>
</div>
<div class="nav openMask" style="border-right: solid 1px; border-bottom: solid 1px;">
    메뉴추천<br><img src="./img/dltp11.png" style="width: 36px; height: 28.8px;">
</div>
</div>
<div>
    <div id="left">
        <?php
        include "./random_rec.php";
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
        where rec.date=CURDATE() - INTERVAL 5 DAY group by menu.menu order by sum(recommend) desc limit 10";

        $result = mysqli_query($conn, $sql);
        $i=1;
        if (mysqli_num_rows($result) > 0) {
        while($row = mysqli_fetch_assoc($result)) {
        echo '<table id="qq" class="ee"><tr>';
        echo $i;
        echo '<th>'. $row['menu']. '<br>'. '<a href="/cc/' . $row['menu'] . '.php"><img class=qwer src="'.$row['image'].'" ></a>'. '<br>' . $row['price'] . '원</th>';
        echo "</tr></table>";
        $i=$i+1;
        } 
        }else{
        echo "메뉴 정보가 없습니다.";
        }
        ?>
    </div>
    <div id="right">
        <div style="border-bottom: solid 1px; margin: 1px 4px 0px 4px; padding: 4px 0px 6px 0px; display: flex; justify-content: space-between;">
        <div class="board_title" style="font-size: 22px;">여기 모여라!</div>
        <div><a href="/cc/board/board.php" style="text-decoration: none; -webkit-tap-highlight-color : transparent; color: black; font-size:15px; padding: 0;">더보기 +</a></div>
        </div>
            <table class="list-table">
      <thead>
          <tr>
                <td class="board_top" style="font-size: 17px;">제목</td>
                <td class="board_top2" style="font-size: 17px;">작성자</td>
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



    </body>


    <style>
    a {-webkit-tap-highlight-color : transparent;text-decoration: none; color: black;}
    </style>

</html>