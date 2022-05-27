<?php

$id = $_GET['id'];

$connect = mysqli_connect('localhost','root','0000','project_web_1',3306);
mysqli_set_charset($connect,'utf8');

$sql = "update bill set id_status = '2' where id = '$id' ";
mysqli_query($connect , $sql);
header('location:admin.php?ok');