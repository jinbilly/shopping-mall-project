<?php
session_start();

$con = mysqli_connect("127.0.0.1", "root", "1591", "shoppingmalldb");


if (isset($_SESSION["userId"])) {
    $id =$_SESSION["userId"];
}else{
    $id = $_POST[id];                      //Writer
}

$itemname=$_POST['itemName'];
$title = $_POST['title'];                  //Title
$content = $_POST['content'];              //Content
$orderNum = $_POST['orderNum']; //주문번호

$date = date('Y-m-d H:i:s');            //Date

$URL = './product-details.php?itemName='.$itemname;                   //return URL


$query = "INSERT INTO item_review(itemName,title,writerId,date,content,orderNum) VALUES('$itemname','$title','$id','$date','$content','$orderNum')";
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