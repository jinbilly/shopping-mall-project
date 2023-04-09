<?php
session_start();
if (isset($_SESSION["userId"])&& $_SESSION["userId"]=='root'){
    ?>

    <?php
}else{
    $URL = './login.php';
    ?>
    <script>
        alert("<?php echo "잘못된 접근입니다." ?>");
        location.replace("<?php echo $URL?>");
    </script>

    <?php
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

    <script type="text/javascript" src="nse/nse_files/js/HuskyEZCreator.js" charset="utf-8"></script>
    <style>
        .nse_content {
            width: 660px;
            height: 500px
        }
    </style>
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
                        <li><a href="shop.php?category=아우터">Shop</a></li>
                        <li><a href="noticeboard.php?index=1">Board</a></li>
                        <li><a href="contact.php">Contact</a></li>
                        <li class="active"><a href="#">Administer Page</a></li>
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
                    </div>


                    <ul class="header__right__widget">

                        <li><a><span></span>
                                <div></div>
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


<!-- Shop Section Begin -->
<section class="shop spad">
    <div class="container-fluid">
        <div class="row">
            <div class="col-xl-1">


            </div>

            <?php
            //해당 index 값 으로 쿼리 날려서 데이터 받아오기

            $con = mysqli_connect("127.0.0.1", "root", "1591", "shoppingmalldb");

            $session = $_SESSION["userId"];

            $seq=$_GET['seq'];//상품 시퀀스 값 받기
            //할일 : 받은 seq값으로 상품 조회해서 데이터 빈칸에다가 뿌려주기


            $search_query = "SELECT * FROM user_info WHERE id = '$session'";
            $re = mysqli_query($con, $search_query);
            $result = mysqli_fetch_array($re);



            $seq_query = "SELECT * FROM item_info WHERE itemSeq = '$seq'"; //받아온 seq값으로 뿌려줄 아이템 정보 불러오기 쿼리
            $re_seq_query = mysqli_query($con, $seq_query);
            $result_seq_query = mysqli_fetch_array($re_seq_query);



            ?>


            <!--여기서부터 우측 섹션-->
            <div class="col-xl-10">


                <table id="QnA_table" class="table table-hover">
                    <thead>
                    <tr>
                    </tr>
                    </thead>
                    <tbody>

                    <div class="container">
                        <form action="upload_modify_file.php" method="post" enctype="multipart/form-data">
                            <div>
                                    <span height=20 align=center bgcolor=#ccc style="width: 100%"><font color=black size="6">상품 수정</font></span>
                            </div>

                            <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                    <span>상품명</span>
                                </div>
                                <div class="col-sm-6">
                                    <input type="hidden" id="itemSeq" name="itemSeq" class="form-control" value="<? echo $result_seq_query[0]; ?>">
                                    <input type="text" id="itemName" name="itemName" class="form-control" value="<? echo $result_seq_query[1]; ?>">
                                </div>
                                <div class="col-sm-3">

                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                    <span>카테고리</span>
                                </div>
                                <div class="col-sm-6">
                                    <select style="width: 300px" name="category" id="category">
                                        <option value="아우터">아우터</option>
                                        <option value="원피스">원피스</option>
                                        <option value="니트">니트</option>
                                        <option value="맨투맨">맨투맨</option>
                                        <option value="티셔츠">티셔츠</option>
                                    </select>

                                </div>
                            </div>

                            <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                    <span>브랜드</span>
                                </div>
                                <div class="col-sm-6">
                                    <input type="text" id="brand" name="brand" class="form-control" value="<? echo $result_seq_query[3]; ?>">
                                </div>
                                <div class="col-sm-3">

                                </div>
                            </div>

                            <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                    <span>가격(원)</span>
                                </div>
                                <div class="col-sm-6">
                                    <input type="text" id="price" name="price" class="form-control" value="<? echo $result_seq_query[4]; ?>">
                                </div>
                                <div class="col-sm-3">

                                </div>
                            </div>

                            <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                    <span>수량(개)</span>
                                </div>
                                <div class="col-sm-6">
                                    <input type="text" id="stock" name="stock" class="form-control" value="<? echo $result_seq_query[5]; ?>">
                                </div>
                                <div class="col-sm-3">

                                </div>
                            </div>

                            <hr>

                            <div class="row">
                                <div class="col-sm-3">
                                    <span>총장(cm)</span>
                                </div>
                                <div class="col-sm-6">
                                    <input type="text" id="tall" name="tall" class="form-control" value="<? echo $result_seq_query[6]; ?>">
                                </div>
                                <div class="col-sm-3">

                                </div>
                            </div>

                            <hr>

                            <div class="row">
                                <div class="col-sm-3">
                                    <span>어깨너비(cm)</span>
                                </div>
                                <div class="col-sm-6">
                                    <input type="text" id="shoulderWidth" name="shoulderWidth" class="form-control" value="<? echo $result_seq_query[7]; ?>">
                                </div>
                                <div class="col-sm-3">

                                </div>
                            </div>

                            <hr>

                            <div class="row">
                                <div class="col-sm-3">
                                    <span>가슴단면(cm)</span>
                                </div>
                                <div class="col-sm-6">
                                    <input type="text" id="crossSection" name="crossSection" class="form-control" value="<? echo $result_seq_query[8]; ?>">
                                </div>
                                <div class="col-sm-3">

                                </div>
                            </div>

                            <hr>

                            <div class="row">
                                <div class="col-sm-3">
                                    <span>소매길이(cm)</span>
                                </div>
                                <div class="col-sm-6">
                                    <input type="text" id="sleeveLength" name="sleeveLength" class="form-control" value="<? echo $result_seq_query[9]; ?>">
                                </div>
                                <div class="col-sm-3">

                                </div>
                            </div>

                            <hr>

                            <div class="row">
                                <div class="col-sm-3">
                                    <span>어깨-소매 길이(cm)</span>
                                </div>
                                <div class="col-sm-6">
                                    <input type="text" id="shoulderToSleeve" name="shoulderToSleeve" class="form-control" value="<? echo $result_seq_query[14]; ?>">
                                </div>
                                <div class="col-sm-3">

                                </div>
                            </div>

                            <hr>

                            <div class="row">
                                <div class="col-sm-3">
                                    <span>밑단 둘레(cm)</span>
                                </div>
                                <div class="col-sm-6">
                                    <input type="text" id="edgeGirth" name="edgeGirth" class="form-control" value="<? echo $result_seq_query[15]; ?>">
                                </div>
                                <div class="col-sm-3">

                                </div>
                            </div>

                            <hr>

                            <script type="text/javascript" src="http://code.jquery.com/jquery-2.1.0.min.js"></script>
                            <script type="text/javascript">
                                $(function () {
                                    $("#file").on('change', function () {
                                        readURL(this);
                                    });
                                });

                                function readURL(input) {
                                    if (input.files && input.files[0]) {
                                        var reader = new FileReader();
                                        reader.onload = function (e) {
                                            $('#preImage').attr('src', e.target.result);
                                        }
                                        reader.readAsDataURL(input.files[0]);
                                    }
                                }
                            </script>
                            <style>
                                .back-img {
                                    background-image: url("/homepage/img/itemPhoto/photo.png");
                                    background-size: cover;
                                    width: 150px;
                                    height: 150px;
                                }
                            </style>

                            <div class="row">
                                <div class="col-sm-3">
                                    <span>제품 대표 사진 등록</span>
                                </div>
                                <div class="col-sm-9">
                                    <img class="back-img" id="preImage" name="preImage" src="<? echo $result_seq_query[10]; ?>" />
                                    <input type="file" name="file" id="file" ><br>
                                </div>
                            </div>
                            <hr>

                            <div class="row">

                                <div class="col-sm-3">
                                    <span>제품 간단 설명</span>
                                </div>
                                <div class="col-sm-6">
                                    <textarea id="details" name="details" rows="5" cols="60" ><? echo $result_seq_query[11]; ?></textarea>
                                </div>
                                <div class="col-sm-3">

                                </div>
                            </div>
                            <br>
                            <hr>

                            <div class="row">

                                <div class="col-sm-3">
                                    <span>제품 상세 설명</span>
                                </div>
                                <div class="col-sm-9">

                                        <textarea name="content" id="ir1" class="nse_content"
                                                  style="width: 100%"> <? echo $result_seq_query[12]; ?></textarea>
                                    <script type="text/javascript">
                                        var oEditors = [];
                                        nhn.husky.EZCreator.createInIFrame({
                                            oAppRef: oEditors,
                                            elPlaceHolder: "ir1",
                                            sSkinURI: "/homepage/nse/nse_files/SmartEditor2Skin.html",
                                            fCreator: "createSEditor2"
                                        });

                                        function submitContents(elClickedObj) {
                                            // 에디터의 내용이 textarea에 적용됩니다.
                                            oEditors.getById["ir1"].exec("UPDATE_CONTENTS_FIELD", []);
                                            // 에디터의 내용에 대한 값 검증은 이곳에서 document.getElementById("ir1").value를 이용해서 처리하면 됩니다.

                                            try {
                                                elClickedObj.form.submit();
                                            } catch (e) {
                                            }
                                        }
                                    </script>

                                </div>

                            </div>
                            <hr>
                            <input type="submit" onclick="submitContents(this)" class="btn btn-info pull-right" value="상품 수정">
                        </form>
                    </div>


                    </tbody>
                </table>
                <hr/>

            </div>
        </div>
    </div>
</section>
<!-- Shop Section End -->

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
<script>

    /*체크 상태 인 row에 대해 발주확인 처리 하기 (상품상태 를 상품 준비중으로 바꿔주기)*/
    function isCheckedOrder() {

        var checkbox = document.getElementsByName("checkBox[]");
        for (var i = 0; i < checkbox.length; i++) {
            if (checkbox[i].checked == true) {//체크 되어있으면

                var sta = "status" + i;
                var itemName = "itemName" + i;
                var status = document.getElementById(sta).innerText;       //상태
                var itemName = document.getElementById(itemName).innerText;   //상품명


                if (status == "배송완료") {
                    return;
                }
                if (status == "배송중") {
                    return;
                }


                var id = "orderNum" + i;
                var orderNumber = document.getElementById(id).innerText

                $.ajax({
                    url: '/homepage/order_action.php',
                    type: 'POST',
                    data: {orderNum: orderNumber, itemName: itemName},
                    dataType: 'html',
                    success: function (data) {
                        location.reload(); //새로고침 해주기
                    }
                });

            }
        }
    }




</script>
</body>

</html>