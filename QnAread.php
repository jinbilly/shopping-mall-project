<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en" xmlns="http://www.w3.org/1999/html">
<head>
    <meta charset="UTF-8">
    <meta name="description" content="Ashion Template">
    <meta name="keywords" content="Ashion, unica, creative, html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>noticeboard</title>

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Cookie&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;600;700;800;900&display=swap"
          rel="stylesheet">

    <!-- Css Styles -->
    <link rel="stylesheet" href="css/bootstrap.min.css" type="text/css">
    <link rel="stylesheet" href="css/font-awesome.min.css" type="text/css">
    <link rel="stylesheet" href="css/elegant-icons.css" type="text/css">
    <link rel="stylesheet" href="css/jquery-ui.min.css" type="text/css">
    <link rel="stylesheet" href="css/magnific-popup.css" type="text/css">
    <link rel="stylesheet" href="css/owl.carousel.min.css" type="text/css">
    <link rel="stylesheet" href="css/slicknav.min.css" type="text/css">
    <link rel="stylesheet" href="css/style.css" type="text/css">


    <!-- Custom fonts for this template -->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
            href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
            rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

    <!-- Custom styles for this page -->
    <link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
</head>
<body>
<!-- Page Preloder -->
<div id="preloder">
    <div class="loader"></div>
</div>

<!-- Offcanvas Menu Begin -->
<div class="offcanvas-menu-overlay"></div>
<div class="offcanvas-menu-wrapper">
    <div class="offcanvas__close">+</div>
    <ul class="offcanvas__widget">
        <li><span class="icon_search search-switch"></span></li>
        <li><a href="#"><span class="icon_heart_alt"></span>
                <div class="tip">2</div>
            </a></li>
        <li><a href="#">장바구니<span class="icon_bag_alt"></span>
                <div class="tip">2</div>
            </a></li>
    </ul>
    <div class="offcanvas__logo">
        <a href="index.php"><img src="img/logo.png" alt=""></a>
    </div>
    <div id="mobile-menu-wrap"></div>
    <div class="offcanvas__auth">
        <a href="#">Login</a>
        <a href="#">Register</a>
    </div>
</div>
<!-- Offcanvas Menu End -->
<?php
//해당 index 값 으로 쿼리 날려서 데이터 받아오기

$con = mysqli_connect("127.0.0.1", "root", "1591", "shoppingmalldb");

$session = $_SESSION["userId"];

$search_query = "SELECT count(*) FROM shop_cart_info WHERE userId = '$session'";

$re = mysqli_query($con, $search_query);

$result = mysqli_fetch_array($re);

//해당 index 값 으로 쿼리 날려서 데이터 받아오기
if (isset($_GET["index"])) {
    $index = $_GET["index"];
    $search_query = "SELECT * FROM QnA_info WHERE QnASeq='$index'";
    $re = mysqli_query($con, $search_query);
    $result = mysqli_fetch_array($re);


    if (empty($_COOKIE['board_QnA_' . $index])) {
        //조회수 1증가 시켜서 없데이트 해주기
        $view_add_one = $result[4] + 1;
        $views_update_query = "UPDATE QnA_info SET views ='$view_add_one' WHERE QnASeq ='$result[0]'";
        mysqli_query($con, $views_update_query);

        //조회수 1 증가 시켰으면, 일정 시간동안 조회수 안올라가게 쿠키 설정하기
        setcookie('board_QnA_' . $index, TRUE, time() + (3600 * 24));//조회수 하루

    }


    //댓글들 정보 쿼리로 가져오기
    $search_query_comment = "SELECT * FROM  QnAcomment_info WHERE QnASeq_check='$result[0]'";
    $re2 = mysqli_query($con, $search_query_comment);


}
?>


