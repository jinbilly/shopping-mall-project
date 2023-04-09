<?php
session_start();
$con = mysqli_connect("127.0.0.1", "root", "1591", "shoppingmalldb");
$id=$_SESSION['userId'];

/*결제가 완료 되면 해당 유저 장바구니 초기화 시켜주기*/
$query = "DELETE FROM shop_cart_info WHERE userId='$id'";
mysqli_query($con, $query);


//$query2 = "UPDATE item_info SET payment_info WHERE userId='$id'";
//mysqli_query($con, $query2);
?>