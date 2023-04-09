<?php
$con = mysqli_connect("127.0.0.1", "root", "1591", "shoppingmalldb");


$itemSeq = $_POST['itemSeq'];//상품 번호

$query = "DELETE FROM item_info WHERE itemSeq=$itemSeq";

$result = mysqli_query($con, $query);



if($result){ echo "상품이 정상적으로 삭제 되었습니다."; }


mysqli_close($con);
?>