<!-- Header Section Begin -->
<header class="header">
    <div class="container-fluid">
        <div class="row">
            <div class="col-xl-3 col-lg-2">
                <div class="header__logo">
                    <a href="index.php"><img src="img/logo.png" alt=""></a>
                </div>
            </div>
            <div class="col-xl-6 col-lg-7">
                <nav class="header__menu">
                    <ul>
                        <li><a href="index.php">Home</a></li>
                        <li><a href="shop.php?category=아우터">Shop</a></li>
                        <?php
                        if (isset($_SESSION["userId"]) && $_SESSION["userId"] == "root") { ?>
                            <li><a href="noticeboard.php">Board</a></li>
                        <?php } else {
                            ?>
                            <li class="active"><a href="noticeboard.php">Board</a></li>
                            <?php
                        }
                        ?>


                        <li><a href="contact.php">Contact</a></li>

                        <?php
                        if (isset($_SESSION["userId"]) && $_SESSION["userId"] == "root") { ?>
                            <li class="active"><a href="AdminPage.php">Administer page</a></li>
                        <?php } else if (isset($_SESSION["userId"])) {
                            ?>
                            <li><a href="myPage.php">Mypage</a></li>
                            <?php
                        }
                        ?>

                    </ul>
                </nav>
            </div>
            <div class="col-lg-3">
                <div class="header__right">
                    <div class="header__right__auth">
                        <a href="<?php if (isset($_SESSION["userId"])) {
                            echo '#';
                        } else {
                            echo 'login.php';
                        } ?>">
                            <?php
                            if (!isset($_SESSION["userId"])) {
                                echo "Login";
                            } else {
                                echo $_SESSION["userId"];
                            }
                            ?>
                        </a>
                        <a href="<?php if (isset($_SESSION["userId"])) {
                            echo 'logout.php';
                        } else {
                            echo 'register.html';
                        } ?>">
                            <?php
                            if (!isset($_SESSION["userId"])) {
                                echo "register";
                            } else {
                                echo "로그아웃";
                            }
                            ?>
                        </a>
                        <!--    --><?php
                        /*                        //해당 index 값 으로 쿼리 날려서 데이터 받아오기

                                                $con = mysqli_connect("127.0.0.1", "root", "1591", "shoppingmalldb");

                                                $session = $_SESSION["userId"];

                                                $search_query = "SELECT count(*) FROM shop_cart_info WHERE userId = '$session'";

                                                $re = mysqli_query($con, $search_query);

                                                $result = mysqli_fetch_array($re);

                                                */ ?>


                    </div>
                    <ul class="header__right__widget">
                        <!--상단 찜하기 하트-->
                        <!--                        <li><a href="#"><span class="icon_heart_alt"></span>-->
                        <!--                                <div class="tip">33</div>-->
                        <!--                            </a></li>-->
                        <!--상단 장바구니 숫자-->
                        <li><a href="shop-cart.php">장바구니<span class="icon_bag_alt"></span>
                                <div class="tip"><? echo $result[0]; ?></div>
                            </a></li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="canvas__open">
            <i class="fa fa-bars"></i>
        </div>
    </div>


</header>
<!-- Header Section End -->

<!-- Breadcrumb Begin -->
<div class="breadcrumb-option">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="breadcrumb__links">
                    <a href="index.php"><i class="fa fa-home"></i> Home</a>
                    <a href="noticeboard.php"><i class="fa fa-comment"></i> Q&A Noticeboard</a>
                    <span>read</span>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Breadcrumb End -->
