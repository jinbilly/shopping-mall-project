<?php
session_start();

$con = mysqli_connect("127.0.0.1", "root", "1591", "shoppingmalldb");


//if (isset($_SESSION["userId"])) {
//    $id =$_SESSION["userId"];
//}else{
//    $id = $_POST[id];                      //Writer
//}
//
//
//$QnASeq = $_POST[QnASeq];                  //QnASeq
//$content = $_POST[comment];              //Content
//


$comment_seq= $_POST[comment_seq];




$query = "DELETE FROM QnAcomment_info WHERE commentSeq=$comment_seq";

$result = mysqli_query($con, $query);



if($result){ echo "댓글이 정상적으로 삭제되었습니다.."; }


mysqli_close($con);
?>
