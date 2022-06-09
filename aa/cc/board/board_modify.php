<!--- 게시글 수정 -->
<?php
	include "../dbconn.php";
   
	$bno = $_GET['num'];
	$sql = "select * from board where num='$bno';";
    $result = mysqli_query($conn, $sql);
	$board = mysqli_fetch_array($result);
 ?>
<!doctype html>
<head>
<meta charset="UTF-8">
<title>게시판</title>
<link rel="stylesheet" href="./board_write.css" />
</head>
<body>
    <div id="board_write">
        <h1 style="font-family: 'Nanum Pen Script', cursive;"><a href="./board.php">어딨니 내 소울메EAT...☆<</a></h1>
        <h4>글을 수정합니다.</h4>
            <div id="write_area">
                <form action="board_update.php?num=<?php echo $bno; ?>" method="post">
                    <div id="in_title">
                        <textarea name="title" id="utitle" rows="1" cols="55" placeholder="제목" maxlength="100" required><?php echo $board['title']; ?></textarea>
                    </div>
                    <div class="wi_line"></div>
                    <div id="in_content">
                        <textarea name="content" id="ucontent" placeholder="내용" required><?php echo $board['content']; ?></textarea>
                    </div>
                    <div class="bt_se">
                        <button type="submit">글 작성</button>
                    </div>
                </form>
            </div>
        </div>
    </body>
</html>