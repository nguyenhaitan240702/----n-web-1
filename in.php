<?php
$connect = mysqli_connect('localhost','root','0000','project_web_1',3306);
mysqli_set_charset($connect,'utf8');
$sql = "select id from customer";
$id_customer = mysqli_query($connect,$sql);
$admin = ['1','3','4'];
$bii = ['1','2','4'];
$customer = [];

foreach($id_customer as $each){
$x = $each['id'];
array_push($customer,$x);
}
$sql = "select id,price from products";
$id_product = mysqli_query($connect,$sql);

$product = [];
$price = [];
foreach($id_product as $each){
$z = $each['id'];
$product[] = $z;
$x = $each['price'];
$price[] = $x;
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
$images = [
    "1653145268.jpg",
    "1653145316.jpg",
    "1653145417.jpg",
    "1653145470.jpg",
    "1653145696.jpg",
    "1653145737.jpg",
    "1653145767.jpg",
    "1653145807.jpg",
    "1653145835.jpg",
];
$category = ['1','2','3','4','5','6'];
$manufacturers = ['1','2','3','4','5','6','7','8'];
$product_status = ['1','2','3'];
//for( $i =1 ; $i <= 500 ; $i++ ){
//    $name = "Sản phẩm " . $i;
//    $random_image = array_rand($images,1);
//    $a = $images[$random_image];
//    $random_category = array_rand($category,1);
//    $b = $category[$random_category];
//    $random_manufacturer = array_rand($manufacturers,1);
//    $c = $manufacturers[$random_manufacturer];
//    $random_status = array_rand($product_status,1);
//    $d = $product_status[$random_status];
//    $price= random_int(50000,300000);
//
//    $sql = "insert into products(name, description, images, id_manufacture, id_category, id_status, price)
//            values('$name', 'Một sản phẩm vô cùng tốt', '$a', '$c', '$b', '$d', '$price')";
//    mysqli_query($connect,$sql);
//}

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




for($i = 1; $i <= 61; $i++){

$random_product = array_rand($product,1);
$random_admin = array_rand($admin,1);
$b = $admin[$random_admin];
echo $b;
$random_bii = array_rand($bii,1);
$biii = $bii[$random_bii];
$random_customer = array_rand($customer,1);
$a = $customer[$random_customer];
echo $a;
$c = $product[$random_product];
echo $c;
$random_price = array_rand($price,1);
$zz = $price[$random_price];
echo $zz;
$int= random_int(1640995200,1653609600);
$time = date("Y-m-d H:i:s",$int);

   $phone = random_int(100000000,999999999);
   $sql = "insert into bill( id_customer,name,time, adress, number_phone, notes, id_status, total_price)
            values('$a','sumo','$time', 'egsdf', '$phone', 'sfsaf', '1', '$zz')";
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
// $date = new DateTime('2022-05-27');
// echo $date->getTimestamp();
// $date = 

// $sql = "delete from bill where adress like '%egsdf%' and notes like '%sfsaf%'";
// mysqli_query($connect,$sql);

