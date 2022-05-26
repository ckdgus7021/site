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
        include "./header.php";

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
        group by menu.menu order by sum(recommend) desc limit 10";

        $result = mysqli_query($conn, $sql);
        if (mysqli_num_rows($result) > 0) {
        while($row = mysqli_fetch_assoc($result)) {
        echo '<table id="qq" class="ee"><tr>';
        echo '<th>'. $row['menu']. '<br>'. '<a href="/cc/' . $row['restaurant'] . '.php"><img class=qwer src="'.$row['image'].'" ></a>'. '<th><td>' . $row['price'] . '<br>' . $row['sum(recommend)'] . '</td></table>';
        } 
        }else{
        echo "메뉴 정보가 없습니다.";
        }
        ?>

</html>