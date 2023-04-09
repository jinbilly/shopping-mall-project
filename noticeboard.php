<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
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
    <script src="js/jquery-3.3.1.min.js"></script>


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
                        <li class="active"><a href="#">Board</a></li>
                        <li><a href="contact.php">Contact</a></li>

                        <?php
                        if (isset($_SESSION["userId"]) && $_SESSION["userId"] != 'root') { ?>
                            <li><a href="myPage.php">Mypage</a></li>
                            <?php
                        } else if (isset($_SESSION["userId"]) && $_SESSION["userId"] == 'root') {
                            ?>
                            <li><a href="AdminPage.php?index=1">Administor Page</a></li>
                            <?php
                        }
                        ?>

                    </ul>
                </nav>
            </div>
            <div class="col-lg-3">
                <div class="header__right">
                    <div class="header__right__auth">
                        <!--우측 상단 로그인 부분-->
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

                        <?php
                        //해당 index 값 으로 쿼리 날려서 데이터 받아오기
                        $con = mysqli_connect("127.0.0.1", "root", "1591", "shoppingmalldb");

                        $session = $_SESSION["userId"];

                        $search_query = "SELECT count(*) FROM shop_cart_info WHERE userId = '$session'";

                        $re = mysqli_query($con, $search_query);

                        $result = mysqli_fetch_array($re);

                        if (isset($_GET['page'])) {
                            $page = $_GET['page'];
                        } else {
                            $page = 1;
                        }

                        ?>

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
                    <span>Board</span>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Breadcrumb End -->


