

<?php
session_start();
$con = mysqli_connect("127.0.0.1", "root", "1591", "shoppingmalldb");
$id=$_SESSION['userId'];

$orderNum = $_POST['orderNum'];
$itemName = $_POST['itemName'];


$query = "UPDATE payment_info SET itemCondition ='상품준비중' WHERE orderNum ='$orderNum' and orderItem='$itemName'";
$result = mysqli_query($con, $query);

?>