<!--
<?php
/*//해당 index 값 으로 쿼리 날려서 데이터 받아오기
if (isset($_GET["index"])) {
    $index=$_GET["index"];
    $search_query="SELECT * FROM QnA_info WHERE QnASeq='$index'";
    $re=mysqli_query($con,$search_query);
    $result=mysqli_fetch_array($re);



    if(empty($_COOKIE['board_QnA_'.$index])){
        //조회수 1증가 시켜서 없데이트 해주기
        $view_add_one=$result[4]+1;
        $views_update_query="UPDATE QnA_info SET views ='$view_add_one' WHERE QnASeq ='$result[0]'";
        mysqli_query($con,$views_update_query);

        //조회수 1 증가 시켰으면, 일정 시간동안 조회수 안올라가게 쿠키 설정하기
        setcookie('board_QnA_'.$index, TRUE, time()+(3600*24));//조회수 하루


        echo "asidflasjdflka";
        echo $_COOKIE['board_QnA_'.$index];
        echo $_COOKIE['board_QnA_'.$index];
    }


    //댓글들 정보 쿼리로 가져오기
    $search_query_comment="SELECT * FROM  QnAcomment_info WHERE QnASeq_check='$result[0]'";
    $re2=mysqli_query($con,$search_query_comment);


}
*/ ?>

-->


<!-- Contact Section Begin -->
<section class="contact spad">
    <div class="container">
        <form method="post" action="write_ action.php">
            <table class="table">
                <tr>
                    <td height=20 align=center bgcolor=#ccc><font color=white size="6">1대1 문의</font></td>
                </tr>
                <tr>
                    <td bgcolor=white>
                        <table class="table">
                            <tr>
                                <td>작성자</td>
                                <td>
                                    <?php
                                    echo $result[2];
                                    ?>
                                </td>
                            </tr>

                            <tr>
                                <td>제목</td>
                                <td>
                                    <?php
                                    echo $result[1];
                                    ?>
                                </td>
                            </tr>

                            <tr>
                                <td>내용</td>
                                <td>
                                    <?php
                                    echo $result[5];
                                    ?>
                                </td>
                            </tr>

                        </table>

                    </td>
                </tr>
            </table>
            <hr/>
            <?php if ($_SESSION["userId"] == 'root') {
            ?>
                <button type="button" class="btn btn-info pull-right" onclick="location.href='AdminPage.php?index=3'">목록</button>

                <?
                } else {
                ?>
                    <button type="button" class="btn btn-info pull-right" onclick="location.href='noticeboard.php?index=1'">목록
                    </button>
                    <?
                    }
                    ?>


                    <?php
                    if (isset($_SESSION["userId"]) && $result[2] == $_SESSION["userId"]) { ?>
                        <input type="button" class="btn btn-outline-dark pull-right" value="삭제하기"
                               onclick="location.href='QnAdelete_action.php?index=<?php echo $index; ?>'"/>

                        <input type="button" class="btn btn-outline-dark pull-right" value="수정하기"
                               onclick="location.href='QnAmodify.php?index=<?php echo $index; ?>'"/>
                    <?php }
                    ?>
        </form>
        <br>


        <!--여기서 부터 출력되는 댓글 -->
        <?php
        while ($result_comment = mysqli_fetch_array($re2)) {
            ?>
            <div>
                <hr>
                <span><strong>관리자</strong></span> <span id="cCnt"></span>
            </div>

            <br>
            <div>
                <input type="hidden" name="comment_seq" id="comment_seq" value="<?php echo $result_comment[0]; ?>">
                <span><?php echo $result_comment[4]; ?>
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <?php echo "작성날: " . $result_comment[3]; ?></span> <span id="cCnt"></span>

                <?php
                if (isset($_SESSION["userId"]) && $_SESSION["userId"] == 'root') {
                    ?>
                    <button class="btn pull-right btn-success" onclick="delete_comment()">삭제</button>
                    <!--                    <button class="btn pull-right btn-success" >수정</button>-->
                    <?php
                }
                ?>


                <hr>
            </div>
            <?php
        }
        ?>


        <!--여기서 부터 comment 입력창-->

        <?php
        if (isset($_SESSION["userId"]) && $_SESSION["userId"] == 'root') {
            ?>
            <br>
            <form id="commentForm" name="commentForm" method="post">
                <br><br>
                <div>
                    <div>
                        <span><strong>Comments</strong></span> <span id="cCnt"></span>
                    </div>
                    <div>
                        <table class="table">
                            <tr>
                                <input type="hidden" id="QnAseq" name="QnAseq" value="<?php echo $result[0]; ?>">
                                <textarea style="width: 1100px" rows="3" cols="30" id="comment" name="comment"
                                          placeholder="댓글을 입력하세요"></textarea>
                                <br>
                                <div>
                                    <button type="button" id="comment_btn" onclick="insert_comment()"
                                            class="btn pull-right btn-success">등록
                                    </button>
                                </div>
                                </td>
                            </tr>
                        </table>
                    </div>
                </div>
                <input type="hidden" id="b_code" name="b_code" value="${result.code }"/>
            </form>
            <form id="commentListForm" name="commentListForm" method="post">
                <div id="commentList">
                </div>
            </form>

            <?php
        }
        ?>


    </div>
