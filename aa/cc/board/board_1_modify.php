<!--- 게시글 수정 -->
<?php
	include "../dbconn.php";
   
	$bno = $_GET['num'];
	$sql = "select * from board_1 where num='$bno';";
    $result = mysqli_query($conn, $sql);
	$board = mysqli_fetch_array($result);
 ?>
<!doctype html>
<head>
<meta charset="UTF-8">
<title>게시판</title>
<link rel="stylesheet" href="./board_1_write.css" />
</head>
<body>
    <div id="board_write">
        <h1><a href="/">자유게시판</a></h1>
        <h4>글을 수정합니다.</h4>
            <div id="write_area">
                <form action="board_1_update.php?num=<?php echo $bno; ?>" method="post">
                    <div id="in_title">
                        <textarea name="title" id="utitle" rows="1" cols="55" placeholder="내용" maxlength="50" required><?php echo $board['title']; ?></textarea>
                    </div>
                    <div class="bt_se">
                        <button type="submit">글 작성</button>
                    </div>
                </form>
            </div>
        </div>
    </body>
</html>