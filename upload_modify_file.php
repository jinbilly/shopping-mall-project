<?php
$con = mysqli_connect("127.0.0.1", "root", "1591", "shoppingmalldb");

$dateFileName = date('Y-m-d H:i:s');            //Date
$allowedExts = array("gif", "jpeg", "jpg", "png", "PNG");
$extension = null;

if (isset($_FILES)) {//파일이 있을때
    $file = $_FILES["file"];
    $error = $file["error"];
    $name = $file["name"];
    $type = $file["type"];
    $size = $file["size"];
    $tmp_name = $file["tmp_name"];

    if ( $error > 0 ) { //에러가 있을때
        echo "Error: " . $error . "<br>";
    }
    else {  //에러가 없을때
        $temp = explode(".", $name);
        $extension = end($temp);


        if ( ($size/1024/1024) < 2. && in_array($extension, $allowedExts) ) {
            //echo "Upload: " . $name . "<br>";
            //echo "Type: " . $type . "<br>";
            //echo "Size: " . ($size / 1024 / 1024) . " Mb<br>";
            //echo "Stored in: " . $tmp_name;
            if (file_exists($_SERVER['DOCUMENT_ROOT']."/homepage/img/itemPhoto/".$dateFileName.".".$extension)) {
                echo $name . " already exists. ";
            }
            else {
                move_uploaded_file($tmp_name, $_SERVER['DOCUMENT_ROOT']."/homepage/img/itemPhoto/".$dateFileName.".".$extension);
                echo "Stored in: " . $_SERVER['DOCUMENT_ROOT']."/homepage/img/itemPhoto/".".".$dateFileName.$extension;
            }
        }
        else {
            echo ($size/1024/1024) . " Mbyte is bigger than 2 Mb ";
            echo $extension . "format file is not allowed to upload ! ";
        }
    }
}
else { //파일이 없을때
    echo "File is not selected";
}

//db에 넣을 데이터들 post로 받아오기

$itemSeq = $_POST['itemSeq'];
$itemName = $_POST['itemName'];
$category = $_POST['category'];
$brand  = $_POST['brand'];
$price  = $_POST['price'];
$stock    = $_POST['stock'];
$tall   = $_POST['tall'];
$shoulderWidth = $_POST['shoulderWidth'];
$crossSection  = $_POST['crossSection'];
$sleeveLength  = $_POST['sleeveLength'];
$itemImageRoot  =  "/homepage/img/itemPhoto/".$dateFileName.".".$extension;
$itemSimpleExplain  = $_POST['details'];
$itemDetailExplain  = $_POST['content'];
$date = date('Y-m-d');            //등록일자
$URL = './shop.php?category='.$category;                   //return URL

$shoulderToSleeve  = $_POST['shoulderToSleeve'];
$edgeGirth = $_POST['edgeGirth'];


$query = "UPDATE item_info SET itemName ='$itemName', category = '$category',brand ='$brand', price = '$price',
                     itemName ='$itemName', stock = '$stock',tall ='$tall', shoulderWidth = '$shoulderWidth' ,
                     crossSection ='$crossSection', sleeveLength = '$sleeveLength',itemImageRoot ='$itemImageRoot', 
                     itemSimpleExplain = '$itemSimpleExplain',itemDetailExplain ='$itemDetailExplain', date = '$date', 
                     shoulderToSleeve = '$shoulderToSleeve', edgeGrith = '$edgeGirth' WHERE itemSeq ='$itemSeq'";


$result = mysqli_query($con, $query);

echo $extension;

if($result){
    ?>                  <script>
        alert("<?php echo "상품이 수정되었습니다."?>");
        alert("<?php echo $itemName?>");
        alert("<?php echo $category?>");
        alert("<?php echo $brand?>");
        alert("<?php echo $price?>");


        //location.replace("<?php echo $URL?>");
    </script>
    <?php
}
else{
    echo "FAIL";
}
mysqli_close($con);



?>