<!DOCTYPE html>
<html>
    <head>
        <meta name="viewport" content="user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0, width=device-width" />
        <meta charset="UTF-8">
        <title>테스트</title>
        <link rel="stylesheet" href="./reference/sidemenu.css">
        <link rel="stylesheet" href="./footer.css">
    </head>
    
    <body>

        <input type="checkbox" id="menuicon">
        <label for="menuicon">
            <span></span>
            <span></span>
            <span></span>
        </label>
        <!--<h1>TITLE</h1>-->



        <div class="sidebar">
            <ul id="sidemenu">
                <li class="join"><a href="member_join.php">회원가입</a></li>
                <li class="login"><a href="login.php">로그인</a></li>
            </ul>
            <ul class="big_menu_list">
                <li class="big_menu"><input type="checkbox" id="big_menu1"><label for="big_menu1">big menu1</label></li>
                <ul class="small_menu_list">
                    <li class="small_menu">smallmenu1</li>
                    <li class="small_menu">smallmenu2</li>
                    <li class="small_menu">smallmenu3</li>
                </ul>
            </ul>
            <input type="checkbox" style="z-index: 10;">
        </div>
    

    
        <div class="section">
            <input type="radio" name="slide" id="slide01" checked>
            <input type="radio" name="slide" id="slide02">
            <input type="radio" name="slide" id="slide03">
            <div class="slide-wrap">
                <ul class="slidelist">
                    <li>
                        <a>
                            <label for="slide03" class="left"></label>
                            <div class="textbox">
                                <h3>첫번째 슬라이드</h3>
                                <p>첫번째 슬라이드 입니다.</p>
                            </div>
                            <img src="./img/slide.jpg">
                            
                            <label for="slide02" class="right"></label>
                        </a>
                    </li>
                    <li>
                        <a>
                            <label for="slide01" class="left"></label>
                            <div class="textbox">
						    <h3>두번째 슬라이드</h3>
						    <p>두번째 슬라이드 입니다.</p>
                        </div>
                        <img src="./img/slide.jpg">
					    <label for="slide03" class="right"></label>
				        </a>
			        </li>
		    	    <li>
                        <a>
                            <label for="slide02" class="left"></label>
                            <div class="textbox">
                                <h3>세번째 슬라이드</h3>
                                <p>세번째 슬라이드 입니다.</p>
                            </div>
                            <img src="./img/slide.jpg">
                            <label for="slide01" class="right"></label>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </body>

    <footer>
        <?php include "./footer.php" ?>
    </footer>

</html>