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
                        <li><a href="shop.php?category=아우터">Shop</a></li>
                        <li><a href="noticeboard.php">Board</a></li>
                        <li><a href="contact.php">Contact</a></li>
                        <li class="active"><a href="#">Mypage</a></li>
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

<!-- Breadcrumb Begin -->
<div class="breadcrumb-option">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="breadcrumb__links">
                    <a href="index.php"><i class="fa fa-home"></i> Home</a>
                    <span>Mypage</span>
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
                    <button type="button" onclick="location.href='myPage.php?index=1'" class="btn btn-default menu ">
                        회원정보 변경
                    </button>
                    <br>
                    <button type="button" onclick="location.href='myPage.php?index=2'"
                            class="btn  btn-info active menu">주문내역
                    </button>
                    <br>
                    <button type="button" onclick="location.href='myPage.php?index=3'" class="btn btn-default menu">내가 쓴 리뷰
                    </button>

                    <?php
                } else if ($_GET['index'] == 3) {
                    ?>

                    <button type="button" onclick="location.href='myPage.php?index=1'" class="btn btn-default menu ">
                        회원정보 변경
                    </button>
                    <br>
                    <button type="button" onclick="location.href='myPage.php?index=2'" class="btn btn-default menu">
                        주문내역
                    </button>
                    <br>
                    <button type="button" onclick="location.href='myPage.php?index=3'" class="btn btn-info active menu">
                        내가 쓴 리뷰
                    </button>


                    <?php
                } else {
                    ?>
                    <button type="button" onclick="location.href='myPage.php?index=1'" class="btn btn-info active menu">
                        회원정보 변경
                    </button>
                    <br>
                    <button type="button" onclick="location.href='myPage.php?index=2'" class="btn  btn-default menu">
                        주문내역
                    </button>
                    <br>
                    <button type="button" onclick="location.href='myPage.php?index=3'" class="btn btn-default menu">내가 쓴 리뷰
                    </button>


                    <?php
                }
                ?>

            </div>

            <?php
            //해당 index 값 으로 쿼리 날려서 데이터 받아오기

            $con = mysqli_connect("127.0.0.1", "root", "1591", "shoppingmalldb");

            $session = $_SESSION["userId"];

            $search_query = "SELECT * FROM user_info WHERE id = '$session'";

            $re = mysqli_query($con, $search_query);

            $result = mysqli_fetch_array($re);

            /*페이징을 위한 변수*/
            if (isset($_GET['page'])) {
                $page = $_GET['page'];
            } else {
                $page = 1;
            }



            //$search_order_query = "SELECT * FROM order_info WHERE userId = '$session'";
            //$re_order = mysqli_query($con, $search_order_query);

            ?>


            <!--여기서부터 우측 섹션-->
            <div class="col-xl-9">
                <div class="container">

                    <?php
                    if ($_GET['index'] == 2) {
                        ?>

                        <h3>주문 내역</h3>
                        <br>
                        <table id="QnA_table" class="table table-hover">
                            <thead>
                            <tr>
                                <th>주문번호</th>
                                <th>품목</th>
                                <th>수량</th>
                                <th>결제금액</th>
                                <th>상태</th>
                                <th>송장번호</th>
                                <th></th>
                            </tr>
                            </thead>
                            <tbody>


                            <?php
                            $search_query = "SELECT * FROM payment_info WHERE userId = '$session'";

                            $re = mysqli_query($con, $search_query);


                            $total_record = mysqli_num_rows($re);//테이블에 있는 모든 레코드 수
                            $list = 6;    //한 페이지에 보여줄 개수
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
                            $search_query2 = "SELECT * FROM payment_info WHERE userId = '$session' ORDER BY paymentSeq DESC LIMIT $page_start,$list";
                            $re_order = mysqli_query($con, $search_query2);


                            while ($re_order_result = mysqli_fetch_array($re_order)) {
                                ?>
                                <tr>
                                    <td><?php echo $re_order_result[8];//주문번호 ?></td>
                                    <td><?php echo $re_order_result[2];//품목이름 ?></td>
                                    <td><?php echo $re_order_result[12]; ?></td>
                                    <td><?php echo $re_order_result[10];//결제금액 ?></td>
                                    <td><?php echo $re_order_result[13]; ?></td>
                                    <td><?php echo $re_order_result[14]; ?></td>
                                    <?php
                                    $review_check_query = "SELECT * FROM item_review WHERE writerId='$session' and itemName='$re_order_result[2]' and orderNum=$re_order_result[8]";
                                    $result_review = mysqli_query($con, $review_check_query);
                                    $result2_review=mysqli_fetch_array($result_review);

                                    if ($re_order_result[13] == "배송완료" && $result2_review[0]==null ) {
                                        ?>
                                        <td>
                                            <button type="button" class="btn btn-outline-dark"
                                                    onclick="isReviewCheck('<?php echo $re_order_result[2]; ?>' , '<?php echo $re_order_result[8];//주문번호 ?> ')" >
                                                review
                                            </button>
                                        </td>
                                        <?
                                    } else {
                                        ?>
                                        <td></td>

                                        <?
                                    }
                                    ?>
                                </tr>
                                <?php
                            }
                            ?>


                            </tbody>
                        </table>
                        <hr/>
                        <!--하단 숫자-->
                        <nav aria-label="Page navigation example">
                            <ul class="pagination justify-content-center">


                                <?php
                                if ($page <= 1) {
                                    //빈값
                                } else {
                                    echo '<li class="page-item">';
                                    echo '   <a class="page-link" href="myPage.php?page=1&index=2" tabindex="-1">처음</a>';
                                    echo '</li>';

                                }
                                if ($page <= 1) {

                                } else {
                                    $pre = $page - 1;
                                    echo '<li class="page-item">';
                                    echo "   <a class='page-link' href='myPage.php?page=$pre&index=2' tabindex='-1'>이전</a>";
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
                                        echo " <li class='page-item '><a class='page-link' href='myPage.php?page=$i&index=2'>$i</a></li>";
                                    }
                                }

                                if ($page >= $total_page) {
                                    //빈값
                                } else {
                                    $next = $page + 1;
                                    echo '<li class="page-item">';
                                    echo "   <a class='page-link'  href='myPage.php?page=$next&index=2' tabindex='-1'>다음</a>";
                                    echo '</li>';
                                }
                                if ($page >= $total_page) {
                                    //빈값
                                } else {
                                    echo '<li class="page-item">';
                                    echo "   <a class='page-link' href='myPage.php?page=$total_page&index=2' tabindex='-1'>마지막</a>";
                                    echo '</li>';
                                }
                                ?>


                            </ul>
                        </nav>


                        <?php
                    } else if ($_GET['index'] == 3) {
                        ?>
                            <h3>내가 쓴 리뷰</h3>
                        <br>

                        <table id="my_review_table" class="table table-hover">
                            <thead>
                            <tr>
                                <th>품목</th>
                                <th>제목</th>
                                <th>날짜</th>
                            </tr>
                            </thead>
                            <tbody>

                            <?php


                            $search_query = "SELECT * FROM item_review WHERE writerId = '$session'";

                            $re = mysqli_query($con, $search_query);


                            $total_record = mysqli_num_rows($re);//테이블에 있는 모든 레코드 수
                            $list = 6;    //한 페이지에 보여줄 개수
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

                            $search_query2 = "SELECT * FROM item_review WHERE writerId = '$session' ORDER BY reviewSeq DESC LIMIT $page_start,$list";
                            $review = mysqli_query($con, $search_query2);

                            while ($review_result = mysqli_fetch_array($review)) {
                                ?>
                                <tr onclick="location.href='reviewRead.php?index=<?php echo $review_result[0];//리뷰 고유 번호 ?>'">
                                    <td><?php echo $review_result[1];//품목 ?></td>
                                    <td><?php echo $review_result[4];//품목 ?></td>
                                    <td><?php echo $review_result[3];//날짜 ?></td>
                                </tr>
                                <?php
                            }
                            ?>
                            </tbody>
                        </table>
                        <hr/>


                        <!--하단 숫자-->
                        <nav aria-label="Page navigation example">
                            <ul class="pagination justify-content-center">


                                <?php
                                if ($page <= 1) {
                                    //빈값
                                } else {
                                    echo '<li class="page-item">';
                                    echo '   <a class="page-link" href="myPage.php?page=1&index=3" tabindex="-1">처음</a>';
                                    echo '</li>';

                                }
                                if ($page <= 1) {

                                } else {
                                    $pre = $page - 1;
                                    echo '<li class="page-item">';
                                    echo "   <a class='page-link' href='myPage.php?page=$pre&index=3' tabindex='-1'>이전</a>";
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
                                        echo " <li class='page-item '><a class='page-link' href='myPage.php?page=$i&index=3'>$i</a></li>";
                                    }
                                }

                                if ($page >= $total_page) {
                                    //빈값
                                } else {
                                    $next = $page + 1;
                                    echo '<li class="page-item">';
                                    echo "   <a class='page-link'  href='myPage.php?page=$next&index=3' tabindex='-1'>다음</a>";
                                    echo '</li>';
                                }
                                if ($page >= $total_page) {
                                    //빈값
                                } else {
                                    echo '<li class="page-item">';
                                    echo "   <a class='page-link' href='myPage.php?page=$total_page&index=3' tabindex='-1'>마지막</a>";
                                    echo '</li>';
                                }
                                ?>


                            </ul>
                        </nav>




                        <?php
                    } else {
                        ?>
                        <form>
                            <tr>
                                <td height=20 align=center bgcolor=#ccc><font color=black size="6">회원 정보</font></td>
                            </tr>
                            <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                    <span>이름</span>
                                </div>
                                <div class="col-sm-6">
                                    <span><?php echo $result[1]; ?></span>
                                </div>
                                <div class="col-sm-3">

                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                    <span>아이디</span>
                                </div>
                                <div class="col-sm-6">
                                    <span><?php echo $result[2]; ?></span>
                                </div>
                                <div class="col-sm-3">

                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                    <span>비밀번호</span>
                                </div>
                                <div class="col-sm-6">
                                    <span>*****</span>
                                </div>
                                <div class="col-sm-3">
                                    <button type="button" class="btn btn-info" id="btn-pw" name="btn-pw" value="pw"
                                            onclick="onClickPw()">비밀번호 수정
                                    </button>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                    <span>이메일</span>
                                </div>
                                <div class="col-sm-6">
                                    <span><?php echo $result[4]; ?></span>
                                </div>
                                <div class="col-sm-3">
                                    <button type="button" class="btn btn-info" id="btn-pw" name="btn-pw" value="pw"
                                            onclick="onClickEmail()">이메일 수정
                                    </button>
                                </div>
                            </div>
                            <hr>
<!--                            <div class="row">-->
<!--                                <div class="col-sm-3">-->
<!--                                    <span>주소</span>-->
<!--                                </div>-->
<!--                                <div class="col-sm-6">-->
<!--                                    <span>동작구 사당동 223-13번지 </span>-->
<!--                                </div>-->
<!--                                <div class="col-sm-3">-->
<!--                                    <button type="button" class="btn btn-info" id="btn-pw" name="btn-pw" value="pw"-->
<!--                                            onclick="">주소 변경-->
<!--                                    </button>-->
<!--                                </div>-->
<!--                            </div>-->
<!--                            <hr>-->
                        </form>

                        <?php
                    }
                    ?>


                </div>
            </div>
        </div>
    </div>
