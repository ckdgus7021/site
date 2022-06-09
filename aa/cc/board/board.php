<?php include  "../dbconn.php"; include "../session_start.php" ?>
<!doctype html>
<head>
<meta name="viewport" content="user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0, width=device-width" />
<meta charset="UTF-8">
<title>게시판</title>
<link rel="stylesheet" type="text/css" href="./board.css?after" />
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Dongle:wght@300;400;700&display=swap" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Gowun+Batang&display=swap" rel="stylesheet">

<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Nanum+Pen+Script&display=swap" rel="stylesheet">

</head>
<header>
	<?php include "../header.php"; ?>
</header>
<body>
<div id="board_area"> 
  <span class="board_title" style="position: relative; display: inline-block; margin: 20px 0px 10px 0px; padding-left: 15px; font-family: 'Nanum Pen Script', cursive;">어딨니 내 소울메EAT...☆</span>
  
    <table class="list-table">
      <thead>
          <tr>
              <th>번호</th>
                <th width="86%">제목</th>
                <!--<th width="10%">글쓴이</th>
                <th width="10%">작성일</th>-->
                <th>조회수</th>
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
        $list = 8;
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
          <td><?php echo $board['num']; ?></td>
          <td width="80%" style="text-align: left; padding-left: 5%;">
<?php 
echo '<a href="/cc/board/board_read.php?num=' . $board["num"] . '"><span class="title">' . $title . '</span></a><span style="color: #808080;">' . $board['id'] . '&nbsp;|&nbsp;';
if ($board['date']==date('Y-m-d')) {
  echo $board['time'];}
  else{
    echo $board['date'];
  } echo '</span>';
?>
</td> 
          <!--<td width="10%"><?php //echo $board['id']?></td>
          <td width="10%"><?php //echo $board['date']?></td>-->
          <td><?php echo $board['hit']?></td>
        </tr>
      </tbody>
      <?php } ?>
    </table>
    
    

    <div id="page_num" style="display: flex; justify-content: space-around; align-items: center;">
      <ul>
        <?php
          if($page <= 1)
          {
            echo "<li class='paging' id='fo_re'><<</li>"; 
          }else{
            echo "<li class='paging'><a href='?page=1'><<</a></li>";
          }
          if($page <= 1)
          {
            
          }else{
          $pre = $page-1;
            echo "<li class='paging'><a href='?page=$pre'><</a></li>";
          }
          for($i=$block_start; $i<=$block_end; $i++){ 
            
            if($page == $i){
              echo "<li class='paging_number' id='fo_re'>$i</li>";
            }else{
              echo "<li class='paging_number'><a href='?page=$i'>$i</a></li>";
            }
          }
          if($page >= $total_page){
          }else{
            $next = $page + 1;
              echo "<li class='paging'><a href='?page=$next'>></a></li>";
          }
          if($page >= $total_page){
            echo "<li class='paging' id='fo_re'>>></li>";
          }else{
            echo "<li class='paging'><a href='?page=$total_page'>>></a></li>";
          }
        ?>
      </ul>
      
    </div>
    <a href="./board_write.php" style="float: right; margin: 20px;"><button>글쓰기</button></a>


  
  </div>
</body>
<style>
* {
  font-family: 'Gowun Batang', serif;
}
.paging {
  padding-left: 0;
  padding-right: 0;
}
.list-table {
	margin: auto;
}

</style>
</html>