<!-- Contact Section Begin -->
<section class="contact spad">
    <div class="container">


        <div class="row">

            <div class="col-xl-3">
                <style type="text/css">
                    .menu {
                        height: 50px;
                        width: 140px;
                        border-radius: 0px;
                    }

                    .menu:hover, .menu:focus {
                        height: 50px;
                        width: 140px;
                        background: #00b0a2;
                        border-radius: 0px;
                    }

                </style>


                <?php
                if ($_GET['index'] == 2) {
                    ?>
                    <button type="button" onclick="location.href='noticeboard.php?index=1'"
                            class="btn btn-default menu ">공지사항
                    </button>
                    <br>
                    <button type="button" onclick="location.href='noticeboard.php?index=2'" href="index.php"
                            class="btn btn-info active menu">1대1 문의
                    </button>

                    <?php
                } else {
                    ?>
                    <button type="button" onclick="location.href='noticeboard.php?index=1'"
                            class="btn btn-info active menu ">공지사항
                    </button>
                    <br>
                    <button type="button" onclick="location.href='noticeboard.php?index=2'" href="index.php"
                            class="btn btn-default menu">1대1 문의
                    </button>


                    <?php
                }
                ?>


            </div>


            <div class="col-xl-9">
                <table id="QnA_table" class="table table-hover">
                    <thead>
                    <tr>
                        <th>제목</th>
                        <th>작성자</th>
                        <th>날짜</th>
                        <th>조회수</th>
                    </tr>
                    </thead>
                    <tbody>

                    <?php
                    if ($_GET['index'] == 2) {


                    $search_query = "SELECT * FROM QnA_info";

                    $re = mysqli_query($con, $search_query);


                    $total_record = mysqli_num_rows($re);//테이블에 있는 모든 레코드 수
                    $list = 5;    //한 페이지에 보여줄 개수
                    $total_page_num = ceil($total_record/$list);//전체 페이지수(끝번호)

                    $block_cnt = 3;//블록당 보여줄 페이지 개수
                    $block_num = ceil($page / $block_cnt);
                    $block_start = (($block_num - 1) * $block_cnt) + 1; //블록의 시작 번호

                    $block_end = $block_start + $block_cnt - 1;//블록의 마지막 번호

                    $total_page = ceil($total_record / $list);//페이징 한 페이지 수
                    if ($block_end > $total_page) {//블록의 마지막 번호가 페이지 수 보다 많다면 페이징 한 페이지의 수를 마지막 번호를 설정함
                        $block_end - $total_page;
                    }
                    $total_block = ceil($total_page / $block_cnt);
                    $page_start = ($page - 1) * $list;

                    /*게시글 정보 가져오기*/

                    $search_query2 = "SELECT * FROM QnA_info ORDER BY QnASeq DESC LIMIT $page_start,$list";


                    $re2 = mysqli_query($con, $search_query2);


                    while ($result = mysqli_fetch_array($re2)) {

                        ?>
                        <tr onclick="location.href='QnAread.php?index=<?php echo $result[0]; ?>'">
                            <td><?php echo $result[1]; ?></td>
                            <td><?php echo $result[2]; ?></td>
                            <td><?php echo $result[3]; ?></td>
                            <td><?php echo $result[4]; ?></td>

                        </tr>
                        <?php
                    }
                    ?>

                    </tbody>
                </table>
                <hr/>

                <?php
                if (isset($_SESSION["userId"]) && $_SESSION["userId"] !== "root" && $_GET['index'] == 2) { ?>
                    <button type="button" class="btn btn-outline-dark pull-right"
                            onclick="location.href='QnAwrite.php'">글쓰기
                    </button>
                    <?php
                } else if (isset($_SESSION["userId"]) && $_SESSION["userId"] === "root" && $_GET['index'] == 1) {
                    ?>
                    <button type="button" class="btn btn-outline-dark pull-right"
                            onclick="location.href='NoticeWrite.php'">글쓰기
                    </button>
                    <?php
                }
                ?>

                <!--하단 숫자-->
                <nav aria-label="Page navigation example">
                    <ul class="pagination justify-content-center">


                        <?php
                        if ($page <= 1) {
                            //빈값
                        } else {
                            echo '<li class="page-item">';
                            echo '   <a class="page-link" href="noticeboard.php?page=1&index=2" tabindex="-1">처음</a>';
                            echo '</li>';

                        }
                        if ($page <= 1) {

                        } else {
                            $pre = $page - 1;
                            echo '<li class="page-item">';
                            echo "   <a class='page-link' href='noticeboard.php?page=$pre&index=2' tabindex='-1'>이전</a>";
                            echo '</li>';
                        }

                        //끝번호 안넘어가게 정해주기
                        if($block_end>$total_page_num){
                            $block_end=$total_page_num;
                        }

                        for ($i = $block_start; $i <= $block_end; $i++) {
                            if ($page == $i) {
                                echo " <li class='page-item disabled'><a class='page-link' href='#'>$i</a></li>";
                            } else {
                                echo " <li class='page-item '><a class='page-link' href='noticeboard.php?page=$i&index=2'>$i</a></li>";
                            }
                        }

                        if ($page >= $total_page) {
                            //빈값
                        } else {
                            $next = $page + 1;
                            echo '<li class="page-item">';
                            echo "   <a class='page-link'  href='noticeboard.php?page=$next&index=2' tabindex='-1'>다음</a>";
                            echo '</li>';
                        }
                        if ($page >= $total_page) {
                            //빈값
                        } else {
                            echo '<li class="page-item">';
                            echo "   <a class='page-link' href='noticeboard.php?page=$total_page&index=2' tabindex='-1'>마지막</a>";
                            echo '</li>';
                        }
                        ?>


                    </ul>
                </nav>


            </div>


            <?php
            } else {
                $search_query = "SELECT * FROM Notice_info";

                $re = mysqli_query($con, $search_query);


                $total_record = mysqli_num_rows($re);//테이블에 있는 모든 레코드 수
                $list = 5;    //한 페이지에 보여줄 개수
                $block_cnt = 3;//페이지에 보여질 블록 개수
                $total_page_num = ceil($total_record/$list);//전체 페이지수(끝번호)

                $block_num = ceil($page / $block_cnt);
                $block_start = (($block_num - 1) * $block_cnt) + 1; //블록의 시작 번호

                $block_end = $block_start + $block_cnt - 1;//블록의 마지막 번호

                $total_page = ceil($total_record / $list);//페이징 한 페이지 수
                if ($block_end > $total_page) {//블록의 마지막 번호가 페이지 수 보다 많다면 페이징 한 페이지의 수를 마지막 번호를 설정함
                    $block_end - $total_page;
                }
                $total_block = ceil($total_page / $block_cnt);
                $page_start = ($page - 1) * $list;

                /*게시글 정보 가져오기*/

                $search_query2 = "SELECT * FROM Notice_info ORDER BY NoticeSeq DESC LIMIT $page_start,$list";

                $re2 = mysqli_query($con, $search_query2);


                while ($result = mysqli_fetch_array($re2)) {
                    ?>
                    <tr onclick="location.href='NoticeRead.php?index=<?php echo $result[0]; ?>'">
                        <td><?php echo $result[1]; ?></td>
                        <td><?php echo $result[2]; ?></td>
                        <td><?php echo $result[3]; ?></td>
                        <td><?php echo $result[4]; ?></td>
                    </tr>
                    <?php
                }
                ?>

                </tbody>
                </table>
                <hr/>

                <?php
                if (isset($_SESSION["userId"]) && $_SESSION["userId"] !== "root" && $_GET['index'] == 2) { ?>
                    <button type="button" class="btn btn-outline-dark pull-right"
                            onclick="location.href='QnAwrite.php'">글쓰기
                    </button>
                    <?php
                } else if (isset($_SESSION["userId"]) && $_SESSION["userId"] === "root" && $_GET['index'] == 1) {
                    ?>
                    <button type="button" class="btn btn-outline-dark pull-right"
                            onclick="location.href='NoticeWrite.php'">글쓰기
                    </button>
                    <?php
                }
                ?>
                <!--하단 숫자-->
                <nav aria-label="Page navigation example">
                    <ul class="pagination justify-content-center">


                        <?php
                        //처음으로
                        if ($page <= 1) {
                            //빈값
                        } else {
                            echo '<li class="page-item">';
                            echo '   <a class="page-link" href="noticeboard.php?page=1&index=1" tabindex="-1">처음</a>';
                            echo '</li>';

                        }
                        //이전
                        if ($page <= 1) {

                        } else {
                            $pre = $page - 1;
                            echo '<li class="page-item">';
                            echo "   <a class='page-link' href='noticeboard.php?page=$pre&index=1' tabindex='-1'>이전</a>";
                            echo '</li>';
                        }


                        //끝번호 안넘어가게 정해주기
                        if($block_end>$total_page_num){
                            $block_end=$total_page_num;
                        }
                        //본격 숫자 부분
                        for ($i = $block_start; $i <= $block_end; $i++) {
                            if ($page == $i) {
                                echo " <li class='page-item disabled'><a class='page-link' href='#'>$i</a></li>";
                            } else {
                                echo " <li class='page-item '><a class='page-link' href='noticeboard.php?page=$i&index=1'>$i</a></li>";
                            }
                        }
                        //다음
                        if ($page >= $total_page) {
                            //빈값
                        } else {
                            $next = $page + 1;
                            echo '<li class="page-item">';
                            echo "   <a class='page-link'  href='noticeboard.php?page=$next&index=1' tabindex='-1'>다음</a>";
                            echo '</li>';
                        }
                        //마지막으로
                        if ($page >= $total_page) {
                            //빈값
                        } else {
                            echo '<li class="page-item">';
                            echo "   <a class='page-link' href='noticeboard.php?page=$total_page&index=1' tabindex='-1'>마지막</a>";
                            echo '</li>';
                        }
                        ?>


                    </ul>
                </nav>
        </div>
                <?php
            }
            ?>


        </div>

    </div>


    </div>
</section>
<!-- Contact Section End -->


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
                        | This template is modify by 진혁준 <i class="fa fa-heart" aria-hidden="true"></i></p>
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