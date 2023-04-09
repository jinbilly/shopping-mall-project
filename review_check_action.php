<?php
session_start();

$con = mysqli_connect("127.0.0.1", "root", "1591", "shoppingmalldb");


if (isset($_SESSION["userId"])) {
    $id =$_SESSION["userId"];
}else{
    $id = $_POST[id];                      //Writer
}


$category = $_POST['category']; //카테고리(상품명 받기)

$orderNum = $_POST['orderNum']; //주문번호 받기

$query = "SELECT * FROM item_review WHERE writerId='$id' and itemName='$category' and orderNum=$orderNum";

$result = mysqli_query($con, $query);

$result2=mysqli_fetch_array($result);

if($result2[0]!=null){
    echo "이미 리뷰를 작성하셨습니다.";
}

mysqli_close($con);
?>