</section>


<script>


    function isReviewCheck(category, orderNum){
        $.ajax({
            url: '/homepage/review_check_action.php',
            type: 'POST',
            data: {category: category, orderNum: orderNum},
            dataType: 'html',
            success: function (data) {
                if(data!==""){//성공일때
                    alert(data);
                }else{//공백일떄, 이상없을때
                    location.href = "reviewWrite.php?category="+category+"&orderNum="+orderNum; //주문번호와 상품명을 보내준다
                }

            }
        });


    }


    function onClickPw() {
        var form = document.createElement("form");      // form 엘리멘트 생성
        window.open("", "update-pw", "width=300, height=80");
        form.setAttribute("method", "post");             // method 속성 설정
        form.setAttribute("action", "/homepage/update_pw.php");       // action 속성 설정
        form.setAttribute("target", "update-pw");       // action 속성 설정
        document.body.appendChild(form);                // 현재 페이지에 form 엘리멘트 추가
        form.submit();
    }

    function onClickEmail() {
        var form = document.createElement("form");      // form 엘리멘트 생성
        window.open("", "update-email", "width=300, height=80");
        form.setAttribute("method", "post");             // method 속성 설정
        form.setAttribute("action", "/homepage/update_email.php");       // action 속성 설정
        form.setAttribute("target", "update-email");       // action 속성 설정
        document.body.appendChild(form);                // 현재 페이지에 form 엘리멘트 추가
        form.submit();
    }
</script>
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
</body>

</html>