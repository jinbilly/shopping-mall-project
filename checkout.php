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
                    <span>Shopping cart</span>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Breadcrumb End -->

<?php
//해당 index 값 으로 쿼리 날려서 데이터 받아오기

$session = $_SESSION["userId"];

$search_query = "SELECT * FROM shop_cart_info WHERE userId = '$session'";

$re = mysqli_query($con, $search_query);


//유저 정보 찾는 쿼리들
$search_user_info = "SELECT * FROM user_info WHERE id = '$session'";//유저 id로 해당 유저 찾기
$search_user_info_re = mysqli_query($con, $search_user_info);//쿼리 보내기
$search_user_info_result = mysqli_fetch_array($search_user_info_re);//배열 형태로 데이터 넣기


?>






<!-- Checkout Section Begin -->
<section class="checkout spad">
    <div class="container">
        <form action="payment.php" class="checkout__form" method="post"  onsubmit="return validate()">
            <center>
                <h2>결제하기</h2>
            </center>
            <hr>
            <br>
            <br>
            <h3>주문 리스트</h3>
            <hr>
            <div class="shop__cart__table">
                <table>
                    <thead>
                    <tr>
                        <th>제품</th>
                        <th>가격</th>
                        <th>수량</th>
                        <th>총 가격</th>
                        <th></th>
                    </tr>
                    </thead>
                    <tbody>

                    <?php
                    $i = 0;

                    if (isset($_POST['buyOneSubmitItemSeq'])) {   //바로 구매 버튼을 눌렀을때
                        $itemSeq = $_POST['buyOneSubmitItemSeq'];   //itemseq 값 받기

                        $search_query2 = "SELECT * FROM item_info WHERE itemSeq = $itemSeq";//아이템 seq로 해당 아이템정보 찾기

                        $re2 = mysqli_query($con, $search_query2);
                        $result2 = mysqli_fetch_array($re2);

                        $quantity = 1;//request통신으로 수량 값 받기
                        ?>


                        <!--상품명 여러개 값을 payment.php에서 받기 위해 hidden타입의 input에다가 동적으로 넣어주기-->
                        <input type="hidden" name="itemName[]" value="<?php echo $result2[1]; ?>">
                        <input type="hidden" name="itemCode[]" value="<?php echo $result2[0];//아이템코드 넣어주기 ?>">

                        <tr>
                            <td class="cart__product__item">
                                <img style="width: 100px" src=" <?php echo $result2[10];//이미지 경로 ?>" alt="">
                                <div class="cart__product__item__title">
                                    <h6><?php echo $result2[1];//상품명 ?></h6>
                                </div>
                            </td>
                            <td class="cart__price">
                                <div name="price" id="price"><?php echo $result2[4];//상품가격 ?></div>
                            </td>

                            <!--수량-->
                            <td class="cart__quantity">
                                <div><?php echo $quantity; ?></div>
                                <!--상품 수량을 동적으로 input에 넣어주기-->
                                <input type="hidden" name="itemQuantity[]" value="<?php echo $quantity; ?>">
                            </td>


                            <td name="sum" id="sum" class="cart__total">
                                <?php
                                echo $result2[4] * $quantity;  //상품가격 X 상품수량 한 합계 상품 가격
                                $sum = $result2[4] * $quantity;
                                ?>
                                <!--hidden타입으로 각 제품별 총 금액 보내주기-->
                                <input type="hidden" name="sumPrice[]" value="<?php echo $sum; ?>">
                            </td>

                        </tr>





                        <?
                    } else {  //장바구니를 통해서 왔을때
                        while ($result = mysqli_fetch_array($re)) {

                            $search_query2 = "SELECT * FROM item_info WHERE itemSeq = '$result[3]'";//아이템 seq로 해당 아이템정보 찾기

                            $re2 = mysqli_query($con, $search_query2);
                            $result2 = mysqli_fetch_array($re2);

                            $quantity = $_REQUEST['quantity'];//request통신으로 수량 값 받기
                            ?>
                            <!--상품명 여러개 값을 payment.php에서 받기 위해 hidden타입의 input에다가 동적으로 넣어주기-->
                            <input type="hidden" name="itemName[]" value="<?php echo $result2[1]; ?>">
                            <input type="hidden" name="itemCode[]" value="<?php echo $result2[0];//아이템코드 넣어주기 ?>">

                            <tr>
                                <td class="cart__product__item">
                                    <img style="width: 100px" src=" <?php echo $result2[10];//이미지 경로 ?>" alt="">
                                    <div class="cart__product__item__title">
                                        <h6><?php echo $result2[1];//상품명 ?></h6>
                                    </div>
                                </td>
                                <td class="cart__price">
                                    <div name="price" id="price"><?php echo $result2[4];//상품가격 ?></div>
                                </td>

                                <!--수량-->
                                <td class="cart__quantity">
                                    <div><?php echo $quantity[$i]; ?></div>
                                    <!--상품 수량을 동적으로 input에 넣어주기-->
                                    <input type="hidden" name="itemQuantity[]" value="<?php echo $quantity[$i]; ?>">
                                </td>


                                <td name="sum" id="sum" class="cart__total">
                                    <?php
                                    echo $result2[4] * $quantity[$i];  //상품가격 X 상품수량 한 합계 상품 가격
                                    $sumPrice = $result2[4] * $quantity[$i];
                                    $sum += $result2[4] * $quantity[$i];
                                    ?>
                                    <!--hidden타입으로 각 제품별 총 금액 보내주기-->
                                    <input type="hidden" name="sumPrice[]" value="<?php echo $sumPrice; ?>">
                                    <?php
                                    $i++;
                                    ?>

                                </td>


                            </tr>

                            <?php
                        }
                        ?>


                        <?

                    }
                    ?>


                    </tbody>
                </table>
            </div>

            <hr>

            <br><br>
            <h3>주문 상세 정보</h3>
            <hr>


            <div class="row">

                <div class="col-lg-8">

                    <script>
                        function validate(){
                            var name = document.getElementById('orderName');
                            var call = document.getElementById('orderCall');
                            var email = document.getElementById('orderEmail');
                            var receivePersonName = document.getElementById('receivePersonName');
                            var deliverPersonPhoneNum = document.getElementById('deliverPersonPhoneNum');
                            var sample6_postcode = document.getElementById('sample6_postcode');
                            var sample6_address = document.getElementById('sample6_address');
                            var sample6_detailAddress = document.getElementById('sample6_detailAddress');

                            // ================ 유효성검사 ===============//
                            if (name.value == '') {
                                alert("주문자명을 입력해주세요.");
                                return false;
                            }

                            // ================ 유효성검사 ===============//
                            if (call.value == '') {
                                alert("주문자 연락처를 입력해주세요");
                                return false;
                            }

                            // ================ 유효성검사 ===============//
                            if (email.value == '') {
                                alert("배송정보를 빠짐없이 채워 주세요");
                                return false;
                            }

                            // ================ 유효성검사 ===============//
                            if (receivePersonName.value == '') {
                                alert("배송정보를 빠짐없이 채워 주세요");
                                return false;
                            }


                            // ================ 유효성검사 ===============//
                            if (deliverPersonPhoneNum.value == '') {
                                alert("배송정보를 빠짐없이 채워 주세요");
                                return false;
                            }

                            // ================ 유효성검사 ===============//
                            if (sample6_postcode.value == '') {
                                alert("배송정보를 빠짐없이 채워 주세요");
                                return false;
                            }


                            // ================ 유효성검사 ===============//
                            if (sample6_address.value == '') {
                                alert("배송정보를 빠짐없이 채워 주세요");
                                return false;
                            }

                            // ================ 유효성검사 ===============//
                            if (sample6_detailAddress.value == '') {
                                alert("배송정보를 빠짐없이 채워 주세요");
                                return false;
                            }


                        }
                    </script>

                    <br>
                    <h5>주문자 정보</h5>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="checkout__form__input">
                                <p>주문자명 <span>*</span></p>
                                <input type="text" name="orderName"
                                       value="<?php echo $search_user_info_result[1];//주문자 명(유저이름) ?>" id="orderName">
                            </div>
                        </div>

                        <div class="col-lg-6 col-md-6 col-sm-6">
                            <div class="checkout__form__input">
                                <p>연락처 <span>*</span></p>
                                <input type="text" name="orderCall"
                                       value="<?php echo $search_user_info_result[8];//주문자 핸드폰 번호(유저 폰번호) ?>"  id="orderCall">
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6">
                            <div class="checkout__form__input">
                                <p>이메일 <span>*</span></p>
                                <input name="orderEmail" type="text"
                                       value="<?php echo $search_user_info_result[4];//주문자 이메일(유저 이메일) ?>" id="orderEmail">
                            </div>
                        </div>
                    </div>
                    <hr>
                    <br>

                    <br>
                    <h5>배송 정보</h5>
                    <div class="row">
                        <div class="col-lg-6 col-md-6 col-sm-6">
                            <div class="checkout__form__input">
                                <p>수령인 <span>*</span></p>
                                <input type="text" value="<?php echo $search_user_info_result[1]; ?>"
                                       name="receivePersonName" id="receivePersonName">
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6">
                            <div class="checkout__form__input">
                                <p>연락처 <span>*</span></p>
                                <input type="text" value="<?php echo $search_user_info_result[8]; ?>"
                                       name="deliverPersonPhoneNum" id="deliverPersonPhoneNum">
                            </div>
                        </div>

                        <div class="col-lg-6 col-md-6 col-sm-6">
                            <div class="checkout__form__input">
                                <p>우편번호 <span>*</span></p>
                                <input type="text" id="sample6_postcode" placeholder="우편번호"
                                       value="<?php echo $search_user_info_result[5]; ?>" name="deliverPostNum"
                                       readonly>
                            </div>
                        </div>


                        <div class="col-lg-6 col-md-6 col-sm-6">
                            <button type="button" class="btn btn-info" value="주소찾기"
                                    onclick="sample6_execDaumPostcode()">우편번호 찾기
                            </button>
                        </div>


                        <div class="col-lg-12">
                            <div class="checkout__form__input">
                                <p>주소 <span>*</span></p>
                                <input type="text" id="sample6_address" placeholder="주소"
                                       value="<?php echo $search_user_info_result[6]; ?>" name="deliverAddress"
                                       readonly><br>
                            </div>
                        </div>

                        <div class="col-lg-12">
                            <div class="checkout__form__input">
                                <p>상세주소 <span>*</span></p>
                                <input type="text" id="sample6_detailAddress" placeholder="상세주소"
                                       name="deliverDetailAddress"
                                       value="<?php echo $search_user_info_result[7]; ?>">
                            </div>
                        </div>

                        <div class="col-lg-12">
                            <div class="checkout__form__input">
                                <p>배송 메세지(100자이내)</p>
                                <textarea id="details" name="deliverMessage" rows="5" cols="60"></textarea>
                            </div>
                        </div>

                    </div>

                    <hr>
                    <br><br>


                </div>


                <div class="col-lg-4">
                    <div class="checkout__order">
                        <h5>결제 금액</h5>

                        <div class="checkout__order__total">
                            <ul>
                                <li>택배비 <span>무료</span></li>
                                <li>상품비 <span><?php echo $sum . "원"; ?></span></li>
                                <li>Total <span><?php echo $sum . "원"; ?></span></li>
                                <input name="paymentSum" value="<?php echo $sum; ?>" type="hidden">
                            </ul>
                        </div>


                        <button type="submit" class="site-btn">결제하기</button>
                    </div>
                </div>
            </div>

        </form>

    </div>
