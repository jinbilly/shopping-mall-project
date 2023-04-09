<?php

if (isset($_COOKIE['userIdCookie'])) {
    session_start();
    $_SESSION['userId'] = $_COOKIE['userIdCookie'];
} else {
    session_start();
}

    if (!isset($_SESSION["userId"])){
        header("Location: http://127.0.0.1/homepage/login.php");
    }





?>

<!DOCTYPE html>
<html lang="zxx">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="Ashion Template">
    <meta name="keywords" content="Ashion, unica, creative, html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Azzshion | Template</title>

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
                <div class="tip">5</div>
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
                        <li class="active"><a href="index.php">Home</a></li>
                        <li><a href="shop.php?category=아우터">Shop</a></li>
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

            <?php
            //해당 index 값 으로 쿼리 날려서 데이터 받아오기

            $con = mysqli_connect("127.0.0.1", "root", "1591", "shoppingmalldb");

            $session = $_SESSION["userId"];

            $search_query = "SELECT count(*) FROM shop_cart_info WHERE userId = '$session'";

            $re = mysqli_query($con, $search_query);

            $result = mysqli_fetch_array($re);

            ?>


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

<!-- Categories Section Begin -->
<section class="categories">
    <div class="container-fluid">
        <div class="categories__item categories__large__item set-bg"
             data-setbg="img/categories/category-1.jpg">
            <div class="categories__text">
                <h1>Women’s fashion</h1>
                <p>Sitamet, consectetur adipiscing elit, sed do eiusmod tempor incidid-unt labore
                    edolore magna aliquapendisse ultrices gravida.</p>
                <a href="shop.php?category=아우터">Shop now</a>
            </div>
        </div>
    </div>
</section>
<!-- Categories Section End -->

<!-- Product Section Begin -->
<section class="product spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-4 col-md-4">
                <div class="section-title">
                    <h4>hit product</h4>
                </div>
            </div>
            <div class="col-lg-8 col-md-8">
                <ul class="filter__controls">
                    <li class="active" data-filter="*">All</li>
                    <li data-filter=".아우터">아우터</li>
                    <li data-filter=".원피스">원피스</li>
                    <li data-filter=".니트">니트</li>
                    <li data-filter=".맨투맨">맨투맨</li>
                    <li data-filter=".티셔츠">티셔츠</li>
                </ul>
            </div>
        </div>


        <div class="row property__gallery">

            <?php
            $search_queryAll = "SELECT * FROM item_info  order by itemSeq DESC LIMIT 8 ";
            $reAll = mysqli_query($con, $search_queryAll);

            $search_queryOuter = "SELECT * FROM item_info WHERE category='아우터' order by itemSeq DESC LIMIT 4";
            $reOuter = mysqli_query($con, $search_queryOuter);

            $search_queryOnePeace = "SELECT * FROM item_info WHERE category='원피스' order by itemSeq DESC LIMIT 4";
            $reOnePeace = mysqli_query($con, $search_queryOnePeace);

            $search_queryKnit = "SELECT * FROM item_info WHERE category='니트' order by itemSeq DESC LIMIT 4";
            $reKnit = mysqli_query($con, $search_queryKnit);

            $search_queryMentoMen = "SELECT * FROM item_info WHERE category='맨투맨' order by itemSeq DESC LIMIT 4";
            $reMenToMen = mysqli_query($con, $search_queryMentoMen);

            $search_queryTshirt = "SELECT * FROM item_info WHERE category='티셔츠' order by itemSeq DESC LIMIT 4";
            $reTshirt = mysqli_query($con, $search_queryTshirt);
            ?>



            <?
            while ($result = mysqli_fetch_array($reOuter)) {
                ?>
                <div class="col-lg-3 col-md-4 col-sm-6 mix 아우터">
                    <div class="product__item">

                        <div class="product__item__pic set-bg"
                             href="product-details.php?itemName=<?php echo $result[1]; ?>">
                            <img class="product__item__pic set-bg" src="<?php echo $result[10] ?>">
                            <ul class="product__hover">
                                <li><a onclick="insert_comment('<?php echo $result[1]; ?>',<?php echo $result[0]; ?>)"><span class="icon_bag_alt"></span></a></li>
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
                <?
            }
            ?>


            <?
            while ($result = mysqli_fetch_array($reOnePeace)) {
                ?>
                <div class="col-lg-3 col-md-4 col-sm-6 mix 원피스">
                    <div class="product__item">

                        <div class="product__item__pic set-bg"
                             href="product-details.php?itemName=<?php echo $result[1]; ?>">
                            <img class="product__item__pic set-bg" src="<?php echo $result[10] ?>">
                            <ul class="product__hover">
                                <li><a onclick="insert_comment('<?php echo $result[1]; ?>',<?php echo $result[0]; ?>)"><span class="icon_bag_alt"></span></a></li>
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
                <?
            }
            ?>
            <?
            while ($result = mysqli_fetch_array($reKnit)) {
                ?>
                <div class="col-lg-3 col-md-4 col-sm-6 mix 니트">
                    <div class="product__item">

                        <div class="product__item__pic set-bg"
                             href="product-details.php?itemName=<?php echo $result[1]; ?>">
                            <img class="product__item__pic set-bg" src="<?php echo $result[10] ?>">
                            <ul class="product__hover">
                                <li><a onclick="insert_comment('<?php echo $result[1]; ?>',<?php echo $result[0]; ?>)"><span class="icon_bag_alt"></span></a></li>
                            </ul>
                        </div>


                        <div class="product__item__text">
                            <h6>
                                <a href="product-details.php?itemName=<?php echo $result[1]; ?>"><?php echo $result[1]; ?></a>
                            </h6>
                            <br>
                            <div class="product__price"> <?php echo  number_format($result[4]) . " 원"; ?> </div>
                        </div>


                    </div>
                </div>
                <?
            }
            ?>
            <?
            while ($result = mysqli_fetch_array($reMenToMen)) {
                ?>
                <div class="col-lg-3 col-md-4 col-sm-6 mix 맨투맨">
                    <div class="product__item">

                        <div class="product__item__pic set-bg"
                             href="product-details.php?itemName=<?php echo $result[1]; ?>">
                            <img class="product__item__pic set-bg" src="<?php echo $result[10] ?>">
                            <ul class="product__hover">
                                <li><a onclick="insert_comment('<?php echo $result[1]; ?>',<?php echo $result[0]; ?>)"><span class="icon_bag_alt"></span></a></li>
                            </ul>
                        </div>


                        <div class="product__item__text">
                            <h6>
                                <a href="product-details.php?itemName=<?php echo $result[1]; ?>"><?php echo $result[1]; ?></a>
                            </h6>
                            <br>
                            <div class="product__price"> <?php echo  number_format($result[4]). " 원"; ?> </div>
                        </div>


                    </div>
                </div>
                <?
            }
            ?>
            <?
            while ($result = mysqli_fetch_array($reTshirt)) {
                ?>
                <div class="col-lg-3 col-md-4 col-sm-6 mix 티셔츠">
                    <div class="product__item">

                        <div class="product__item__pic set-bg"
                             href="product-details.php?itemName=<?php echo $result[1]; ?>">
                            <img class="product__item__pic set-bg" src="<?php echo $result[10] ?>">
                            <ul class="product__hover">

                                <li><a onclick="insert_comment('<?php echo $result[1]; ?>',<?php echo $result[0]; ?>)"><span class="icon_bag_alt"></span></a></li>
                            </ul>
                        </div>


                        <div class="product__item__text">
                            <h6>
                                <a href="product-details.php?itemName=<?php echo $result[1]; ?>"><?php echo $result[1]; ?></a>
                            </h6>
                            <br>
                            <div class="product__price"> <?php echo  number_format($result[4]) . " 원"; ?> </div>
                        </div>


                    </div>
                </div>
                <?
            }
            ?>





