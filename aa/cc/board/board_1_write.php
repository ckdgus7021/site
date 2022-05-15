<!doctype html>
<head>
<meta charset="UTF-8">
<title>게시판</title>
<link rel="stylesheet" type="text/css" href="./board_1_write.css" />
<meta name="viewport" content="user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0, width=device-width" />
</head>
<?php
include "../session_start.php";
if (!$userid) {
    echo "<script>
    alert('로그인 후 이용해주세요.');
    location.href='./board.php';</script>";
}
else {}
?>
<body>
    <div id="board_write">
        <h1><a href="/cc/board/board_1.php">자유게시판</a></h1>
        <h4>글을 작성하는 공간입니다.</h4>
            <div id="write_area">
                <form action="board_1_insert.php" method="post">
                    <input type="hidden" name="id" value="<?php $userid ?>">
                    <div id="in_title">
                        <textarea name="title" id="utitle" rows="1" cols="55" placeholder="내용" maxlength="50" required></textarea>
                    </div>
                    <div class="bt_se">
                        <button type="submit">글 작성</button>
                    </div>
                </form>
            </div>
        </div>
    </body>
</html>