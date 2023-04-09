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
        <li><a href="shop-cart.php">장바구니<span class="icon_bag_alt"></span>
                <div class="tip">10</div>
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

                        $re = mysqli_query($con, $search_query);

                        $result = mysqli_fetch_array($re);

                        $itemName = $_GET['itemName'];//상품 이름 get으로 받기


                        /*조회수 증가를 위함*/
                        $search_query9 = "SELECT * FROM item_info WHERE itemName ='$itemName'";
                        $re9 = mysqli_query($con, $search_query9);
                        $result9 = mysqli_fetch_array($re9);


                        $view_add_one = $result9[16] + 1;//db 상에 있는 기존 상품 조회수 가져와서 1 더해주기
                        $views_update_query = "UPDATE item_info SET hits =$view_add_one WHERE itemSeq  ='$result9[0]'";
                        mysqli_query($con, $views_update_query);


                        /*최근 본 상품 쿠키에 넣어주는 부분*/
                        $viewproduct = $_COOKIE["ViewProduct"]; // 쿠키 불러오기

                        if (strrpos(" " . $viewproduct, "," . $itemName . ",") == 0) {
                            if (strlen($viewproduct) == 0) {
                                $viewproduct = "," . $itemName . ",";
                            } else {
                                $viewproduct = "," . $itemName . $viewproduct;
                            }
                        } else {
                            $viewproduct = str_replace("," . $itemName . ",", ",", $viewproduct);
                            $viewproduct = "," . $itemName . $viewproduct;
                        }
                        $viewproduct = substr($viewproduct, 0, 571);

                        setcookie("ViewProduct", $viewproduct, 0);

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
</header>
<!-- Header Section End -->

<?php


$search_query = "SELECT * FROM item_review WHERE itemName='$itemName'";
$re = mysqli_query($con, $search_query);


$num_query = "SELECT count(*) FROM item_review WHERE itemName = '$itemName'";
$re2 = mysqli_query($con, $num_query);
$result2 = mysqli_fetch_array($re2);


$item_search_query = "SELECT * FROM item_info WHERE itemName='$itemName'";
$re3 = mysqli_query($con, $item_search_query);
$result = mysqli_fetch_array($re3);
?>


<!-- Breadcrumb Begin -->
<div class="breadcrumb-option">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="breadcrumb__links">
                    <a href="index.php"><i class="fa fa-home"></i> Home</a>

                    <a href="#">
                        product detail
                    </a>
                    <span>
                            <?php echo $itemName; ?>
                        </span>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Breadcrumb End -->

