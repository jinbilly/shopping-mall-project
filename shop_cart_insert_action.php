<?php
session_start();

$con = mysqli_connect("127.0.0.1", "root", "1591", "shoppingmalldb");


$id = $_SESSION["userId"];//유저 아이디

$itemName = $_POST['itemName'];//상품명
$itemSeq = $_POST['itemSeq'];//상품 번호


$checkSearch="SELECT EXISTS (SELECT * from shop_cart_info WHERE userId='$id' and itemSeq='$itemSeq')";

$checkSearchQuery = mysqli_query($con, $checkSearch);

$checkSearchQueryResult = mysqli_fetch_array($checkSearchQuery);



if($checkSearchQueryResult[0]){//결과가 있다 = 장바구니에 이미 해당 제품이 들어있다
    echo "해당 상품이 이미 장바구니에 존재합니다.";
}else{//결과가 없다, 해당 제품이 장바구니에 없다

    $query = "INSERT INTO shop_cart_info(userId,itemName,itemSeq) VALUES('$id','$itemName','$itemSeq')";

    $result = mysqli_query($con, $query);

    if ($result) {
        echo "상품이 장바구니에 담겼습니다.";
    }
}


mysqli_close($con);
?>
