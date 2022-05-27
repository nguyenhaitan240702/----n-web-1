<?php

$name = $_POST['name'];
$birthday = $_POST['birthday'];
$gender = $_POST['gender'];
$address = $_POST['adress'];
$number_phone = $_POST['number_phone'];
$email = $_POST['email'];
$password = $_POST['password'];

$connect = mysqli_connect('localhost','root','0000','project_web_1',3306);
mysqli_set_charset($connect,'utf8');
if ($connect->connect_error) {
    echo "d";
    die("Connection failed: " . $connect->connect_error);
}
$sql = "insert into admin(name, birthday , gender, adress, number_phone, email,password, level)
values(' $name','$birthday','$gender','$address','$number_phone' ,'$email','$password','1')";
//die($sql);

mysqli_query($connect, $sql);
mysqli_close($connect);
header('location:../super_admin.php?statistical=1&success= Thêm thành công');
