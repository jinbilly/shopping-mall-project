<?php
$con = mysqli_connect("127.0.0.1", "root", "1591", "shoppingmalldb");

mysqli_select_db($con,"shoppingmalldb");

$id = $_POST["id"];
$pw = $_POST["pw"];
$rememberPasswordCheck=$_POST["rememberPasswordCheck"];

//db정보 가져오기
$idCheckQuery = "SELECT * FROM user_info WHERE id ='$id'";
$result = mysqli_query($con, $idCheckQuery);

$row = mysqli_fetch_array($result);
//echo $row;
$hashedPassword=$row['pw'];
$row['id'];

$passwordResult = password_verify($pw, $hashedPassword);

if ($passwordResult) {
    // 로그인 성공
    // 세션에 id 저장
    session_start();
    $id = $row['id'];
    $_SESSION['userId'] = $row['id'];
    print_r($_SESSION);
    echo $_SESSION['userId'];


    //자동 로그인에 체크 했으면 쿠키에 아이디값 저장 해주기
    if($rememberPasswordCheck!=null){
        setcookie("userIdCookie", $id, time() +  86400 * 30);
    }else{
        setcookie("userIdCookie", "", time() - 3600);
    }






    echo '<script> location.href = "index.php";</script>';
} else {
    // 로그인 실패
    echo '<script>alert("로그인에 실패하였습니다");</script>';
    echo '<script> location.href = "login.php";</script>';

}
?>
