<?php 
 require 'connect.php';

$sql = "select id from customer";
$id_customer = mysqli_query($connect,$sql);
$admin = ['1','3','4'];
$bii = ['1','2','4'];
$customer = [];

foreach($id_customer as $each){
$x = $each['id'];
array_push($customer,$x);
}
$sql = "select id from products";
$id_product = mysqli_query($connect,$sql);

$product = [];

foreach($id_product as $each){
$z = $each['id'];
array_push($product,$z);
}
$content = [
    "Sản phẩm vô cùng tốt",    
    "10 điểm",    
    "Sản phẩm chất lượng, sẽ mua thêm",    
    "Sản phẩm dởm vc",    
    "Sản phẩm đểu",    
    "Sản phẩm như này mà cũng bán, dẹp mẹ shop đi"
];
$rating = ['1','2','3','4','5'];
// for($i = 1; $i <= 3000; $i++){
//     $random_rating = array_rand($rating,1);
//     $e = $rating[  $random_rating];
//     $random_content = array_rand($content,1);
//     $d = $content[  $random_content];
//     $random_product = array_rand($product,1);
//     $random_admin = array_rand($admin,1);
//     $b = $admin[$random_admin];
//     $random_customer = array_rand($customer,1);
//     $a = $customer[$random_customer];
//     $c = $product[$random_product];
//     $price= rand(10000000,30000000);
//     $int= mt_rand(1648771200,1651303852);
//     $time = date("Y-m-d H:i:s",$int);
    
//        $phone = rand(100000000,999999999);
//        $sql = "insert into rating(id_customer, id_product, content, rating, time)
//          values ('$a',' $c ','$d',' $e','$time')";
//     mysqli_query($connect,$sql);
// }
for($i = 1; $i <= 10000; $i++){
    
$random_product = array_rand($product,1);
$random_admin = array_rand($admin,1);
$b = $admin[$random_admin];
$random_bii = array_rand($bii,1);
$biii = $bii[$random_bii];
$random_customer = array_rand($customer,1);
$a = $customer[$random_customer];
$c = $product[$random_product];
$price= rand(10000,3000000);
$int= mt_rand(1640995200,1651678456);
$time = date("Y-m-d H:i:s",$int);

   $phone = rand(100000000,999999999);
   $sql = "insert into bill( id_customer,time, adress, number_phone, notes, id_status, total_price, id_admin)
values('$a','$time', 'egsdf', '$phone', 'sfsaf', '$biii', '$price', '$b')";
mysqli_query($connect,$sql);


$sql = "select max(id) from bill where id_customer = '$a'";
$result = mysqli_query($connect,$sql);
$id_bill = mysqli_fetch_array($result)['max(id)'];
$sql = "insert into bill_detail(id_bill,id_product,quantity)
values('$id_bill','$c','1')";
mysqli_query($connect,$sql);

}
// for($i = 100; $i <= 100000; $i++){
//     $name = 'User ' . $i;
//     $email = 'user' . $i . '@gmail.com';
//     $number_phone = rand(100000000,999999999);
//     $int= mt_rand(1640995200,1651678456);
//     $time = date("Y-m-d H:i:s",$int);
//     $sql = "insert into customer( name, birthday, gender, adress, number_phone, email, password)
//     values( '$name', '$time', 'Nam', 'asdadad', '$number_phone', '$email', '0000')";
//     mysqli_query($connect,$sql);

// }
// $date = new DateTime('2022-01-01');
// echo $date->getTimestamp();
// $date = 

// $sql = "delete from bill where adress like '%egsdf%' and notes like '%sfsaf%'";
// mysqli_query($connect,$sql);

