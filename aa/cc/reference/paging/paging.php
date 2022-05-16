<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <title>CodePen - 테이블 페이징 처리하기</title>
  <link rel="stylesheet" href="./paging.css">
  <?php include  "../../dbconn.php"; include "../../session_start.php" ?>
</head>
<body>
<!-- partial:index.partial.html -->
<table id="products" border="1">
	<caption>product list
		<form action="" id="setRows">
			<p>
				showing
				<input type="text" name="rowPerPage" value="3">
				item per page
			</p>
		</form>

	</caption>

	<thead>
		<tr>
			<th>번호</th>
			<th>제목</th>
			<th>조회수</th>
		</tr>
	</thead>
	<?php
        
          $sql = "SELECT * from board order by num desc";
          $result = mysqli_query($conn, $sql);
            while($board = mysqli_fetch_array($result))
            {
              //title변수에 DB에서 가져온 title을 선택
              $title=$board["title"]; 
              //if(strlen($title)>30)
              //{ 
                //title이 30을 넘어서면 ...표시
                //$title=str_replace($board["title"],mb_substr($board["title"],0,30,"utf-8")."...",$board["title"]);
              //}
        ?>
      <!--<tbody>
        <tr>
          <td width="70"><?php //echo $board['num']; ?></td>
          <td width="500"><a href="./board_read.php?num=<?php //echo $board["num"];?>"><?php //echo $title;?></a></td>
          <td width="120"><?php //echo $board['id']?></td>
          <td width="100"><?php //echo $board['date']?></td>
        </tr>
      </tbody>-->
      <tbody>
        <tr>
          <td width="7%"><?php echo $board['num']; ?></td>
          <td width="30%" style="text-align: left; padding-left: 5%;">
<form action="/cc/board/board_read.php?num=<?php echo $board["num"];?>" method="post">
<label>
<?php 
echo '<span class="title" style="font-size: 16px;">' . $title . '</span><br><span style="color: #808080;">' . $board['id'] . '&nbsp;&nbsp;&nbsp;' . $board['date'] . '</span>';
?>
<input type="hidden" name="hit" value="1">
<input type="submit" style="display: none;">
<label>
</form>
</td>
          <!--<td width="10%"><?php //echo $board['id']?></td>
          <td width="10%"><?php //echo $board['date']?></td>-->
          <td width="10%"><?php echo $board['hit']?></td>
        </tr>
      </tbody>
      <?php } ?>

</table>
<!-- partial -->
  <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.0/jquery.min.js'></script><script  src="./paging.js"></script>

</body>
</html>
