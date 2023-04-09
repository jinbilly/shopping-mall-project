<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"/>
    <meta name="description" content=""/>
    <meta name="author" content=""/>
    <title>Page Title - SB Admin</title>
    <link href="css/styles.css" rel="stylesheet"/>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/js/all.min.js"
            crossorigin="anonymous"></script>
</head>
<body class="bg-primary">
<div id="layoutAuthentication">
    <div id="layoutAuthentication_content">
        <main>
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-5">
                        <div class="card shadow-lg border-0 rounded-lg mt-5">
                            <div class="card-header"><h3 class="text-center font-weight-light my-4">비밀번호 찾기</h3></div>
                            <div class="card-body">
                                <div class="small mb-3 text-muted">이메일 주소를 적으면 코드가 전송됩니다.</div>


                                <form id="emailform" name="emailform"  method="post">
                                    <div class="form-group">
                                        <label class="small mb-1" for="inputEmailAddress">Email</label>
                                        <input class="form-control py-4" id="inputEmailAddress"  type="email"
                                               aria-describedby="emailHelp" placeholder="Enter email address" name="inputEmailAddress"/>
                                    </div>
                                    <div class="form-group d-flex align-items-center justify-content-between mt-4 mb-0">
                                        <a class="small" href="login.php">로그인 하러 가기</a>
                                        <button type="button" class="btn btn-primary" onclick="check()" >코드 전송하기</button>
                                    </div>
                                </form>




                                <script>

                                    function onClickPw() {
                                        var form = document.getElementById("emailform");      // form 엘리멘트 생성
                                        window.open("", "emailform", "width=300, height=80");
                                        form.setAttribute("method", "post");             // method 속성 설정
                                        form.setAttribute("action", "/homepage/emailConfirmCode_action.php");       // action 속성 설정
                                        form.setAttribute("target", "emailform");       // action 속성 설정
                                        //document.body.appendChild(form);                // 현재 페이지에 form 엘리멘트 추가
                                        form.submit();
                                    }



                                    function check() {
                                        var email = document.getElementById("inputEmailAddress").value;      // form 엘리멘트 생성

                                        $.ajax({
                                            url: '/homepage/change_user_info/email_ckeck_action.php',
                                            type: 'POST',
                                            data: {email: email},
                                            dataType: 'html',
                                            success: function (data) {
                                                if(data!==""){//실패일때
                                                    alert(data); // 결과 텍스트를 경고창으로 보여준다.
                                                }else{//공백일떄, 이상없을때
                                                    onClickPw();
                                                }
                                            }
                                        });
                                    }
                                </script>

                            </div>
                            <div class="card-footer text-center">
                                <div class="small"><a href="register.html">회원가입하기</a></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>
    <div id="layoutAuthentication_footer">
        <footer class="py-4 bg-light mt-auto">
            <div class="container-fluid">
                <div class="d-flex align-items-center justify-content-between small">
                    <div class="text-muted">Copyright &copy; Your Website 2020</div>
                    <div>
                        <a href="#">Privacy Policy</a>
                        &middot;
                        <a href="#">Terms &amp; Conditions</a>
                    </div>
                </div>
            </div>
        </footer>
    </div>
</div>

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
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"
        crossorigin="anonymous"></script>
<script src="js/scripts.js"></script>
</body>
</html>
