<?php

$name = $_POST['name'];
$description = $_POST['description'];
$images = $_FILES['images'];
$price = $_POST['price'];
$id_manufacturers = $_POST['id_manufacturers'];
$id_category = $_POST['id_category'];
$folder = 'images/';
$file_extension= explode('.' , $images['name']) [1];
$file_name = time() . '.' . $file_extension;
$path_file = $folder . $file_name;
move_uploaded_file($images["tmp_name"] , $path_file);

$connect = mysqli_connect('localhost','root','0000','project_web_1',3306);
mysqli_set_charset($connect,'utf8');

$sql = "insert into products(name, description , images, price, id_status, id_manufacture,id_category)
values(' $name','$description','$file_name','$price','1' ,'$id_manufacturers','$id_category')";


mysqli_query($connect, $sql);
mysqli_close($connect);
if($_SESSION['level'] == 1){
    header('location:admin.php?statistical=1');
}
if($_SESSION['level'] == 2){
    header('location:super_admin.php?statistical=3');
}
