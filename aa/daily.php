<!DOCTYPE HTML>
<html>
    <head>
    <meta name="viewport" content="user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0, width=device-width" />
    <meta charset="UTF-8">
    </head>

<?php
include 'dbconn.php';
//$yesterday = "date('Y-m-d', strtotime('-1 day'));";
$yesterday = "date('Y-m-d');";
$sql = "select menu.restaurant, menu.menu, menu.price, menu.image, sum(recommend) from menu left join rec on menu.menu=rec.menu where rec.date=CURDATE() - INTERVAL 1 DAY group by menu.menu order by sum(recommend) desc";
$result = mysqli_query($conn, $sql);
if (mysqli_num_rows($result) > 0) {
    while($row = mysqli_fetch_assoc($result)) {
      echo "<table id='qq' class='ee'><tr>";
      echo '<th>'. $row['menu']. '<br>'. '<img src="'.$row['image'].'" >'. '</th>';
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


</html>