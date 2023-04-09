<?php
session_start();
?>
<!DOCTYPE html>
<html lang="zxx">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="Ashion Template">
    <meta name="keywords" content="Ashion, unica, creative, html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Ashion | Template</title>

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

    <!-- 이미지 사이즈 적용 -->
    <link rel="stylesheet" href="css/imgsize.css">
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
                        <li class="active"><a href="shop.php?category=아우터">Shop</a></li>
                        <li><a href="noticeboard.php">board</a></li>
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


                        <a href="<?php if (isset($_SESSION["userId"])) {
                            echo 'myPage.php';
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

                        $re11 = mysqli_query($con, $search_query);

                        $result11 = mysqli_fetch_array($re11);

                        /*페이지 값을 받아오기*/
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
                                <div class="tip"><? echo $result11[0]; ?></div>
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

<?php
$category = $_GET["category"];
//테스트
//$search_query = "SELECT * FROM item_info WHERE category='$category' order by itemSeq DESC ";
//$re = mysqli_query($con, $search_query);
?>
<!-- Breadcrumb Begin -->
<div class="breadcrumb-option">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="breadcrumb__links">
                    <a href="index.php"><i class="fa fa-home"></i> Home</a>
                    <a href="#">Shop</a>
                    <span><?php echo $category; ?></span>

                </div>
            </div>
        </div>
    </div>
</div>
<!-- Breadcrumb End -->

