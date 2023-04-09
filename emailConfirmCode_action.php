<p>인증 번호가 메일로 전송되었습니다.</p>
<?php
$con = mysqli_connect("127.0.0.1", "root", "1591", "shoppingmalldb");

$receiver = $_POST['inputEmailAddress'];
?>

<?php include __DIR__.'/emailConfirmCode.php' ?>
<?php
$authNum = rand(100000, 999999); //  랜덤 인증번호 생성
$content = "Asion 입니다.

            비밀번호를 찾는다는 기쁨이 뭔지 아시나요?

            인증번호 : " . $authNum;

mailer("Asion", "jinbilly96@naver.com", $receiver, "Asion 회원 가입 인증번호 발송", $content);
?>

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


<html lang="ko">
<body onresize="resizeTo(450,500)" onload="resizeTo(450,500)">
<p id="timer" name="timer">제한시간 : 5분0초</p>
<input type="text" id="authNum" name="authNum" value="" placeholder="인증번호 입력"/>
<button onclick="confirm()">인증하기</button>
<p style="font-size: 10pt">인증번호가 전송되지 않으면 메일을 다시 확인해주세요.</p>

<?php
$rand = rand(00000,99999);
$hashedPassword = password_hash($rand, PASSWORD_DEFAULT); //암호화 해서 넣어주기
$query1 = "UPDATE user_info SET pw ='$hashedPassword' WHERE email ='$receiver'";
$result1 = mysqli_query($con, $query1);
mysqli_fetch_array($result1);
?>

<script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
<script type="text/javascript">

    // 인증 확인 버튼 클릭
    function confirm() {

        if ($('#timer').html() == '시간 초과') { // 시간 초과 이벤트
            opener.alert('시간이 초과 되었습니다.');      // 부모창에 alert 함수 실행
            window.close();                           // 현재 창 닫기
        } else if ($('#authNum').val() == '<?=$authNum?>') {
            // 인증 번호 일치 했을때 이벤트

            //$(opener.document).find("#chk_email").html('사용할 수 있는 이메일 입니다');
            //$(opener.document).find('#chk_email').attr('color', '#199894b3');
            opener.alert('입시 비밀번호는: <?php echo $rand."입니다.";?>');
            //opener.location.href="login.php";
            window.close();
            //opener.location.href="login.php";
        } else {
            // 인증번호 틀렸을 때 이벤트
            opener.alert('인증번호가 틀렸습니다.');
            window.close();
        }

    }

    // 타이머 설정 부분
    var time = 299;
    var min = 0;
    var sec = 0;
    var x = "";

    $(function () {
        clearInterval(x);
        x = setInterval("timer()", 1000);
    });

    function timer() {
        min = parseInt(time / 60);
        sec = time % 60;
        $('#timer').html("제한시간 : " + min + "분" + sec + "초");
        time--;
        if (time < 0) {
            clearInterval(x);
            $('#timer').html("시간 초과");
        }
    }

</script>
</body>
</html>