</section>
<!-- Contact Section End -->


<script>
    function insert_comment() {
        $.ajax({
            url: '/homepage/comment_action.php',
            type: 'POST',
            data: {comment: $('#comment').val(), QnASeq: $('#QnAseq').val()},
            dataType: 'html',
            success: function (data) {
                if (data !== "") {//성공일때
                    alert(data);
                } else {//공백일떄, 이상없을때
                }
                location.reload(); //새로고침 해주기
            }
        });
    }


    function modify_comment() {
        $.ajax({
            url: '/homepage/comment_modify_action.php',
            type: 'POST',
            data: {comment: $('#comment').val(), QnASeq: $('#QnAseq').val()},
            dataType: 'html',
            success: function (data) {
                if (data !== "") {//성공일때
                } else {//공백일떄, 이상없을때
                    alert(data);
                }
                location.reload(); //새로고침 해주기
            }
        });
    }

    function delete_comment() {
        $.ajax({
            url: '/homepage/comment_delete_action.php',
            type: 'POST',
            data: {comment_seq: $('#comment_seq').val()},
            dataType: 'html',
            success: function (data) {
                if (data !== "") {//성공일때
                    alert(data);
                } else {//데이터가 공백일때, 이상있을때
                    alert('댓글이 지워지지 않습니다.');
                    alert(data);
                }
                location.reload(); //새로고침 해주기
            }
        });
    }
</script>

<!-- Instagram Begin -->
<div class="instagram">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-2 col-md-4 col-sm-4 p-0">
                <div class="instagram__item set-bg" data-setbg="img/instagram/insta-1.jpg">
                    <div class="instagram__text">
                        <i class="fa fa-instagram"></i>
                        <a href="#">@ ashion_shop</a>
                    </div>
                </div>
            </div>
            <div class="col-lg-2 col-md-4 col-sm-4 p-0">
                <div class="instagram__item set-bg" data-setbg="img/instagram/insta-2.jpg">
                    <div class="instagram__text">
                        <i class="fa fa-instagram"></i>
                        <a href="#">@ ashion_shop</a>
                    </div>
                </div>
            </div>
            <div class="col-lg-2 col-md-4 col-sm-4 p-0">
                <div class="instagram__item set-bg" data-setbg="img/instagram/insta-3.jpg">
                    <div class="instagram__text">
                        <i class="fa fa-instagram"></i>
                        <a href="#">@ ashion_shop</a>
                    </div>
                </div>
            </div>
            <div class="col-lg-2 col-md-4 col-sm-4 p-0">
                <div class="instagram__item set-bg" data-setbg="img/instagram/insta-4.jpg">
                    <div class="instagram__text">
                        <i class="fa fa-instagram"></i>
                        <a href="#">@ ashion_shop</a>
                    </div>
                </div>
            </div>
            <div class="col-lg-2 col-md-4 col-sm-4 p-0">
                <div class="instagram__item set-bg" data-setbg="img/instagram/insta-5.jpg">
                    <div class="instagram__text">
                        <i class="fa fa-instagram"></i>
                        <a href="#">@ ashion_shop</a>
                    </div>
                </div>
            </div>
            <div class="col-lg-2 col-md-4 col-sm-4 p-0">
                <div class="instagram__item set-bg" data-setbg="img/instagram/insta-6.jpg">
                    <div class="instagram__text">
                        <i class="fa fa-instagram"></i>
                        <a href="#">@ ashion_shop</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Instagram End -->

