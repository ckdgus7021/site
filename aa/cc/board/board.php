<?php include  "../dbconn.php"; include "../session_start.php" ?>
<!doctype html>
<head>
<meta name="viewport" content="user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0, width=device-width" />
<meta charset="UTF-8">
<title>게시판</title>
<link rel="stylesheet" type="text/css" href="./board.css" />
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
                <th width="10%">조회수</th>
            </tr>
        </thead>
        <?php

if(isset($_GET['page'])){
    $page = $_GET['page'];
      }else{
        $page = 1;
      }
        $sql1 = "select * from board";
        $result1=mysqli_query($conn, $sql1);
        $row_num = mysqli_num_rows($result1);
        $list = 10;
        $block_ct = 5;

        $block_num = ceil($page/$block_ct);
        $block_start = (($block_num - 1) * $block_ct) + 1;
        $block_end = $block_start + $block_ct - 1;

        $total_page = ceil($row_num / $list);
        if($block_end > $total_page) $block_end = $total_page;
        $total_block = ceil($total_page/$block_ct);
        $start_num = ($page-1) * $list;

        //
        
          $sql = "SELECT * from board order by num desc limit $start_num, $list";
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
echo '<a href="/cc/board/board_read.php?num=' . $board["num"] . '"><span class="title">' . $title . '</span></a><br><span style="color: #808080;">' . $board['id'] . '&nbsp;&nbsp;&nbsp;';
if ($board['date']==date('Y-m-d')) {
  echo $board['time'];}
  else{
    echo $board['date'];
  } echo '</span>';
?>
</td> 
          <!--<td width="10%"><?php //echo $board['id']?></td>
          <td width="10%"><?php //echo $board['date']?></td>-->
          <td width="10%"><?php echo $board['hit']?></td>
        </tr>
      </tbody>
      <?php } ?>
    </table>
    
    

    <div id="page_num">
      <ul>
        <?php
          if($page <= 1)
          {
            echo "<li class='paging' id='fo_re'>처음</li>"; 
          }else{
            echo "<li class='paging'><a href='?page=1'>처음</a></li>";
          }
          if($page <= 1)
          {
            
          }else{
          $pre = $page-1;
            echo "<li class='paging'><a href='?page=$pre'>이전</a></li>";
          }
          for($i=$block_start; $i<=$block_end; $i++){ 
            
            if($page == $i){
              echo "<li class='paging' id='fo_re'>$i</li>";
            }else{
              echo "<li class='paging'><a href='?page=$i'>$i</a></li>";
            }
          }
          if($page >= $total_page){
          }else{
            $next = $page + 1;
            echo "<li class='paging'><a href='?page=$next'>다음</a></li>";
          }
          if($page >= $total_page){
            echo "<li class='paging' id='fo_re'>마지막</li>";
          }else{
            echo "<li class='paging'><a href='?page=$total_page'>마지막</a></li>";
          }
        ?>
      </ul>
    </div>


    <div id="write_btn">
      <a href="./board_write.php"><button>글쓰기</button></a>
    </div>
  </div>
</body>
</html>

