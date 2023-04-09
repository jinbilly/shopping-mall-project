

<?php
session_start();
$con = mysqli_connect("127.0.0.1", "root", "1591", "shoppingmalldb");
$id=$_SESSION['userId'];

$query = "DELETE FROM order_info WHERE userId='$id'";
mysqli_query($con, $query);

$orderNum = $_POST['orderNum'];

$query2 = "DELETE FROM payment_info WHERE userId='$id' and  orderNum= $orderNum";
mysqli_query($con, $query2);
?>