<!-- Footer Section Begin -->
<footer class="footer">
    <div class="container">
        <div class="row">
            <div class="col-lg-4 col-md-6 col-sm-7">
                <div class="footer__about">
                    <div class="footer__logo">
                        <a href="index.php"><img src="img/logo.png" alt=""></a>
                    </div>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt
                        cilisis.</p>
                    <div class="footer__payment">
                        <a href="#"><img src="img/payment/payment-1.png" alt=""></a>
                        <a href="#"><img src="img/payment/payment-2.png" alt=""></a>
                        <a href="#"><img src="img/payment/payment-3.png" alt=""></a>
                        <a href="#"><img src="img/payment/payment-4.png" alt=""></a>
                        <a href="#"><img src="img/payment/payment-5.png" alt=""></a>
                    </div>
                </div>
            </div>
            <div class="col-lg-2 col-md-3 col-sm-5">
                <div class="footer__widget">
                    <h6>Quick links</h6>
                    <ul>
                        <li><a href="#">About</a></li>
                        <li><a href="#">Blogs</a></li>
                        <li><a href="#">Contact</a></li>
                        <li><a href="#">FAQ</a></li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-2 col-md-3 col-sm-4">
                <div class="footer__widget">
                    <h6>Account</h6>
                    <ul>
                        <li><a href="#">My Account</a></li>
                        <li><a href="#">Orders Tracking</a></li>
                        <li><a href="#">Checkout</a></li>
                        <li><a href="#">Wishlist</a></li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-4 col-md-8 col-sm-8">
                <div class="footer__newslatter">
                    <h6>NEWSLETTER</h6>
                    <form action="#">
                        <input type="text" placeholder="Email">
                        <button type="submit" class="site-btn">Subscribe</button>
                    </form>
                    <div class="footer__social">
                        <a href="#"><i class="fa fa-facebook"></i></a>
                        <a href="#"><i class="fa fa-twitter"></i></a>
                        <a href="#"><i class="fa fa-youtube-play"></i></a>
                        <a href="#"><i class="fa fa-instagram"></i></a>
                        <a href="#"><i class="fa fa-pinterest"></i></a>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                <div class="footer__copyright__text">
                    <p>Copyright &copy;
                        <script>document.write(new Date().getFullYear());</script>
                        All rights reserved | This template is made with <i class="fa fa-heart" aria-hidden="true"></i>
                        by <a href="https://colorlib.com" target="_blank">Colorlib</a></p>
                </div>
                <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
            </div>
        </div>
    </div>
</footer>
<!-- Footer Section End -->

<!-- Search Begin -->
<div class="search-model">
    <div class="h-100 d-flex align-items-center justify-content-center">
        <div class="search-close-switch">+</div>
        <form class="search-model-form">
            <input type="text" id="search-input" placeholder="Search here.....">
        </form>
    </div>
</div>
<!-- Search End -->


<!-- Js Plugins -->
<script src="js/jquery-3.3.1.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/jquery.magnific-popup.min.js"></script>
<script src="js/jquery-ui.min.js"></script>
<script src="js/mixitup.min.js"></script>
<script src="js/jquery.countdown.min.js"></script>
<script src="js/jquery.slicknav.js"></script>
<script src="js/owl.carousel.min.js"></script>
<script src="js/jquery.nicescroll.min.js"></script>
<script src="js/main.js"></script>


</body>
</html>