<?php
session_start();

$con = mysqli_connect("127.0.0.1", "root", "1591", "shoppingmalldb");



$id =$_SESSION["userId"];

$email = $_POST['new-email'];
$URL = '../../homepage/myPage.php';                   //return URL


$query = "UPDATE user_info SET email ='$email' WHERE id ='$id'";
$result = mysqli_query($con, $query);

if($result){
    ?>                  <script>
        alert("<?php echo "이메일이 수정되었습니다."?>");
        location.replace("<?php echo $URL?>");
    </script>
    <?php
}
else{
    echo "FAIL";
}

mysqli_close($con);
?>