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
$sql = "select menu.restaurant, menu.menu, menu.price, menu.image, sum(recommend) from menu left join rec on menu.menu=rec.menu where rec.date=CURDATE() group by menu.menu order by sum(recommend) desc";
$result = mysqli_query($conn, $sql);
if (mysqli_num_rows($result) > 0) {
    while($row = mysqli_fetch_assoc($result)) {
echo "<table><tr>";
echo '<th>' . $row['menu'] . '<img src="'.$row['image'] . '">' . '</th>';
echo "</tr></table>";
    }   }else{
        echo "메뉴 정보가 없습니다.";
        }
        mysqli_close($conn);


?>


</html>