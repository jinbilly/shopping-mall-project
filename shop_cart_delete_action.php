<?php
session_start();

$con = mysqli_connect("127.0.0.1", "root", "1591", "shoppingmalldb");


$id = $_SESSION["userId"];//유저 아이디

$itemSeq = $_POST['itemSeq'];//상품 번호

$query = "DELETE FROM shop_cart_info WHERE itemSeq='$itemSeq'and userId='$id'";

$result = mysqli_query($con, $query);

if ($result) {
    echo $itemSeq;
    echo $id;
    echo "상품이 장바구니에서 삭제 되었습니다.";
}


mysqli_close($con);
?>
