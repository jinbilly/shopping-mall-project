<?php
$con = mysqli_connect("127.0.0.1", "root", "1591", "shoppingmalldb");

$URL = './myPage.php?index=3';                   //return URL

$index = $_GET['index'];
$query = "DELETE FROM item_review WHERE reviewSeq =$index";
$result = mysqli_query($con, $query);


if($result){
    ?>                  <script>
        alert("<?php echo "삭제되었습니다." ?>");
        location.replace("<?php echo $URL?>");
    </script>
    <?php
}
else{
    echo "FAIL";
}
mysqli_close($con);
?>