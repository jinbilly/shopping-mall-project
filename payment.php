<?php
session_start();

//****db에 주문내역 table에 주문내역 데이터 넣기****//
$con = mysqli_connect("127.0.0.1", "root", "1591", "shoppingmalldb");

/*유저 ID*/
if (isset($_SESSION["userId"])) {
    $id = $_SESSION["userId"];
} else {
    $id = $_POST[id];
}


/*동적으로 생성된 아이템 seq값 받기*/
$itemName = $_REQUEST['itemName'];//제품 명들 받기
$quantity = $_REQUEST['itemQuantity'];//제품별 주문 수량 받기
$sumPrice = $_REQUEST['sumPrice'];//제품별 결제금액 받기
$itemCode = $_REQUEST['itemCode'];//제품별 아이템 코드 받기



$receivePersonName = $_POST['receivePersonName'];//수령인 이름 받기
$deliverAddress = $_POST['deliverAddress'];//배달받는 곳 주소
$deliverDetailAddress  = $_POST['deliverDetailAddress'];//배달받는곳 상세 주소
$deliverPostNum  = $_POST['deliverPostNum'];//배달받는곳 우편 번호
$deliverPersonPhoneNum  = $_POST['deliverPersonPhoneNum'];//수령인 핸드폰 번호

$paymentSum = $_POST['paymentSum'];//지불 총 금액
$deliverMessage  = $_POST['deliverMessage'];//배송 메세지

/*주문번호 랜덤으로 생성*/
$rand_num = sprintf('%06d', rand(100000000, 999999999));

/*제품 갯수만큼 for문을 돌면서 하나씩 쿼리로 주문내역 table에 데이터 넣기*/
for ($i = 0; $i < count($itemName); $i++) {
    //echo $itemName[$i] . "<br>\n";//상품명(품목)
    //echo $quantity[$i];           //상품 수량(수량)
   // echo $sumPrice[$i];            //상품 별 결제금액

    /*주문내역 table 쿼리*/
    $query = "INSERT INTO order_info(userId,orderNum,itemName,itemQuantity,eachItemPaymentSum,itemCondition) VALUES('$id','$rand_num','$itemName[$i]','$quantity[$i]','$sumPrice[$i]','주문확인중')";

    mysqli_query($con, $query);

    //*결제 내역 테이블 쿼리*//
    $query_payment =
        "INSERT INTO payment_info(userId,orderItem,receivePersonName ,deliverAddress ,deliverDetailAddress ,deliverPostNum ,deliverPersonPhoneNum ,orderNum ,paymentSum ,deliverMessage,itemQuentity,itemCondition,itemCode) 
VALUES('$id','$itemName[$i]','$receivePersonName','$deliverAddress','$deliverDetailAddress','$deliverPostNum','$deliverPersonPhoneNum','$rand_num','$paymentSum','$deliverMessage','$quantity[$i]','주문확인중',$itemCode[$i])";

    mysqli_query($con, $query_payment);

}

?>




<!DOCTYPE html>
<html>
<head></head>
<body>

<script type="text/javascript" src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
<script type="text/javascript" src="https://service.iamport.kr/js/iamport.payment-1.1.5.js"></script>

<input type="hidden" name="orderNum" id="orderNum" value="<?php echo $rand_num;?>">

<script>
    var orderNumber = document.getElementById("orderNum").value;
    var IMP = window.IMP;
    IMP.init('imp50579433');
    IMP.request_pay({
        pg: 'html5_inicis',
        pay_method: 'card',
        merchant_uid: 'merchant_' + new Date().getTime(),
        name: '주문명:결제테스트',
        amount: 101,
        buyer_email: 'iamport@siot.do',
        buyer_name: '구매자이름',
        buyer_tel: '010-1234-5678',
        buyer_addr: '서울특별시 강남구 삼성동',
        buyer_postcode: '123-456'
    }, function (rsp) {
        if (rsp.success) {//결제 완료 시 행동
            var msg = '결제가 완료되었습니다.';
            // msg += '고유ID : ' + rsp.imp_uid;
            // msg += '상점 거래ID : ' + rsp.merchant_uid;
            //msg += '결제 금액 : ' + rsp.paid_amount;
            //msg += '카드 승인번호 : ' + rsp.apply_num;
            alert(msg);
            $.ajax({
                url: '/homepage/order_success_action.php',
                type: 'POST',
                data: {orderNum: $('#orderNum').val()},
                dataType: 'html',
                success: function (data) {
                    location.href = "orderFinish.php?orderNum="+orderNumber;
                }
            });


        } else {
            var msg = '결제에 실패하였습니다.';
            msg += '에러내용 : ' + rsp.error_msg;
            alert(msg);

            $.ajax({
                url: '/homepage/order_cancle_action.php',
                type: 'POST',
                data: {orderNum: $('#orderNum').val()},
                dataType: 'html',
                success: function (data) {
                    location.href = "shop-cart.php";
                }
            });


        }
    });

</script>
</body>
</html>


<script>

</script>