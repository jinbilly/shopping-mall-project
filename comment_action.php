<?php
session_start();

$con = mysqli_connect("127.0.0.1", "root", "1591", "shoppingmalldb");


if (isset($_SESSION["userId"])) {
    $id =$_SESSION["userId"];
}else{
    $id = $_POST[id];                      //Writer
}


$QnASeq = $_POST[QnASeq];                  //QnASeq
$content = $_POST[comment];              //Content
$date = date('Y-m-d H:i:s');            //Date



$query = "INSERT INTO QnAcomment_info(QnASeq_check,id,date,content) VALUES('$QnASeq','root','$date','$content')";

$result = mysqli_query($con, $query);

if($result){ echo "댓글이 정상적으로 입력되었습니다."; }


mysqli_close($con);
?>