<!-- Shop Section Begin -->
<section class="shop spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-md-3">
                <div class="shop__sidebar">
                    <div class="sidebar__categories">

                        <div class="categories__accordion">
                            <div class="accordion" id="accordionExample">
                                <div class="card">
                                    <div class="card-heading active">
                                        <a data-toggle="collapse" data-target="#collapseOne"><font size="5">카테고리</font></a>
                                    </div>
                                    <div id="collapseOne" class="collapse show" data-parent="#accordionExample">
                                        <div class="card-body">
                                            <ul>
                                                <li><a href="./shop.php?category=아우터">아우터</a></li>
                                                <li><a href="./shop.php?category=원피스">원피스</a></li>
                                                <li><a href="./shop.php?category=니트">니트</a></li>
                                                <li><a href="./shop.php?category=맨투맨">맨투맨</a></li>
                                                <li><a href="./shop.php?category=티셔츠">티셔츠</a></li>
                                                <li><a href="./shop.php?category=최근본상품">최근본상품</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>


                            </div>
                        </div>
                    </div>


                </div>
            </div>


            <div class="col-lg-9 col-md-9">
                <div class="row">


                    <?php
                    if ($category == "최근본상품") {
                        $today = explode(",", $_COOKIE["ViewProduct"]);
                        for ($i = 1; $i < 7 && $today[$i]; $i++) {

                            $search_query1 = "SELECT * FROM item_info WHERE itemName = '$today[$i]'";

                            $re1 = mysqli_query($con, $search_query1);

                            $result1 = mysqli_fetch_array($re1);
                            ?>

                            <div class="col-lg-4 col-md-6">
                                <div class="product__item">

                                    <div class="product__item__pic set-bg"
                                         href="product-details.php?itemName=<?php echo $result1[1]; ?>">
                                        <img class="product__item__pic set-bg" src="<?php echo $result1[10] ?>">
                                        <ul class="product__hover">
                                            <li>
                                                <a onclick="insert_comment('<?php echo $result1[1]; ?>',<?php echo $result1[0]; ?>)"><span
                                                            class="icon_bag_alt"></span></a></li>
                                        </ul>
                                    </div>


                                    <div class="product__item__text">
                                        <h6>
                                            <a href="product-details.php?itemName=<?php echo $result1[1]; ?>"><?php echo $result1[1]; ?></a>
                                        </h6>
                                        <br>
                                        <div class="product__price"> <?php echo number_format($result1[4]) . " 원"; ?> </div>
                                    </div>
                                </div>
                            </div>

                            <?php


                        }


                    } else {
                        //여기서 부터 상점 사진들 출력됨

                        $search_query = "SELECT * FROM item_info WHERE category='$category'";
                        $re = mysqli_query($con, $search_query);

                        $total_record = mysqli_num_rows($re);//테이블에 있는 모든 레코드 수
                        $list = 9;    //한 페이지에 보여줄 개수
                        $block_cnt = 3;//페이지에 보여질 블록 개수
                        $total_page_num = ceil($total_record / $list);//전체 페이지수(끝번호)

                        $block_num = ceil($page / $block_cnt);
                        $block_start = (($block_num - 1) * $block_cnt) + 1; //블록의 시작 번호

                        $block_end = $block_start + $block_cnt - 1;//블록의 마지막 번호

                        $total_page = ceil($total_record / $list);//페이징 한 페이지 수
                        if ($block_end > $total_page) {//블록의 마지막 번호가 페이지 수 보다 많다면 페이징 한 페이지의 수를 마지막 번호를 설정함
                            $block_end - $total_page;
                        }
                        $total_block = ceil($total_page / $block_cnt);
                        $page_start = ($page - 1) * $list;


                        $search_query2 = "SELECT * FROM item_info WHERE category='$category' ORDER BY itemSeq DESC LIMIT $page_start,$list";

                        $re2 = mysqli_query($con, $search_query2);


                        while ($result = mysqli_fetch_array($re2)) {
                            ?>
                            <div class="col-lg-4 col-md-6">
                                <div class="product__item">


                                    <div class="product__item__pic set-bg"
                                         href="product-details.php?itemName=<?php echo $result[1]; ?>">
                                        <img class="product__item__pic set-bg" src="<?php echo $result[10] ?>">
                                        <ul class="product__hover">
                                            <li>
                                                <a onclick="insert_comment('<?php echo $result[1]; ?>',<?php echo $result[0]; ?>)"><span
                                                            class="icon_bag_alt"></span></a></li>
                                        </ul>
                                    </div>


                                    <div class="product__item__text">
                                        <h6>
                                            <a href="product-details.php?itemName=<?php echo $result[1]; ?>"><?php echo $result[1]; ?></a>
                                        </h6>
                                        <br>
                                        <div class="product__price"> <?php echo number_format($result[4]) . " 원"; ?> </div>
                                    </div>



                                </div>
                            </div>

                            <?php
                        }
                        ?>


                        <div class="col-lg-12 text-center">
                            <div class="pagination__option">
                                <?php
                                //처음버튼
                                if ($page <= 1) {
                                    //빈값
                                } else {
                                    echo "<a href='shop.php?page=1&category=$category'><i class='fa fa-angle-double-left'></i></a>";
                                }
                                //이전
                                if ($page <= 1) {
                                } else {
                                    $pre = $page - 1;
                                    echo "<a href='shop.php?page=$pre&index=1&category=$category'><i class='fa fa-angle-left'></i></a>";
                                }

                                //끝번호 안넘어가게 정해주기
                                if ($block_end > $total_page_num) {
                                    $block_end = $total_page_num;
                                }

                                //본격 숫자 부분
                                for ($i = $block_start; $i <= $block_end; $i++) {
                                    if ($page == $i) {
                                        echo "<a href='#'>$i</a>";
                                    } else {
                                        echo "<a href='shop.php?page=$i&index=1&category=$category'>$i</a>";
                                    }
                                }

                                //다음
                                if ($page >= $total_page) {
                                    //빈값
                                } else {
                                    $next = $page + 1;
                                    echo "<a href='shop.php?page=$next&index=1&category=$category'><i class='fa fa-angle-right'></i></a>";

                                }
                                //마지막
                                if ($page >= $total_page) {
                                    //빈값
                                } else {
                                    echo "<a href='shop.php?page=$total_page&index=1&category=$category'><i class='fa fa-angle-double-right'></i></a>";
                                }
                                ?>


                            </div>
                        </div>


                        <?php

                    }
                    ?>


                </div>
            </div>
        </div>
    </div>
</section>
<!-- Shop Section End -->


<!--세션값으로 유저 id넘겨주기, 상품 이름 넘겨주기-->
<script>
    function insert_comment(itemName, itemSeq) {
        $.ajax({
            url: '/homepage/shop_cart_insert_action.php',
            type: 'POST',
            data: {itemName: itemName, itemSeq: itemSeq},
            dataType: 'html',
            success: function (data) {
                if (data !== "") {//성공일때
                    alert(data);
                } else {//공백일떄, 이상없을때
                    alert('실패');
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