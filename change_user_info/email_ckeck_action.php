<?php
$con = mysqli_connect("127.0.0.1", "root", "1591", "shoppingmalldb");

mysqli_select_db($con, "shoppingmalldb");

$id = $_SESSION['userId'];
$email = $_POST['email'];   //email 값 post로 받아오기


//db정보 가져오기
$idCheckQuery = "SELECT * FROM user_info WHERE email ='$email'";   //email값으로 회원정보 가져오기
$result = mysqli_query($con, $idCheckQuery);
$row = mysqli_fetch_array($result);


if($row[4]!=null){ //입력한 이메일을 가진 유저가 있을때,

}else{  //해당 이메일을 가진 유저가 없을 때
    echo "해당 이메일을 가진 사용자가 없습니다.";
}

