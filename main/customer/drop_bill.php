<?php 

$id = $_GET['id'];
echo $id;

require('../../connect.php');

$sql = "update bill set id_status = 4 where id ='$id' ";


mysqli_query($connect,$sql);

mysqli_close($connect);

header('location:profile.php');