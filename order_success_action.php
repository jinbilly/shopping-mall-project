<?php
session_start();

error_reporting(E_ALL);
ini_set("display_errors", 1);

$con = mysqli_connect("127.0.0.1", "root", "1591", "shoppingmalldb");
$id=$_SESSION['userId'];

$orderNum=$_POST['orderNum'];//주문번호 받기


$query1 = "SELECT * FROM payment_info WHERE userId='$id' and orderNum=$orderNum";
$q1 = mysqli_query($con, $query1);

while ($q1_result = mysqli_fetch_array($q1)){


    $search_query1="SELECT * FROM item_info WHERE itemSeq = $q1_result[15]";
    $re=mysqli_query($con,$search_query1);
    $result=mysqli_fetch_array($re);


    //상품 개수 주문 개수 만큼
    $item_stock_minus=$result[5]-$q1_result[12];
    $item_stock_minus_update="UPDATE item_info SET stock = $item_stock_minus WHERE itemSeq =$q1_result[15]";
    mysqli_query($con,$item_stock_minus_update);

}








//장바구니 테이블 삭제해주기


/*결제가 완료 되면 해당 유저 장바구니 초기화 시켜주기*/
$query = "DELETE FROM shop_cart_info WHERE userId='$id'";
mysqli_query($con, $query);


?>