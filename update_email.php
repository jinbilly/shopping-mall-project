<?php
session_start();
$con = mysqli_connect("127.0.0.1", "root", "1591", "shoppingmalldb");

$session = $_SESSION["userId"];

$search_query = "SELECT * FROM user_info WHERE id = '$session'";

$result = mysqli_query($con, $search_query);

$row = mysqli_fetch_array($result);
?>

<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ashion | Template</title>
    <!-- 부트스트랩 -->
    <link rel="stylesheet" href="bootstrap2/css/bootstrap.css">
</head>
<body onresize="resizeTo(450,500)" onload="resizeTo(450,500)">
<style type="text/css">
    * {
        font-family: 'Sans-Serif';
    }

    a {
        color: black;
    }
</style>
<div class="container">
    <br>
    <h1 style="text-align: center">이메일 수정</h1>
    <hr>
    <form class="form" id="create-goal-from" name="create-goal-from">
        <h4>현재 비밀번호</h4>
        <div class="form-group">
            <input type="text" id="now-pw" name="now-pw" class="form-control" placeholder=" 현재 비밀번호 입력" maxlength="14">
        </div>

        <h4>새로운 이메일 주소</h4>
        <div class="form-group">
            <input type="email" id="new-email" name="new-email" class="form-control" placeholder="새로운 이메일 입력" maxlength="14" ">
        </div>


        <div style="text-align: right">
            <input type="button" class="btn btn-info" value="수정" onclick="create_goal_btn_onClick()"/>
        </div>
    </form>
</div>


<!-- jQuery (부트스트랩의 자바스크립트 플러그인을 위해 필요합니다) -->
<script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
<script src="bootstrap2/js/bootstrap.min.js"></script>


<script>
    function create_goal_btn_onClick() {

        if (!checkOldPw()) {
            return;
        } else if (!checkNewpw()) {
            return;

        } else {
            // 이부분에다가 ajax소스를 적습니다.
            $.ajax({
                url: '/homepage/change_user_info/modify_email_check_action.php',
                type: 'POST',
                data: {pw: $('#now-pw').val()},
                dataType: 'html',
                success: function (data) {
                    if(data!==""){
                        alert(data); // 결과 텍스트를 경고창으로 보여준다.
                        return false;
                    }else{//공백일떄, 이상없을때
                        window.opener.name = "parentPage";  // 부모창 이름 설정
                        var openWin = document.getElementById('create-goal-from');  // 전송 폼 설정
                        openWin.action = "/homepage/change_user_info/change_email_action.php";    // 원하는 경로
                        openWin.method = "post";    // submit 방식
                        openWin.target = "parentPage"   // 원하는 윈도우 창 (부모창)
                        document.getElementById('create-goal-from').submit(); // submit 페이지 이동
                        //opener.open('about:blank','_self').close();
                        window.close(); // 현재 창 닫기
                    }
                }
            });



        }
    }


    // 공백 확인 함수
    function checkExistData(value, dataName) {
        if (value == "") {
            alert(dataName + " 입력해주세요!");
            return false;
        }
        return true;
    }

    function checkDate() {
        //목표 날짜 입력 확인
        if (!checkExistData(document.getElementById('create-goal-end-date').value, "목표 기간을")) {
            return false;
        }

        var emailRegExp = /^(19[0-9][0-9]|20\d{2})-(0[0-9]|1[0-2])-(0[1-9]|[1-2][0-9]|3[0-1])$/;
        if (!emailRegExp.test(document.getElementById('create-goal-end-date').value)) {
            alert("목표 기간 형식이 올바르지 않습니다!");
            document.getElementById('create-goal-end-date').value = "";
            document.getElementById('create-goal-end-date').focus();
            return false;
        }
        return true; //확인이 완료되었을 때
    }

    function checkPassword() {
        //목표 title 입력 확인
        if (!checkExistData(document.getElementById('create-goal-end-date').value, "비밀번호를")) {
            return false;
        }

        if (document.getElementById('password').value != '<?=$row['password']?>'
        ) {
            alert("비밀번호가 틀렸습니다.");
            document.getElementById('password').value = "";
            document.getElementById('password').focus();
            return false;
        }
        return true; //확인이 완료되었을 때
    }


    function checkNewpw() {
        //현재 상황 입력 확인
        if (!checkExistData(document.getElementById('new-email').value, "새로운 이메일 주소를")) {
            return false;
        }

        return true; //확인이 완료되었을 때
    }

    function checkOldPw() {
        //현재 비밀번호 입력 확인
        if (!checkExistData(document.getElementById('now-pw').value, "현재 비밀번호를")) {
            return false;
        }
        return true;

    }


</script>
</body>
</html>