<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0, width=device-width" />
    <title>회원가입</title>
 
    <!-- 공통 스타일 연결 -->
    <link rel="stylesheet" href="../css/common.css">
    <!-- member_form.php전용 스타일 -->
    <link rel="stylesheet" href="../css/member.css">
</head>
<body>
    <header>

    </header>
 
    <section>
        <div id="main_content">
            <div id="join_box">
                <!-- DB의 member테이블에 저장하는 member_insert.php에 입력값들 전달하도록 -->
                <form action="./member_insert.php" method="post" name="member_form">
                    <h2>회원 가입</h2>
 
                    <!-- 각 줄마다 라벨, 인풋요소 영역으로 나누어 지므로 col1, col2 클래스지정으로 스타일링 -->
                    <div class="form id">
                        <div class="col1">아이디</div>
                        <div class="col2"><input type="text" name="id"></div>
                        <!-- id줄만 존재하는 칸 -->
                        <!--<div class="col3">
                            <a href="#"><img src="../img/check_id.gif"></a>-->
                        </div>
                    </div>
                    <div class="form">
                        <div class="col1">비밀번호</div>
                        <div class="col2"><input type="password" name="password"></div>
                    </div>
                    <div class="form">
                        <div class="col1">비밀번호 확인</div>
                        <div class="col2"><input type="password" name="pass_confirm"></div>
                    </div>
                    <div class="form">
                        <div class="col1">이름</div>
                        <div class="col2"><input type="text" name="name"></div>
                    </div>
                    <div class="form email">
                        <div class="col1">이메일</div>
                        <div class="col2">
                            <input type="text" name="email1">@<input type="text" name="email2">
                        </div>
                    </div>
                    <!-- input요소의 submit, reset으로 만들면 이미지로 못 만듬 -->
                    <!-- input요소의 타입 중 image 타입으로 하면 이미지 버튼이면서 submit 기능 -->
                    <!-- 값을 전송할 때 값이 비어있는지 검증하는 작업도 하고 싶어서.. -->
                    <!-- Javascript를 이용해서 submit()해보기 -->
                    <div class="bottom_line"></div>
                    <div class="buttons">
                        <!--<img src="../img/button_save.gif" style="cursor:pointer">&nbsp; -->
                        <!--<img src="../img/button_reset.gif" style="cursor:pointer"> -->
                        <input type = 'submit' name ='btn' value='완료'>
                    </div>
                </form>
            </div>
 
        </div>
    </section>
 
     <footer>

    </footer>
        
    
</body>
</html>