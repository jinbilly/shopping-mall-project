<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
</head>

<body>
<?php
//ini_set() 함수는 기존 php.ini 파일의 설정을 무시하고 run time으로 해당 파일이 수행될 때 설정함
ini_set("display_errors","1");


$uploaddir = '127.168.56.1/usr/local/apache2.4/htdocs/homepage/imgFile/';
$uploadfile = $uploaddir.basename($_FILES['imgfile']['name']);

if(move_uploaded_file($_FILES['imgfile']['tmp_name'], $uploadfile)){
    echo "파일이 유효하고, 성공적으로 업로드 되었습니다.";
}else{
    echo "실패했씁니다.";
}
?>

<img src="imgFile/<?=$_FILES['imgfile']['name']?>"/>

</body>
</html>