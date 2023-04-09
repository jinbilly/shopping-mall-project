<?php
session_start();
if (isset($_SESSION["userId"]) && $_SESSION["userId"] == 'root') {
    ?>

    <?php
} else {
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
                    <button type="button" onclick="location.href='AdminPage.php?index=1'" class="btn btn-default menu ">
                        주문내역 관리
                    </button>
                    <br>
                    <button type="button" onclick="location.href='AdminPage.php?index=2'" href="index.php"
                            class="btn btn-info active menu">상품 등록
                    </button>
                    <br>
                    <button type="button" onclick="location.href='AdminPage.php?index=3'" href="#"
                            class="btn btn-default menu">1대1 문의
                    </button>
                    <br>
                    <button type="button" onclick="location.href='AdminPage.php?index=4'" href="#"
                            class="btn btn-default menu">공지 사항
                    </button>

                    <?php
                } else if ($_GET['index'] == 3) {
                    ?>

                    <button type="button" onclick="location.href='AdminPage.php?index=1'" class="btn btn-default menu ">
                        주문내역 관리
                    </button>
                    <br>
                    <button type="button" onclick="location.href='AdminPage.php?index=2'" href="index.php"
                            class="btn btn-default menu">상품 등록
                    </button>
                    <br>
                    <button type="button" onclick="location.href='AdminPage.php?index=3'" href="#"
                            class="btn btn-info active menu">1대1 문의
                    </button>
                    <br>
                    <button type="button" onclick="location.href='AdminPage.php?index=4'" href="#"
                            class="btn btn-default menu">공지 사항
                    </button>


                    <?php
                } else if ($_GET['index'] == 4) {
                    ?>
                    <button type="button" onclick="location.href='AdminPage.php?index=1'"
                            class="btn btn-default  menu ">주문내역 관리
                    </button>
                    <br>
                    <button type="button" onclick="location.href='AdminPage.php?index=2'" href="index.php"
                            class="btn btn-default menu">상품 등록
                    </button>
                    <br>
                    <button type="button" onclick="location.href='AdminPage.php?index=3'" href="#"
                            class="btn btn-default menu">1대1 문의
                    </button>
                    <br>
                    <button type="button" onclick="location.href='AdminPage.php?index=4'" href="#"
                            class="btn btn-info active menu">공지 사항
                    </button>


                    <?php
                } else {
                    ?>
                    <button type="button" onclick="location.href='AdminPage.php?index=1'"
                            class="btn btn-info active menu ">주문내역 관리
                    </button>
                    <br>
                    <button type="button" onclick="location.href='AdminPage.php?index=2'" href="index.php"
                            class="btn btn-default menu">상품 등록
                    </button>
                    <br>
                    <button type="button" onclick="location.href='AdminPage.php?index=3'" href="#"
                            class="btn btn-default menu">1대1 문의
                    </button>
                    <br>
                    <button type="button" onclick="location.href='AdminPage.php?index=4'" href="#"
                            class="btn btn-default menu">공지 사항
                    </button>
                    <?php
                }
                ?>


            </div>

            <!--            닉네임-->
            <!--            이메일-->
            <!--            비밀번호-->
            <!--            주소-->
            <!--            휴대폰 번호-->
            <!--            생년월일-->
            <!---->
            <!--            아이디-->
            <!--            이름-->
            <!--            <span>아이디</span>-->
            <!--            <span>비밀번호</span>-->
            <!--            <span>닉네임</span>-->
            <!--            <span>이메일</span>-->
            <!--            <span>휴대폰번호</span>-->
            <!--            <span>생년월일</span>-->
            <!--            <span>주소</span>-->

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

            ?>


            <!--여기서부터 우측 섹션-->
            <div class="col-xl-10">

                <?php
                if ($_GET['index'] != 2 && $_GET['index'] != 3 && $_GET['index'] != 4) {
                    ?>


                    <button type="button" class="btn btn-outline-dark pull-right"
                            onclick="finishSend()" style="margin:5px 20px">배송완료
                    </button>

                    <button type="button" class="btn btn-outline-dark pull-right"
                            onclick="isCheckedSend()" style="margin:5px 20px">발송처리
                    </button>

                    <button type="button" class="btn btn-outline-dark pull-right"
                            onclick="isCheckedOrder()" style="margin:5px 20px">발주확인
                    </button>


                    <button type="button" class="btn btn-outline-dark pull-right"
                            onclick="modifySongJang()" style="margin:5px 20px">송장번호 재입력
                    </button>


                    <?php
                }
                ?>


                <table id="QnA_table" class="table table-hover">
                    <thead>
                    <tr>
                        <?php
                        if ($_GET['index'] == 2) {
                            ?>


                            <?php
                        } else if ($_GET['index'] == 3) {
                            ?>
                            <th>제목</th>
                            <th>작성자</th>
                            <th>작성날짜</th>
                            <th>조회수</th>

                            <?php
                        } else if ($_GET['index'] == 4) {
                            ?>
                            <th>제목</th>
                            <th>작성자</th>
                            <th>작성날짜</th>
                            <th>조회수</th>


                            <?php
                        } else {
                            ?>
                            <th>
                                <input type="checkbox" name="agree" id="every_agree" value="all"
                                       class="input-cbox new_every_agree">
                            </th>
                            <th>주문번호</th>
                            <th>품목</th>
                            <th>수량</th>
                            <th>결제금액</th>
                            <th>주문자명</th>
                            <th>우편번호</th>
                            <th>주소</th>
                            <th>전화번호</th>
                            <th>상태</th>
                            <th>송장번호</th>
                            <?php
                        }
                        ?>


                    </tr>
                    </thead>
                    <tbody>

                    <?php
                    if ($_GET['index'] == 2) {
                    ?>


                    <script>
                        function validation(){
                            var itemName = document.getElementById('itemName');
                            var brand = document.getElementById('brand');
                            var price = document.getElementById('price');
                            var stock = document.getElementById('stock');
                            var tall = document.getElementById('tall');
                            var crossSection = document.getElementById('crossSection');
                            var sleeveLength = document.getElementById('sleeveLength');
                            var shoulderToSleeve = document.getElementById('shoulderToSleeve');
                            var edgeGirth = document.getElementById('edgeGirth');
                            var file = document.getElementById('file');
                            var details = document.getElementById('details');
                            var ir1 = document.getElementById('ir1');


                            // ================ 유효성검사 ===============//
                            if (itemName.value == '') {
                                alert("상품 정보를 모두 입력 해주세요1");
                                return false;
                            }
                            if (brand.value == '') {
                                alert("상품 정보를 모두 입력 해주세요2");
                                return false;
                            }
                            if (price.value == '') {
                                alert("상품 정보를 모두 입력 해주세요3");
                                return false;
                            }
                            if (stock.value == '') {
                                alert("상품 정보를 모두 입력 해주세요4");
                                return false;
                            }
                            if (tall.value == '') {
                                alert("상품 정보를 모두 입력 해주세요5");
                                return false;
                            }
                            if (crossSection.value == '') {
                                alert("상품 정보를 모두 입력 해주세요6");
                                return false;
                            }
                            if (sleeveLength.value == '') {
                                alert("상품 정보를 모두 입력 해주세요7");
                                return false;
                            }
                            if (shoulderToSleeve.value == '') {
                                alert("상품 정보를 모두 입력 해주세요8");
                                return false;
                            }
                            if (edgeGirth.value == '') {
                                alert("상품 정보를 모두 입력 해주세요9");
                                return false;
                            }
                            if (file.value == '') {
                                alert("상품 정보를 모두 입력 해주세요0");
                                return false;
                            }
                            if (details.value == '') {
                                alert("상품 정보를 모두 입력 해주세요00");
                                return false;
                            }
                            if (ir1.value == '') {
                                alert("상품 정보를 모두 입력 해주세요000");
                                return false;
                            }


                        }

                    </script>


                    <div class="container">
                        <form action="upload_file.php" method="post" enctype="multipart/form-data" >
                            <div>
                                    <span height=20 align=center bgcolor=#ccc style="width: 100%"><font color=black
                                                                                                        size="6">상품 등록</font></span>
                            </div>

                            <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                    <span>상품명</span>
                                </div>
                                <div class="col-sm-6">
                                    <input type="text" id="itemName" name="itemName" class="form-control">
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
                                    <input type="text" id="brand" name="brand" class="form-control">
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
                                    <input type="text" id="price" name="price" class="form-control">
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
                                    <input type="text" id="stock" name="stock" class="form-control">
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
                                    <input type="text" id="tall" name="tall" class="form-control">
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
                                    <input type="text" id="shoulderWidth" name="shoulderWidth" class="form-control">
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
                                    <input type="text" id="crossSection" name="crossSection" class="form-control">
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
                                    <input type="text" id="sleeveLength" name="sleeveLength" class="form-control">
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
                                    <input type="text" id="shoulderToSleeve" name="shoulderToSleeve"
                                           class="form-control">
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
                                    <input type="text" id="edgeGirth" name="edgeGirth" class="form-control">
                                </div>
                                <div class="col-sm-3">

                                </div>
                            </div>

                            <hr>

                            <script type="text/javascript"
                                    src="http://code.jquery.com/jquery-2.1.0.min.js"></script>

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
                                    <img class="back-img" id="preImage" name="preImage" src=""/>
                                    <!--                                        <label for="file">Filename:</label>-->
                                    <input type="file" name="file" id="file"><br>
                                </div>
                            </div>
                            <hr>

                            <div class="row">

                                <div class="col-sm-3">
                                    <span>제품 간단 설명</span>
                                </div>
                                <div class="col-sm-6">
                                    <textarea id="details" name="details" rows="5" cols="60"></textarea>
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
                                                  style="width: 100%"> </textarea>
                                    <script type="text/javascript">
                                        var oEditors = [];
                                        nhn.husky.EZCreator.createInIFrame({
                                            oAppRef: oEditors,
                                            elPlaceHolder: "ir1",
                                            sSkinURI: "/homepage/nse/nse_files/SmartEditor2Skin.html",
                                            fCreator: "createSEditor2"
                                        });

                                        function submitContents(elClickedObj) {
                                            var itemName = document.getElementById('itemName');
                                            var brand = document.getElementById('brand');
                                            var price = document.getElementById('price');
                                            var stock = document.getElementById('stock');
                                            var tall = document.getElementById('tall');
                                            var crossSection = document.getElementById('crossSection');
                                            var sleeveLength = document.getElementById('sleeveLength');
                                            var shoulderToSleeve = document.getElementById('shoulderToSleeve');
                                            var edgeGirth = document.getElementById('edgeGirth');
                                            var file = document.getElementById('file');
                                            var details = document.getElementById('details');
                                            var ir1 = document.getElementById('ir1');


                                            // ================ 유효성검사 ===============//
                                            if (itemName.value == '') {
                                                alert("상품 정보를 모두 입력 해주세요");
                                                return false;
                                            }
                                            if (brand.value == '') {
                                                alert("상품 정보를 모두 입력 해주세요");
                                                return false;
                                            }
                                            if (price.value == '') {
                                                alert("상품 정보를 모두 입력 해주세요");
                                                return false;
                                            }
                                            if (stock.value == '') {
                                                alert("상품 정보를 모두 입력 해주세요");
                                                return false;
                                            }
                                            if (tall.value == '') {
                                                alert("상품 정보를 모두 입력 해주세요");
                                                return false;
                                            }
                                            if (crossSection.value == '') {
                                                alert("상품 정보를 모두 입력 해주세요");
                                                return false;
                                            }
                                            if (sleeveLength.value == '') {
                                                alert("상품 정보를 모두 입력 해주세요");
                                                return false;
                                            }
                                            if (shoulderToSleeve.value == '') {
                                                alert("상품 정보를 모두 입력 해주세요");
                                                return false;
                                            }
                                            if (edgeGirth.value == '') {
                                                alert("상품 정보를 모두 입력 해주세요");
                                                return false;
                                            }
                                            if (file.value == '') {
                                                alert("상품 정보를 모두 입력 해주세요");
                                                return false;
                                            }
                                            if (details.value == '') {
                                                alert("상품 정보를 모두 입력 해주세요");
                                                return false;
                                            }

                                            // 에디터의 내용이 textarea에 적용됩니다.
                                            oEditors.getById["ir1"].exec("UPDATE_CONTENTS_FIELD", []);
                                            // 에디터의 내용에 대한 값 검증은 이곳에서 document.getElementById("ir1").value를 이용해서 처리하면 됩니다.

                                            if (document.getElementById("ir1").value == '<br>') {
                                                alert("상품 정보를 모두 입력 해주세요");
                                                return false;
                                            }
                                            try {

                                                elClickedObj.form.submit();

                                            } catch (e) {
                                            }
                                        }
                                    </script>

                                </div>

                            </div>
                            <hr>
                            <input type="button" onclick="submitContents(this)" class="btn btn-info pull-right" value="상품 등록">
                        </form>
                    </div>
                    </tbody>
                </table>
            <hr/>

            <?php
            } else if ($_GET['index'] == 3) {
                ?>

                <?php
                $search_query = "SELECT * FROM QnA_info";

                $re = mysqli_query($con, $search_query);


                $total_record = mysqli_num_rows($re);//테이블에 있는 모든 레코드 수
                $list = 5;    //한 페이지에 보여줄 개수
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

                /*게시글 정보 가져오기*/

                $search_query2 = "SELECT * FROM QnA_info ORDER BY QnASeq DESC LIMIT $page_start,$list";

                $re = mysqli_query($con, $search_query2);


                while ($result = mysqli_fetch_array($re)) {
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

                <!--하단 숫자-->
                <nav aria-label="Page navigation example">
                    <ul class="pagination justify-content-center">


                        <?php
                        if ($page <= 1) {
                            //빈값
                        } else {
                            echo '<li class="page-item">';
                            echo '   <a class="page-link" href="AdminPage.php?page=1&index=3" tabindex="-1">처음</a>';
                            echo '</li>';

                        }
                        if ($page <= 1) {

                        } else {
                            $pre = $page - 1;
                            echo '<li class="page-item">';
                            echo "   <a class='page-link' href='AdminPage.php?page=$pre&index=3' tabindex='-1'>이전</a>";
                            echo '</li>';
                        }

                        //끝번호 안넘어가게 정해주기
                        if ($block_end > $total_page_num) {
                            $block_end = $total_page_num;
                        }

                        for ($i = $block_start; $i <= $block_end; $i++) {
                            if ($page == $i) {
                                echo " <li class='page-item disabled'><a class='page-link' href='#'>$i</a></li>";
                            } else {
                                echo " <li class='page-item '><a class='page-link' href='AdminPage.php?page=$i&index=3'>$i</a></li>";
                            }
                        }

                        if ($page >= $total_page) {
                            //빈값
                        } else {
                            $next = $page + 1;
                            echo '<li class="page-item">';
                            echo "   <a class='page-link'  href='AdminPage.php?page=$next&index=3' tabindex='-1'>다음</a>";
                            echo '</li>';
                        }
                        if ($page >= $total_page) {
                            //빈값
                        } else {
                            echo '<li class="page-item">';
                            echo "   <a class='page-link' href='AdminPage.php?page=$total_page&index=3' tabindex='-1'>마지막</a>";
                            echo '</li>';
                        }
                        ?>


                    </ul>
                </nav>
                <br>


                <?php
            } else if ($_GET['index'] == 4) {
                ?>
                <?php

                $search_query = "SELECT * FROM Notice_info ORDER BY NoticeSeq DESC";

                $re = mysqli_query($con, $search_query);

                while ($result = mysqli_fetch_array($re)) {
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
            } else {
                ?>
                <?php

                $search_query = "SELECT * FROM payment_info ";

                $re = mysqli_query($con, $search_query);


                $total_record = mysqli_num_rows($re);//테이블에 있는 모든 레코드 수
                $list = 8;    //한 페이지에 보여줄 개수
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
                $search_query2 = "SELECT * FROM payment_info ORDER BY paymentSeq DESC LIMIT $page_start,$list";

                $re2 = mysqli_query($con, $search_query2);

                $i = 0;
                while ($result = mysqli_fetch_array($re2)) {
                    ?>
                    <tr class="order_info">
                        <td>
                            <input type="checkbox" name="checkBox[]" id="cb" value="all"
                                   class="input-cbox new_every_agree">
                        </td>
                        <td id="<?php echo "orderNum" . $i; ?>"><?php echo "$result[8]";//주문번호 ?></td>
                        <td id="<?php echo "itemName" . $i; ?>"><?php echo $result[2];//품목 ?></td>
                        <td><?php echo $result[12];//수량 ?></td>
                        <td><?php echo $result[10];//결제금액 ?></td>
                        <td><?php echo $result[3];//주문자명 ?></td>
                        <td><?php echo $result[6];//우편번호 ?></td>
                        <td><?php echo $result[4] . " " . $result[5];//주소 ?></td>
                        <td><?php echo $result[7];//전화번호 ?></td>
                        <td id="<?php echo "status" . $i; ?>"><?php echo $result[13];//상태 ?></td>

                        <?php
                        if ($result[13] == "상품준비중") {
                            ?>
                            <td><input type="text" style="width: 60%" id="<?php echo "invoiceNum" . $i; ?>"></td>
                            <?php
                        } else {
                            ?>
                            <td><?php echo $result[14];//송장번호?></td>
                            <?php
                        }
                        ?>

                    </tr>


                    <?php
                    $i++;
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
                            echo '   <a class="page-link" href="AdminPage.php?page=1&index=1" tabindex="-1">처음</a>';
                            echo '</li>';

                        }
                        if ($page <= 1) {

                        } else {
                            $pre = $page - 1;
                            echo '<li class="page-item">';
                            echo "   <a class='page-link' href='AdminPage.php?page=$pre&index=1' tabindex='-1'>이전</a>";
                            echo '</li>';
                        }

                        //끝번호 안넘어가게 정해주기
                        if ($block_end > $total_page_num) {
                            $block_end = $total_page_num;
                        }

                        for ($i = $block_start; $i <= $block_end; $i++) {
                            if ($page == $i) {
                                echo " <li class='page-item disabled'><a class='page-link' href='#'>$i</a></li>";
                            } else {
                                echo " <li class='page-item '><a class='page-link' href='AdminPage.php?page=$i&index=1'>$i</a></li>";
                            }
                        }

                        if ($page >= $total_page) {
                            //빈값
                        } else {
                            $next = $page + 1;
                            echo '<li class="page-item">';
                            echo "   <a class='page-link'  href='AdminPage.php?page=$next&index=1' tabindex='-1'>다음</a>";
                            echo '</li>';
                        }
                        if ($page >= $total_page) {
                            //빈값
                        } else {
                            echo '<li class="page-item">';
                            echo "   <a class='page-link' href='AdminPage.php?page=$total_page&index=1' tabindex='-1'>마지막</a>";
                            echo '</li>';
                        }
                        ?>


                    </ul>
                </nav>
                <?php
            }
            ?>



                <?php
                if ($_GET['index'] == 4) {
                    ?>
                    <button type="button" class="btn btn-outline-dark pull-right"
                            onclick="location.href='NoticeWrite.php'">공지사항 작성
                    </button>

                    <?php
                }
                ?>


            </div>
        </div>
    </div>
</section>
<script>


    function onClickPw() {
        var form = document.createElement("form"); // form 엘리멘트 생성
        window.open("", "update-pw", "width=300, height=80");
        form.setAttribute("method", "post"); // method 속성 설정
        form.setAttribute("action", "/homepage/update_pw.php"); // action 속성 설정
        form.setAttribute("target", "update-pw"); // action 속성 설정
        document.body.appendChild(form); // 현재 페이지에 form 엘리멘트 추가
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


    function modifySongJang() {

        var checkbox = document.getElementsByName("checkBox[]");
        for (var i = 0; i < checkbox.length; i++) {
            if (checkbox[i].checked == true) {//체크 되어있으면

                var sta = "status" + i;
                var itemName = "itemName" + i;
                var status = document.getElementById(sta).innerText;       //상태
                var itemName = document.getElementById(itemName).innerText;   //상품명


                if (status == "주문확인중") {
                    return;
                }
                if (status == "배송완료") {
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


    /*체크 상태인 row에 대해 발송처리 해주기(입력된 송장번호 정보 업데이트 해주기)*/
    function isCheckedSend() {

        var checkbox = document.getElementsByName("checkBox[]");
        for (var i = 0; i < checkbox.length; i++) {
            if (checkbox[i].checked == true) {//체크 되어있으면

                var id = "orderNum" + i;
                var sta = "status" + i;
                var invoice = "invoiceNum" + i;
                var itemName = "itemName" + i;
                var status = document.getElementById(sta).innerText;       //상태
                var orderNumber = document.getElementById(id).innerText;   //주문번호
                var invoiceNumber = document.getElementById(invoice).value;   //주문번호
                var itemName = document.getElementById(itemName).innerText;   //상품명

                if (status == "배송완료") {
                    return;
                }
                if (status == "배송중") {
                    return;
                }
                if (status == "주문확인중") {
                    alert("발주확인 부터 해주세요");
                    return;
                }
                if (invoiceNumber == "") {
                    alert("송장번호를 입력 해주세요");
                    return;
                }
                ;


                if (status == "상품준비중") { //발송처리가 가능할떄
                    $.ajax({
                        url: '/homepage/send_action.php',
                        type: 'POST',
                        data: {orderNum: orderNumber, invoiceNum: invoiceNumber, itemName: itemName},
                        dataType: 'html',
                        success: function (data) {
                            location.reload(); //새로고침 해주기
                        }
                    });

                } else {//발주 확인부터 해야 할때
                    alert("발주확인부터 해주세요");
                    break;
                }


            }
        }

    }

    function finishSend() {
        var checkbox = document.getElementsByName("checkBox[]");
        for (var i = 0; i < checkbox.length; i++) {
            if (checkbox[i].checked == true) {//체크 되어있으면

                var id = "orderNum" + i;
                var sta = "status" + i;
                var itemName = "itemName" + i;

                var status = document.getElementById(sta).innerText;       //상태
                var orderNumber = document.getElementById(id).innerText;   //주문번호
                var itemName = document.getElementById(itemName).innerText;   //상품명


                if (status == "배송중") { //발송처리가 가능할떄
                    $.ajax({
                        url: '/homepage/send_finish_action.php',
                        type: 'POST',
                        data: {orderNum: orderNumber, itemName: itemName},
                        dataType: 'html',
                        success: function (data) {
                            location.reload(); //새로고침 해주기
                        }
                    });

                } else if (status == "상품준비중") {//발주 확인부터 해야 할때
                    alert("발송처리부터 해주세요");
                    break;
                } else {
                    alert("발주확인부터 해주세요");
                    break;
                }


            }
        }

    }


</script>
</body>

</html>