<!-- Product Details Section Begin -->
<section class="product-details spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-6">

                <div class="product__details__pic">


                    <!--                    좌측 미리보기 사진 4개-->
                    <!--                    <div class="product__details__pic__left product__thumb nice-scroll">-->
                    <!--                        <a class="pt active" href="#product-1">-->
                    <!--                            <img src="img/product/details/thumb-1.jpg" alt="">-->
                    <!--                        </a>-->
                    <!--                        <a class="pt" href="#product-2">-->
                    <!--                            <img src="img/product/details/thumb-2.jpg" alt="">-->
                    <!--                        </a>-->
                    <!--                        <a class="pt" href="#product-3">-->
                    <!--                            <img src="img/product/details/thumb-3.jpg" alt="">-->
                    <!--                        </a>-->
                    <!--                        <a class="pt" href="#product-4">-->
                    <!--                            <img src="img/product/details/thumb-4.jpg" alt="">-->
                    <!--                        </a>-->
                    <!--                    </div>-->


                    <!--                    좌우 버튼 있는 사진-->
                    <div class="product__details__slider__content">
                        <div class="product__details__pic__slider owl-carousel">
                            <img data-hash="product-1" class="product__big__img" src="<?php echo $result[10]; ?>"
                                 alt="">
                        </div>
                    </div>
                </div>
            </div>


            <!--세션값으로 유저 id넘겨주기, 상품 이름 넘겨주기-->
            <script>
                function insert_comment() {
                    $.ajax({
                        url: '/homepage/shop_cart_insert_action.php',
                        type: 'POST',
                        data: {
                            itemName: "<?php echo $_GET['itemName']; ?>",
                            itemSeq: "<?php echo $result[0]; ?>"
                        },
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

                function delete_item() {
                    $.ajax({
                        url: '/homepage/product_delete_action.php',
                        type: 'POST',
                        data: {itemSeq: "<?php echo $result[0]; ?>"},
                        dataType: 'html',
                        success: function (data) {
                            if (data !== "") {//성공일때
                                alert(data);
                            } else {//공백일떄, 이상없을때
                                alert('실패');
                            }
                            location.href = 'shop.php?category=아우터'; //새로고침 해주기
                        }
                    });
                }

            </script>


            <div class="col-lg-6">
                <div class="product__details__text">
                    <form action="checkout.php" method="post">
                        <h3><?php echo $_GET[itemName] ?> <span>Brand: <?php echo $result[3]; ?></span></h3>

                        <?php $category = $result[2];//카테고리 넣어주기 ?>

                        <div class="rating">
                            <span>( <?php echo $result2[0]; ?> reviews )</span>
                        </div>


                        <div class="product__details__price">₩<?php echo number_format($result[4]); ?> </div>
                        <p><?php echo $result[11]; ?></p>

                        <!--바로 구매하기 버튼을 눌렀을때 submit해주는 값-->
                        <input name="buyOneSubmitItemSeq" value="<?php echo $result[0]; ?>" type="hidden"
                               id="buyOneSubmitItemSeq">


                        <div class="product__details__button">

                            <!--                        <div class="quantity">-->
                            <!--                            <span>수량:</span>-->
                            <!--                            <div class="pro-qty">-->
                            <!--                                <input type="text" value="1" name="amount">-->
                            <!--                            </div>-->
                            <!--                        </div>-->
                            <?php
                            if ($session != 'root') {
                                ?>

                                <input class="btn btn-outline-dark" type="submit" value="구매하기">

                                <button class="btn btn-outline-danger" type="button" onclick="insert_comment()"><span
                                            class="icon_bag_alt">카트에 담기</span></button>


                                <?php
                            } else {
                                ?>
                                <button class="btn btn-outline-dark" type="button"
                                        onclick="location.href='product_modify_page.php?seq=<? echo $result[0]; ?>>'">상품 수정
                                </button>

                                <button class="btn btn-outline-dark" type="button" onclick="delete_item()">상품 삭제
                                </button>
                            <? } ?>


                            <!--                        <ul>-->
                            <!--                            <li><a href="#"><span class="icon_heart_alt"></span></a></li>-->
                            <!--                        </ul>-->
                        </div>


                        <div class="product__details__widget">
                            <ul>
<!--                                <li>-->
<!--                                    <span>남은수량:</span>-->
<!--                                    --><?php //echo $result[5] . " 개"; ?>
<!--                                </li>-->

                                <li>
                                    <span>사이즈:</span>
                                    <div class="size__btn">
                                        <label for="Free-btn" class="active">
                                            <input type="radio" id="Free-btn">
                                            Free 사이즈
                                        </label>

                                    </div>
                                </li>
                                <li>
                                    <span>프로모션:</span>
                                    <p>없음</p>
                                </li>
                            </ul>
                        </div>
                    </form>
                </div>
            </div>


            <div class="col-lg-12">
                <div class="product__details__tab">


                    <!-- 상단 3개의 상세설명....리뷰 글자 -->
                    <ul class="nav nav-tabs" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" data-toggle="tab" href="#tabs-1" role="tab">상세 설명</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href="#tabs-2" role="tab">옷 치수 정보</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href="#tabs-3" role="tab">리뷰
                                ( <?php echo $result2[0]; ?> )</a>
                        </li>
                    </ul>


                    <div class="tab-content">

                        <div class="tab-pane active" id="tabs-1" role="tabpanel">
                            <!--상세 설명-->
                            <?php echo $result[12]; ?>

                        </div>


                        <div class="tab-pane " id="tabs-2" role="tabpanel">


                            <div class="tb-center">
                                <table style="border-collapse: collapse; width: 100%; max-width: 700px; text-align: center; font-size:12px; color: #000; margin:0 auto;

margin-bottom: 8px; border: 1px solid #ddd;">
                                    <tbody>
                                    <tr style="height: 50px; background:#f9f9f9; line-height:50px;">
                                        <th style="padding:0px 0px; border: 1px solid #ddd;">사이즈</th>
                                        <th style="padding:0px 0px; border: 1px solid #ddd;">어깨-소매</th>
                                        <th style="padding:0px 0px; border: 1px solid #ddd;">가슴단면</th>
                                        <th style="padding:0px 0px; border: 1px solid #ddd;">어깨너비</th>
                                        <th style="padding:0px 0px; border: 1px solid #ddd;">소매길이</th>
                                        <th style="padding:0px 0px; border: 1px solid #ddd;">밑단둘레</th>
                                        <th style="padding:0px 0px; border: 1px solid #ddd;">총기장</th>
                                    </tr>
                                    <tr style="height: 50px; line-height:50px;">
                                        <td style="border:1px solid #ddd;">Free</td>
                                        <td style="border:1px solid #ddd;"><?php echo $result[14]; ?></td>
                                        <td style="border:1px solid #ddd;"><?php echo $result[8]; ?></td>
                                        <td style="border:1px solid #ddd;"><?php echo $result[7]; ?></td>
                                        <td style="border:1px solid #ddd;"><?php echo $result[9]; ?></td>
                                        <td style="border:1px solid #ddd;"><?php echo $result[15]; ?></td>
                                        <td style="border:1px solid #ddd;"><?php echo $result[6]; ?></td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>


                        </div>


                        <div class="tab-pane " id="tabs-3" role="tabpanel">
                            <div id="accordion">
                                <?php
                                while ($result22 = mysqli_fetch_array($re)) {
                                    ?>

                                    <div class="card border-default mb-3">
                                        <div id="headingTwo" class="card-header p-0 border-0">
                                            <h4 class="mb-0"><a href="#" data-toggle="collapse"
                                                                data-target="#num<?php echo $result22[0]; ?>"
                                                                aria-expanded="false" aria-controls="collapseTwo"
                                                                class="btn btn-default d-block text-left rounded-0 collapsed">

                                                    제목: <?php echo $result22[4]; ?><?php echo " (" . $result22[3] . ")"; ?>
                                                </a></h4>

                                        </div>
                                        <div id="num<?php echo $result22[0]; ?>" aria-labelledby="headingTwo"
                                             data-parent="#accordion"
                                             class="collapse" style="">
                                            <div class="card-body">
                                                작성자:<?php echo $result22[2]; ?>
                                                <br>
                                                <?php echo $result22[5]; ?>

                                                <hr>


                                            </div>
                                        </div>
                                    </div>

                                    <?php
                                }
                                ?>


                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>


        <script>
            $(function () {
                $("#rep_btn").click(function () {
                    $.ajax({
                        url: "ProductReview_reply_ok.php",
                        type: "post",
                        data: {
                            content: $('#rep_content').val(),
                            itemcode: $('#itemcode').val(),

                        },
                        success: function (data) {
                            alert("댓글이 작성되었습니다.");
                            location.reload();
                        }
                    });

                });

                $("#del_btn").click(function () {
                    $("#rep_modal_del").modal();
                })

            })
        </script>


        <div class="row">
            <div class="col-lg-12 text-center">
                <div class="related__title">
                    <h5>연관된 제품들</h5>
                </div>
            </div>

            <?php







            $locate_search_query = "SELECT * FROM item_info WHERE category='$category' ORDER BY itemSeq DESC LIMIT 4";

            $locate_re = mysqli_query($con, $locate_search_query);

            while ($locate_result = mysqli_fetch_array($locate_re)) {
                ?>
                <div class="col-lg-3 col-md-4 col-sm-6">
                    <div class="product__item">


                        <div class="product__item__pic set-bg"
                             href="product-details.php?itemName=<?php echo $locate_result[1]; ?>">
                            <img class="product__item__pic set-bg" src="<?php echo $locate_result[10] ?>">
                            <ul class="product__hover">
                                <li><a href="#"><span class="icon_heart_alt"></span></a></li>
                                <li>
                                    <a onclick="insert_comment('<?php echo $locate_result[1]; ?>',<?php echo $locate_result[0]; ?>)"><span
                                                class="icon_bag_alt"></span></a></li>
                            </ul>
                        </div>


                        <div class="product__item__text">
                            <h6>
                                <a href="product-details.php?itemName=<?php echo $result[1]; ?>"><?php echo $result[1]; ?></a>
                            </h6>
                            <br>
                            <div class="product__price"> <?php echo $result[4] . " 원"; ?> </div>
                        </div>


                    </div>
                </div>
            <? } ?>


        </div>
    </div>
</section>
<!-- Product Details Section End -->

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