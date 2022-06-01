<!DOCTYPE html>
<html>
    <head>
    <meta name="viewport" content="user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0, width=device-width" />
        <meta charset="UTF-8">
        <link type="text/css" rel="stylesheet" href="./slide.css?after">
        <link type="text/css" rel="stylesheet" href="./test1.css?after">
</head>
<style>
    * {margin:0; padding:0;}
</style>

<?php
include 'dbconn.php';

$sql = "SELECT round(avg(star),2), restaurant.* 
FROM restaurant left join star on restaurant.restaurant=star.restaurant group by restaurant.restaurant order by round(avg(star),2) desc limit 5";
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
    while($row = mysqli_fetch_row($result)) {
        echo '<li class="slideitem" style="border: solid 1px;">

        <div>



            <img src="./img/' . $row[4] . '" style="position: relative;"><a href="#" style="position: absolute; bottom: 10px; left: 10px;">' . $row[1] . '</a>

        </div>

    </li>';
    }
    }else{
    }
    mysqli_close($conn);
?>
</ul>

</div>

<!--
    <li class="slideitem">

                    <div>

                        <label for="slide03" class="left"></label>

                        <label for="slide01" class="right"></label>

                        <a><img src="img/slide04.jpg"></a>

                    </div>

                </li>
-->


    
</html>