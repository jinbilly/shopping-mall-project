<?php
session_start();

$con = mysqli_connect("127.0.0.1", "root", "1591", "shoppingmalldb");


if (isset($_SESSION["userId"])) {
    $id =$_SESSION["userId"];
}else{
    $id = $_POST[id];                      //Writer
}
$index = $_POST[index];
$title = $_POST[title];                  //Title
$content = $_POST[content];              //Content
$date = date('Y-m-d H:i:s');            //Date

$URL = './AdminPage.php?index=4';                   //return URL


$query = "UPDATE Notice_info SET title ='$title',content = '$content' WHERE NoticeSeq ='$index'";
$result = mysqli_query($con, $query);


if($result){
    ?>                  <script>
        alert("<?php echo "글이 수정되었습니다."?>");
        location.replace("<?php echo $URL?>");
    </script>
    <?php
}
else{
    echo $index;
    echo $title;
    echo $content;
    echo "FAIL";
}
mysqli_close($con);
?>