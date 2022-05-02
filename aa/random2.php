<!DOCTYPE html>
<html>
    <head>
        <meta name="viewport" content="user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0, width=device-width" />
        <meta charset="UTF-8">
    </head>


<?php
$not = $_POST['not'];
include 'dbconn.php';
$sql = "SELECT * from restaurant, menu where restaurant.restaurant=menu.restaurant and category not in ('$not') order by rand() limit 1";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);

echo "<h1>추천메뉴</h1>";
echo $row['menu'];
echo "<br>[" . $row['restaurant'] . "]<br>";
echo "<a href='./" . $row['restaurant'] .".php'>음식점 이동</a>";

echo '<form action="./random2.php" method="post">';
echo '<input name="not" type="text" value="' . $not . '" style="display: none">';
echo '<input type="submit" value="다시">';
echo '</form>';

?>





</html>



