<!DOCTYPE html>
<html>
    <head>
        <meta name="viewport" content="user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0, width=device-width" />
        <meta charset="UTF-8">
        <link type="text/css" rel="stylesheet" href="./memo.css">
    </head>
    <style>
        [class="note"] {right:3px; bottom:2px;}
     #hide-btn {display: none;}
     #hide-btn:checked ~ .note {
         display: block; }

    .note {display: none;}
    </style>
    <?php
    date_default_timezone_set('Asia/Seoul');
    include "../dbconn.php";
    include "../session_start.php";
    ?>
    <?php 
    $sql = "SELECT * from memo where id='$userid'";
    $result = mysqli_query($conn, $sql);
    $rowNum = mysqli_num_rows($result);
    $row = mysqli_fetch_assoc($result);
    if (!$rowNum) {
    ?>
    <button id ="random_menu" style="cursor:pointer; margin: 40px 0px 0px 40px;">메모</button>
        <div id="bg" class="hidden"></div>
        <div id="popup" class="hidden">

            <input id="hide-btn" type="checkbox" />
            <div class="memo_popup">
                <label for="hide-btn">메모하기 (클릭)</label>
            </div>
        
            <ul class="note">
                <form action='memo_insert.php' method="post">
                <textarea name="memo" rows="12" cols="35" style="font-size:16px; font-family: 맑은 고딕; 
                border-width: 3px; resize: none; overflow-y: scroll; width : 100%; height:auto;" placeholder="내용을 입력하세요."></textarea>
                <input type="submit" value="메모 저장">
                </form>
            </ul>

            <button id="exit" class="button" style='cursor:pointer;'>닫기</button>
    
        </div>
    <?php }else {
        
        echo $row['memo'];
    }
    ?>
        <script src="./memo.js"></script>

</html>