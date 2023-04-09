<?php
session_start();

$con = mysqli_connect("127.0.0.1", "root", "1591", "shoppingmalldb");



$id =$_SESSION["userId"];

$hashedPassword = password_hash($_POST['new-pw'], PASSWORD_DEFAULT); //암호화 해서 넣어주기

$URL = '../../homepage/myPage.php';                   //return URL


$query = "UPDATE user_info SET pw ='$hashedPassword' WHERE id ='$id'";
$result = mysqli_query($con, $query);

if($result){
    ?>                  <script>
        alert("<?php echo "비밀번호가 수정되었습니다."?>");
        location.replace("<?php echo $URL?>");
    </script>
    <?php
}
else{
    echo "FAIL";
}

mysqli_close($con);
?>