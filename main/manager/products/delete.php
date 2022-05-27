<?php

$id = $_GET['id'];

$connect = mysqli_connect('localhost','root','0000','project_web_1',3306);
mysqli_set_charset($connect,'utf8');

$sql = "delete from products
where
id = '$id';
";

mysqli_query($connect, $sql);

mysqli_close($connect);


header('location:admin.php?statistical=1');