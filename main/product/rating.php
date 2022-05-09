<?php 
 session_start();
 
 $id_product = $_POST['id_product'];
 $content = $_POST['content'];
 $star = $_POST['star'];
 
 $id_customer = $_SESSION['id'];

 require '../../connect.php';

 $sql = "insert into rating(id_product,id_customer,content,rating)
 values('$id_product','$id_customer','$content','$star')";

 mysqli_query($connect,$sql);
mysqli_close($connect);
header("location:index.php?id=$id_product");

 