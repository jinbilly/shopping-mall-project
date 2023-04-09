<?php
$con = mysqli_connect("127.0.0.1", "root", "1591", "shoppingmalldb");

mysqli_select_db($con, "shoppingmalldb");


$name = $_POST["name_register"];
$id = $_POST["Id_register"];
$hashedPassword = password_hash($_POST['password_register'], PASSWORD_DEFAULT); //암호화 해서 넣어주기
$email = $_POST["emailAddress_register"];

$postNum = $_POST["sample6_postcode"];//우편번호
$address = $_POST["sample6_address"];//주소
$detailAddress = $_POST["sample6_detailAddress"];//상세주소
$phone = $_POST["phoneCall"];//전화번호

$insert_query = "INSERT INTO user_info(name, id, pw, email,postNum,address,detailaddress,phone) VALUES('$name','$id','$hashedPassword','$email','$postNum','$address','$detailAddress','$phone')";
$result = mysqli_query($con, $insert_query);


if ($result == false) {
    echo $hashedPassword;
    echo "저장에 문제가 생겼습니다. 관리자에게 문의해주세요.";
    echo mysqli_error($con);
    echo '<script> alert("문제 닷!!"); </script>';

} else {
    header("Location: http://127.0.0.1/homepage/login.php");
}
?>
