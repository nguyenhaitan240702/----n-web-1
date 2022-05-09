<?php 
$email = $_POST['email'];
$password = $_POST['password'];
if(isset($_POST['remember'])){
    $remenber = true;
}else{
    $remenber = false;
}
require 'connect.php';
$sql = "select * from admin
where email = '$email' and password = '$password'";

$result = mysqli_query($connect,$sql);
$num_row =mysqli_num_rows($result);
if($num_row == 1){
    session_start();
    $each = mysqli_fetch_array($result);
    $id = $each['id'];
    $_SESSION['id'] = $id;
    $_SESSION['name'] = $each['name'];
    $_SESSION['level'] = $each['level'];    
    if($remenber){
        $token = uniqid('user_',true);
        $sql = "update admin
        set
        token = '$token'
        where
        id = '$id'";
        mysqli_query($connect,$sql);

        setcookie('remember',$token,time() + 60*60*24*30);
    }
  echo '1';
}else{

        $sql = "select * from customer
        where email = '$email' and password = '$password'";

        $result = mysqli_query($connect,$sql);
        $num_roww =mysqli_num_rows($result);
        if($num_roww == 1){
            session_start();
            $each = mysqli_fetch_array($result);
            $id = $each['id'];
            $_SESSION['id'] = $id;
            $_SESSION['name'] = $each['name'];
                
            if($remenber){
                $token = uniqid('user_',true);
                $sql = "update customer
                set
                token = '$token'
                where
                id = '$id'";
                mysqli_query($connect,$sql);

                setcookie('remember',$token,time() + 60*60*24*30);
            }
        echo '1';
        }else{
        echo 'Hình như có nhầm lẫn ở đâu rồi bạn thử kiểm tra lại email hoặc mật khẩu xem !';
        }
}