</section>
<!-- Checkout Section End -->
<!--<input type="text" id="sample6_postcode" placeholder="우편번호">-->
<!--<input type="button" onclick="sample6_execDaumPostcode()" value="우편번호 찾기"><br>-->
<!--<input type="text" id="sample6_address" placeholder="주소"><br>-->
<!--<input type="text" id="sample6_detailAddress" placeholder="상세주소">-->
<input type="hidden" id="sample6_extraAddress" placeholder="참고항목">


<script src="//t1.daumcdn.net/mapjsapi/bundle/postcode/prod/postcode.v2.js"></script>
<script>
    function sample6_execDaumPostcode() {
        new daum.Postcode({
            oncomplete: function (data) {
                // 팝업에서 검색결과 항목을 클릭했을때 실행할 코드를 작성하는 부분.

                // 각 주소의 노출 규칙에 따라 주소를 조합한다.
                // 내려오는 변수가 값이 없는 경우엔 공백('')값을 가지므로, 이를 참고하여 분기 한다.
                var addr = ''; // 주소 변수
                var extraAddr = ''; // 참고항목 변수

                //사용자가 선택한 주소 타입에 따라 해당 주소 값을 가져온다.
                if (data.userSelectedType === 'R') { // 사용자가 도로명 주소를 선택했을 경우
                    addr = data.roadAddress;
                } else { // 사용자가 지번 주소를 선택했을 경우(J)
                    addr = data.jibunAddress;
                }

                // 사용자가 선택한 주소가 도로명 타입일때 참고항목을 조합한다.
                if (data.userSelectedType === 'R') {
                    // 법정동명이 있을 경우 추가한다. (법정리는 제외)
                    // 법정동의 경우 마지막 문자가 "동/로/가"로 끝난다.
                    if (data.bname !== '' && /[동|로|가]$/g.test(data.bname)) {
                        extraAddr += data.bname;
                    }
                    // 건물명이 있고, 공동주택일 경우 추가한다.
                    if (data.buildingName !== '' && data.apartment === 'Y') {
                        extraAddr += (extraAddr !== '' ? ', ' + data.buildingName : data.buildingName);
                    }
                    // 표시할 참고항목이 있을 경우, 괄호까지 추가한 최종 문자열을 만든다.
                    if (extraAddr !== '') {
                        extraAddr = ' (' + extraAddr + ')';
                    }
                    // 조합된 참고항목을 해당 필드에 넣는다.
                    document.getElementById("sample6_extraAddress").value = extraAddr;

                } else {
                    document.getElementById("sample6_extraAddress").value = '';
                }

                // 우편번호와 주소 정보를 해당 필드에 넣는다.
                document.getElementById('sample6_postcode').value = data.zonecode;
                document.getElementById("sample6_address").value = addr;
                // 커서를 상세주소 필드로 이동한다.
                document.getElementById("sample6_detailAddress").focus();
            }
        }).open();
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