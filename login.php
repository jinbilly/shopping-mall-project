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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/js/all.min.js"
            crossorigin="anonymous"></script>

</head>
<body class="bg-info">

<?php
if (isset($_POST["Id_register"])) {
    $ID = $_POST["Id_register"];
}
?>


<div id="layoutAuthentication">
    <div id="layoutAuthentication_content">
        <main>
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-5">
                        <div class="card shadow-lg border-0 rounded-lg mt-5">
                            <div class="card-header"><h3 class="text-center font-weight-light my-4">로그인</h3></div>
                            <div class="card-body">













                                <form method="post" action="./loginprocess.php">
                                    <div class="form-group">
                                        <label class="small mb-1" for="id">아이디</label>
                                        <input class="form-control py-4" id="id" type="text"
                                               placeholder="아이디를 입력해 주세요" name="id"
                                        />
                                    </div>

                                    <div class="form-group">
                                   in     <label class="small mb-1" for="inputPassword">비밀번호</label>
                                        <input class="form-control py-4" id="inputPassword" type="password" name="pw"
                                               placeholder="비밀번호를 입력해 주세요"/>
                                    </div>
                                    <div class="form-group">
                                        <div class="custom-control custom-checkbox">
                                            <input class="custom-control-input" id="rememberPasswordCheck" type="checkbox" name="rememberPasswordCheck"/>
                                            <label class="custom-control-label" for="rememberPasswordCheck">자동 로그인</label>
                                        </div>
                                    </div>
                                    <div class="form-group d-flex align-items-center justify-content-between mt-4 mb-0">
                                        <a class="small" href="password.php">비밀번호 찾기</a>
                                        <input class="btn btn-primary" type="submit" value="로그인"/>
                                    </div>
                                </form>











                            </div>
                            <div class="card-footer text-center">
                                <div class="small"><a href="register.html">회원가입</a></div>
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

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"
        crossorigin="anonymous"></script>
<script src="js/scripts.js"></script>
</body>
</html>
