<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0, width=device-width" />
    <meta charset="UTF-8">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Dongle:wght@300;400;700&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Gowun+Batang&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="./한식.css?after">;
</head>


<?php include  "./dbconn.php"; include "./session_start.php"; include "./header.php";?>


<?php

   $sql = "SELECT restaurant.*, round(avg(star),2) from restaurant left join star on restaurant.restaurant=star.restaurant where restaurant.category='한식' group by restaurant.restaurant";
   $result = mysqli_query($conn, $sql);

   echo "<style>tr { position: relative;} </style>";
   echo "<style>th { width: 30%; padding: 10px; font-weight: bold; vertical-align: top; border-bottom: 1px solid #ccc;}</style>";
   echo "<style>td { width: 65%; padding: 10px; text-align: center; vertical-align: top; border-bottom: 1px solid #ccc;}</style>";
   echo "<table><tbody>";
   echo "<style>img { width: 50px; height: 50px;} </style>";
   echo "<style>input[type='text'] {width: 100px;} </style>";
   //echo "<style> .ee {display: none;}</style>";
   //echo "<style> span:hover + table.ee {display: inline-block;}</style>";
  
   if (mysqli_num_rows($result) > 0) {
   while($row = mysqli_fetch_assoc($result)) {
     echo "<table id='qq' class='ee'><tr>";
     echo '<th><img src="'.$row['restaurant'].'" >'. '</th>';
     echo '<td class=abc><a class = "rest_title" href="./rest.php?rest=' . $row['restaurant'] . '">' . $row['restaurant'] . '</a><span class="rest_star">&nbsp;★' . $row['round(avg(star),2)'] .'</span><br>
     <span class="rest_hour">' . $row['businesshours'] . '</span>';
     echo "</tr></table>";
   }
   }else{
   echo "메뉴 정보가 없습니다.";
   }
   mysqli_close($conn);
   
?>

<style>
* {margin:0;padding:0;box-sizing:border-box;font-family: 'Gowun Batang', serif;}
</style>

</html>