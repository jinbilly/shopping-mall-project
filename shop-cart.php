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

                        $re = mysqli_query($con, $search_query);

                        $result = mysqli_fetch_array($re);
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


<?php
//해당 index 값 으로 쿼리 날려서 데이터 받아오기

$session = $_SESSION["userId"];

$search_query = "SELECT * FROM shop_cart_info WHERE userId = '$session'";

$re = mysqli_query($con, $search_query);

?>


<!-- Breadcrumb Begin -->
<div class="breadcrumb-option">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="breadcrumb__links">
                    <a href="index.php"><i class="fa fa-home"></i> Home</a>
                    <span>Shopping cart</span>
                </div>
            </div>
        </div>
    </div>
</div>



<!-- Breadcrumb End -->



<!-- Shop Cart Section Begin -->
<section class="shop-cart spad">
    <div class="container">


        <form action="checkout.php" method="post" onsubmit="return checkUpCart()">

            <div class="row">
                <div class="col-lg-12">
                    <div class="shop__cart__table">
                        <table>
                            <thead>
                            <tr>
                                <th>제품</th>
                                <th>상품 가격</th>
                                <th>수량</th>
                                <th>총 가격</th>
                                <th></th>
                            </tr>
                            </thead>
                            <tbody>

                            <?
                            while ($result11 = mysqli_fetch_array($re)) {


                                $search_query2 = "SELECT * FROM item_info WHERE itemSeq = '$result11[3]'";//아이템 seq로 해당 아이템정보 찾기

                                $re2 = mysqli_query($con, $search_query2);
                                $result2 = mysqli_fetch_array($re2);
                                ?>


                                <tr>
                                    <td class="cart__product__item">
                                        <img style="width: 100px" src=" <?php echo $result2[10];//이미지 경로 ?>" alt="">
                                        <div class="cart__product__item__title">
                                            <h6><?php echo $result2[1];//상품명 ?></h6>
                                        </div>
                                    </td>

                                    <td class="cart__price">
                                        <div name="price"
                                             id="price<?php echo $result2[0];//상품인덱스 ?>"><?php echo $result2[4];//상품가격 ?></div>
                                    </td>

                                    <td class="cart__quantity">
                                        <div>
                                            <input name="quantity[]" id="quantity<?php echo $result2[0];//상품인덱스 ?>"
                                                   type="number" value="1" min="1"
                                                   onchange="numUp(<?php echo $result2[0];//상품인덱스 ?>)"
                                                   style="width: 100px">
                                        </div>
                                    </td>


                                    <td name="sum" id="sum<?php echo $result2[0];//상품인덱스 ?>" class="cart__total">
                                        <?php echo $result2[4];//상품가격 ?>
                                        <input type="hidden" name="singleTotalPrice[]" value="<?php echo $result2[4];//상품가격?>">


                                        <?php $sum += $result2[4] //첫번째 페이지 들어오자 마자 있는 총 상품가격 합계의 계산을 위해 더해주기?>
                                    </td>


                                    <td class="cart__close">
                                    <span onclick="deleteItem(<?php echo $result2[0];//상품인덱스 ?>)" class="icon_close"></span></td>
                                </tr>

                                <?php

                                $result111=$result11[0];
                            }
                            ?>


                            <input type="hidden" id="re" name="re" value="<?php echo $result111; ?>"/>
                            <script>
                                function checkUpCart(){
                                    var re = document.getElementById('re').value;
                                    if( re == ""){
                                       alert("장바구니를 채워주세요");
                                        return false;
                                    }
                                }

                            </script>

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-6">
                    <div class="cart__btn">
                        <a href="shop.php?category=아우터">쇼핑 계속 하러가기</a>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-6">

                </div>
            </div>
            <div class="row">
                <div class="col-lg-6">

                </div>
                <div class="col-lg-4 offset-lg-2">
                    <div class="cart__total__procced">
                        <h6>상품가격 합계</h6>
                        <ul>
                            <li>Total <span id="totalPrice"><?php echo $sum; ?></span></li>
                            <input type="hidden" name="totalPrice" id="totalPrice">
                        </ul>

                        <button type="submit" class="site-btn" style="width: 100%">결제 하기</button>


                    </div>
                </div>
            </div>

        </form>


    </div>
</section>
<!-- Shop Cart Section End -->

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

<script>
    function numUp(result) {
        var price = document.getElementById('price' + result).textContent;
        var quantity = document.getElementById('quantity' + result).value;
        var sum = price * quantity;
        document.getElementById('sum' + result).innerText = sum;


        var totalSum = <?php echo $sum; ?>;

        totalSum = totalSum - price; //해당 제품 가격 빼주기
        totalSum = totalSum + sum; //새로 바뀐 제품 가격 더해주기
        document.getElementById('totalPrice').innerText = totalSum;//그려주기

    }

    function deleteItem(result) {
        $.ajax({
            url: '/homepage/shop_cart_delete_action.php',
            type: 'POST',
            data: {itemSeq: result},
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