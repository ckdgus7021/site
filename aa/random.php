<!DOCTYPE html>
<html>
    <head>
        <meta name="viewport" content="user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0, width=device-width" />
        <meta charset="UTF-8">
    </head>

<form name="not" action="./random.php" method="post">
    <select name="not">
        <option value="한식">한식</option>
        <option value="일식">일식</option>
        <option value="중식">중식</option>
    </select>
    <input type="submit" value="추천">
</form>

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

?>

</html>