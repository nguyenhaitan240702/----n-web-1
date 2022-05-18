<?php
$id = $_POST['id'];
$name = $_POST['name'];
$birthday = $_POST['birthday'];
$gender = $_POST['gender'];
$num = $_POST['number_phone'];
$adress = $_POST['adress'];
$password = $_POST['password'];


require '../../connect.php';

$sql = " update admin
        set 
        name = '$name',
        birthday = '$birthday',
        gender = '$gender',
        number_phone = '$num',
        adress = '$adress',
        password = '$password'
        where id = '$id'
        ";
$result = mysqli_query($connect,$sql);

header('location:admin.php?profile');