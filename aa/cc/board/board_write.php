<!doctype html>
<head>
<meta name="viewport" content="user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0, width=device-width" />
<meta charset="UTF-8">
<title>게시판</title>
<link rel="stylesheet" type="text/css" href="./board_write.css" />
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
    <div id="board_write" style="width: 100%;">
        <h1><a href="./board.php" style="-webkit-tap-highlight-color : transparent; text-decoration: none; color: black; font-family: 'Nanum Pen Script', cursive;">어딨니 내 소울메EAT...☆</a></h1>
        <h4>글을 작성하는 공간입니다.</h4>
            <div id="write_area">
                <form action="board_insert.php" method="post">
                    <input type="hidden" name="id" value="<?php $userid ?>">
                    <div id="in_title">
                        <textarea name="title" id="utitle" rows="1" cols="55" placeholder="제목" maxlength="100" required style="width: 80%;"></textarea>
                    </div>
                    <div class="wi_line"></div>
                    <div id="in_content">
                        <textarea name="content" id="ucontent" placeholder="내용" required style="width: 97%;"></textarea>
                    </div>
                    <div class="bt_se">
                        <button type="submit">글 작성</button>
                    </div>
                </form>
            </div>
        </div>
    </body>
</html>