<?php
session_start();

$con = mysqli_connect("127.0.0.1", "root", "1591", "shoppingmalldb");


$index = $_POST['reviewSeq'];
$title = $_POST['title'];                  //Title
$content = $_POST['content'];              //Content

$URL = './myPage.php?index=3';                   //return URL


$query = "UPDATE item_review SET title ='$title', content = '$content' WHERE reviewSeq ='$index'";
$result = mysqli_query($con, $query);


if($result){
    ?>                  <script>
        alert("<?php echo "리뷰가 수정되었습니다."; ?>");
        location.replace("<?php echo $URL; ?>");
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