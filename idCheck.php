<?php

$id = $_POST['id'];

$con = mysqli_connect("127.0.0.1", "root", "1591", "shoppingmalldb");

$sql = " select count(*) from user_info where id='$id' ";

$Result = mysqli_query($con,$sql);

$rows = mysqli_num_rows($Result);

if($rows > 0){
    $data = mysqli_fetch_array($Result);
}

if($data[0] == 0){ echo "사용가능한 ID입니다."; }

else{ echo "사용중인 ID입니다."; }

mysqli_close($con);

?>
