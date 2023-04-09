<?php
session_start();


$con = mysqli_connect("127.0.0.1", "root", "1591", "shoppingmalldb");

mysqli_select_db($con,"shoppingmalldb");

$id = $_SESSION['userId'];
$pw = $_POST['pw'];

//db정보 가져오기
$idCheckQuery = "SELECT * FROM user_info WHERE id ='$id'";
$result = mysqli_query($con, $idCheckQuery);

$row = mysqli_fetch_array($result);
$hashedPassword=$row['pw'];

$passwordResult = password_verify($pw, $hashedPassword);


if(!$passwordResult){ echo "현재 비밀번호가 틀립니다."; }

?>
