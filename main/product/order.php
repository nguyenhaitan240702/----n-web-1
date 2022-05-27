<?php
$name = $_POST['name'];
$number_phone = $_POST['number_phone'];
$adress = $_POST['adress'];
$notes = $_POST['notes'];

require('../../connect.php');

session_start();

$cart = $_SESSION['cart'];
$total_price = 0;
$id_customer = $_SESSION['id'];
$id_status = 1;

foreach($cart as $each){
    $total_price += $each['quantity'] * $each['price'];
}
$sql = "insert into bill( id_customer,name, adress, number_phone, notes, id_status, total_price)
values('$id_customer','$name', '$adress', '$number_phone', '$notes', '$id_status', '$total_price')";
mysqli_query($connect,$sql);


$sql = "select max(id) from bill where id_customer = '$id_customer'";
$result = mysqli_query($connect,$sql);
$id_bill = mysqli_fetch_array($result)['max(id)'];

foreach($cart as $id_product => $each){
    $quantity = $each['quantity'];
    $sql = "insert into bill_detail(id_bill,id_product,quantity)
    values('$id_bill','$id_product','$quantity')";
    mysqli_query($connect,$sql);

}
mysqli_close($connect);
unset($_SESSION['cart']);

header('location:/----n-web-1/----n-web-1/index.php');