<!--            <div class="col-lg-3 col-md-4 col-sm-6 mix accessories">-->
<!--                <div class="product__item">-->
<!--                    <div class="product__item__pic set-bg" data-setbg="img/product/product-3.jpg">-->
<!--                        <div class="label stockout">out of stock</div>-->
<!--                        <ul class="product__hover">-->
<!--                            <li><a href="img/product/product-3.jpg" class="image-popup"><span-->
<!--                                            class="arrow_expand"></span></a></li>-->
<!--                            <li><a href="#"><span class="icon_heart_alt"></span></a></li>-->
<!--                            <li><a href="#">장바구니<span class="icon_bag_alt"></span></a></li>-->
<!--                        </ul>-->
<!--                    </div>-->
<!--                    <div class="product__item__text">-->
<!--                        <h6><a href="#">Cotton T-Shirt</a></h6>-->
<!--                        <div class="rating">-->
<!--                            <i class="fa fa-star"></i>-->
<!--                            <i class="fa fa-star"></i>-->
<!--                            <i class="fa fa-star"></i>-->
<!--                            <i class="fa fa-star"></i>-->
<!--                            <i class="fa fa-star"></i>-->
<!--                        </div>-->
<!--                        <div class="product__price">$ 59.0</div>-->
<!--                    </div>-->
<!--                </div>-->
<!--            </div>-->


        </div>
    </div>
</section>
<!-- Product Section End -->

<!-- Banner Section Begin -->
<section class="banner set-bg" data-setbg="img/banner/banner-1.jpg">
    <div class="container">
        <div class="row">
            <div class="col-xl-7 col-lg-8 m-auto">
                <div class="banner__slider owl-carousel">
                    <div class="banner__item">
                        <div class="banner__text">
                            <span>All product free deliver</span>
                            <h1>Free deliver</h1>
                        </div>
                    </div>
                    <div class="banner__item">
                        <div class="banner__text">
                            <span>24h call service</span>
                            <h1>call service</h1>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Banner Section End -->


<!-- Services Section Begin -->
<section class="services spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-4">
                <div class="services__item">
                    <i class="fa fa-car"></i>
                    <h6>무료 배송</h6>
                    <p>전 상품 무료배송</p>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="services__item">
                    <i class="fa fa-money"></i>
                    <h6>적립금 이벤트 </h6>
                    <p>추후 적립금 제도 시행 예정</p>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="services__item">
                    <i class="fa fa-headphones"></i>
                    <h6>24시간 전화 문의 가능</h6>
                    <p>24시간 상담원과 전화 통화 가능</p>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Services Section End -->

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