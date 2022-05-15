<?php include  "../dbconn.php"; include "../session_start.php" ?>
<!doctype html>
<head>
<meta name="viewport" content="user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0, width=device-width" />
<meta charset="UTF-8">
<title>게시판</title>
<link rel="stylesheet" type="text/css" href="./board_1.css" />
<link rel="stylesheet" type="text/css" href="../header.css" />
</head>
<header>
	<?php include "../header.php"; ?>
</header>
<body>
<div id="board_area"> 
  <h1>자유게시판</h1>
  <h4>자유롭게 글을 쓸 수 있는 게시판입니다.</h4>
    <table class="list-table">
      <thead>
          <tr>
              <th width="7%">번호</th>
                <th width="50%">제목</th>
                <!--<th width="10%">글쓴이</th>
                <th width="10%">작성일</th>-->
            </tr>
        </thead>
        <?php
        
          $sql = "SELECT board_1.num, title, board_1.id, board_1.date, board_1.time, reply_1.id, reply_1.reply, reply_1.date, reply_1.time
          from board_1 left join reply_1 on board_1.num=reply_1.num order by board_1.num desc";
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
            <?php 
            echo '<span class="title">' . $title . '</span>';
            if ($userid==$board["id"]) {
                echo '<div style="float: right;"><a href="board_1_modify.php?num=' . $board["num"] . ';"><input type="button" value="수정"></a>
                <a href="board_1_delete.php?num=' . $board["num"] . ';"><input type="button" value="삭제"></a></div>';
                } else {}
            echo '<br><span style="color: #808080;">' . $board['id'] . '&nbsp;&nbsp;';
            if ($board['date']==date('Y-m-d')) {
                echo $board['time'];}
                else{
                  echo $board['date'];
                }
            echo '</span></td>';
            ?>
          <!--<td width="10%"><?php //echo $board['id']?></td>
          <td width="10%"><?php //echo $board['date']?></td>-->
        </tr>
      </tbody>
      <?php } ?>
    </table>
    <div id="write_btn">
      <a href="./board_1_write.php"><button>글쓰기</button></a>
    </div>
  </div>
  <a href="../test1.php"><img src="../img/2Q.png"></a>
</body>
</html>