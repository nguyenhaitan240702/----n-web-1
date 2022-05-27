<?php

if(empty($_GET['id'])){
    header('location:index.php?error= Phải truyền mã để xóa');
    exit;
}
$id = $_GET['id'];

$connect = mysqli_connect('localhost','root','0000','project_web_1',3306);
mysqli_set_charset($connect,'utf8');
$sql = "delete from admin
where
id = '$id';
";

mysqli_query($connect, $sql);
$error = mysqli_error($connect);

mysqli_close($connect);

header('location:?statistical=1');
