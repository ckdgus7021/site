<!DOCTYPE HTML>
<html>
    <head>
    <meta name="viewport" content="initial-scale=1.0, maximum-scale=2.0, minimum-scale=1.0, width=device-width" />
    <link type="text/css" rel="stylesheet" href="./map.css">
    <link type="text/css" rel="stylesheet" href="./arrow.css">
    <link type="text/css" rel="stylesheet" href="./footer.css">
    <script src="http://code.jquery.com/jquery-latest.js"></script>
    </head>
    <?php
$conn= mysqli_connect('localhost','root','shekdms8260','test');
$sql = "SELECT round(avg(star),2) FROM star";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);

?>

    <!--<script>
    $(document).ready(function(){
        $(".icon a").removeAttr("href")
        $("img").on("click",function(){
            $(".icon .rest").attr("href", "./rest1.php")
    });
    });

    
    </script>-->
    <body>


<div id="map" style="position: relative;">
    <img src="./img/2Q.png" style="width: 100%; height: 1000px;"></img>
</div>

<a name="rest1" style="position: absolute; right: 50px; top: 200px;"></a>
<div class="icon" style="position: absolute; right: 50px; bottom: 100px;">
<a class="rest" href="#rest1"><img src="./img/2Q.png" class="icon"></img></a>

<p class="arrow_box"><a href="./rest1.php" style="font-size: 30px;">rest1</a><br><a>평점 : <?php echo $row["round(avg(star),2)"]?></a></p>

</div>
<div style="position: absolute; left: 40px; top: 50px;">
<img src="./img/2Q.png" class="icon"></img>
</div>

<div style="position: absolute; left: 200px; top: 200px;">
<a href="#rest2"><img src="./img/2Q.png" class="icon"></img>
</div>
</body>

<footer>
<?php include "./footer.php" ?>
</footer>

</html>