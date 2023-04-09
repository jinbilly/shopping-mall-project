

<?php
session_start();
$con = mysqli_connect("127.0.0.1", "root", "1591", "shoppingmalldb");
$id=$_SESSION['userId'];

$orderNum = $_POST['orderNum'];
$invoiceNum = $_POST['invoiceNum'];
$itemName = $_POST['itemName'];


echo $itemName;



$query = "UPDATE payment_info SET itemCondition ='배송중',invoiceNum ='$invoiceNum' WHERE orderNum =$orderNum and orderItem='$itemName'";
$result = mysqli_query($con, $query);

?>