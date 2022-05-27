<?php

$name = $_POST['name'];

$connect = mysqli_connect('localhost','root','0000','project_web_1',3306);
mysqli_set_charset($connect,'utf8');

$sql = "insert into manufacturers(name)
values(' $name')";


mysqli_query($connect, $sql);
mysqli_close($connect);
header('location:super_admin.php?statistical=4');