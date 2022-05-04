<!DOCTYPE html>

<html lang="ko">



    <style>

        label.left {

	        left:20px;

	        background-color:#5F5F5F;

	        background-image:url('./img/left-arrow.png');

	        background-position:center center;

	        background-size:50%;

	        background-repeat:no-repeat;

        }

        label.right {

	        right:20px;

	        background-color:#5F5F5F;

	        background-image:url('./img/right-arrow.png');

	        background-position:center center;

	        background-size:50%;

	        background-repeat:no-repeat;

        }

    </style>



    <head>
        <meta name="viewport" content="user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0, width=device-width" />
        <meta charset="UTF-8">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

        <title>test1</title>

        <link type="text/css" rel="stylesheet" href="./test1.css">
        <link type="text/css" rel="stylesheet" href="./ttt.css">
        <link type="text/css" rel="stylesheet" href="./footer.css">
        <link type="text/css" rel="stylesheet" href="./header.css">

    </head>


<?php 

    session_start();
 
    $userid="";
    $username="";

 
    if( isset($_SESSION['userid'])) $userid= $_SESSION['userid'];
    if( isset($_SESSION['username'])) $username= $_SESSION['username'];

 
?>
<header>
<?php include "./header.php" ?>
</header>
    <body>






        <div class="slidebox">

            <input type="radio" name="slide" id="slide01" checked>

            <input type="radio" name="slide" id="slide02">

            <input type="radio" name="slide" id="slide03">

            <input type="radio" name="slide" id="slide04">

            <ul class="slidelist">

                <li class="slideitem">

                    <div>

                        <label for="slide04" class="left"></label>

                        <label for="slide02" class="right"></label>

                        <a><img src="img/slide01.jpg"></a>

                    </div>

                </li>

                <li class="slideitem">

                    <div>

                        <label for="slide01" class="left"></label>

                        <label for="slide03" class="right"></label>

                        <a><img src="img/slide02.jpg"></a>

                    </div>

                </li>

                <li class="slideitem">

                    <div>

                        <label for="slide02" class="left"></label>

                        <label for="slide04" class="right"></label>

                        <a><img src="img/slide03.jpg"></a>

                    </div>

                </li>

                <li class="slideitem">

                    <div>

                        <label for="slide03" class="left"></label>

                        <label for="slide01" class="right"></label>

                        <a><img src="img/slide04.jpg"></a>

                    </div>

                </li>

            </ul>
            <a href="https://testasdqwe.herokuapp.com/daily.php"><img src="https://testasdqwe.herokuapp.com/img/2Q.png"></a>

            <!--ul class="paginglist">

                <li>

                    <label for="slide01"></label>

                </li>

                <li>

                    <label for="slide02"></label>

                </li>

                <li>

                    <label for="slide03"></label>

                </li>

                <li>

                    <label for="slide04"></label>

                </li>

            </ul>-->

        </div>


    </body>

    <footer>
        <?php include "./footer.php" ?>
    </footer>

</html>