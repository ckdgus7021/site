<?php
   // 데이터베이스 접속도 공통 모듈에 작성해서 사용
   $conn= mysqli_connect('localhost','root','shekdms8260','test');
   // 한글깨짐 방지 쿼리 실행
   mysqli_query($conn,"set names utf8");
   $sql = "SELECT * FROM aaa";
   $result = mysqli_query($conn, $sql);
   
   echo "<style>tr { position: relative;} </style>";
   echo "<style>th { width: 350px; padding: 10px; font-weight: bold; vertical-align: top; border-bottom: 1px solid #ccc; }</style>";
   echo "<style>td { width: 150px; padding: 10px; text-align: center; vertical-align: top; border-bottom: 1px solid #ccc;}</style>";
   echo "<style> .abc { position: absolute; bottom:0;}</style>";
   echo "<table><tbody>";

   if (mysqli_num_rows($result) > 0) {
   while($row = mysqli_fetch_assoc($result)) {  // mysqli_fetch_assoc 함수는 mysqli_query 를 통해 얻은 result set 에서 레코드를 1개씩 리턴해주는 함수.
     // 레코드를 1개씩 리턴해주는 것은 mysqli_fetch_row 와 동일하지만 mysqli_fetch_assoc 함수가 리턴하는 값은 연관배열이라는점이 틀림.
     echo "<tr>";
     //echo $row['num'];
     //echo "<img src='".$row['path'].$row['img']."' />";
     echo "<th>". $row['num']. "<br>". "<img src='".$row['path'].$row['img']."' >". "</th>";
     echo "<td class=abc> " . "<input type=text>".  "</td>";
     //echo "<th>". "<input type=text>". "</th>";
     //echo "<th>". $row["num"]."</th><td> " . "<img src=$row["img"]>". "원</td>";
     echo "</tr>";
   }
   }else{
   echo "테이블에 데이터가 없습니다.";
   }
   mysqli_close($conn); // 디비 접속 닫기
?>