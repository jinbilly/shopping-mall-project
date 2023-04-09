<?php
session_start();

$con = mysqli_connect("127.0.0.1", "root", "1591", "shoppingmalldb");


if (isset($_SESSION["userId"])) {
    $id =$_SESSION["userId"];
}else{
    $id = $_POST[id];                      //Writer
}

$title = $_POST[title];                  //공지사항 제목
$content = $_POST[content];              //공지사항 내용
$date = date('Y-m-d H:i:s');            //공지사항 날짜


$URL = './AdminPage.php?index=4';                   //return URL


$query = "INSERT INTO Notice_info(title,id,date,views,content) VALUES('$title','관리자','$date',0,'$content')";
$result = mysqli_query($con, $query);


if($result){
    ?>                  <script>
        alert("<?php echo "글이 등록되었습니다."?>");
        location.replace("<?php echo $URL?>");
    </script>
    <?php
}
else{
    echo "FAIL";
}
mysqli_close($con);
?>