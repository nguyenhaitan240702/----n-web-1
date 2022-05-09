<?php  
     session_start();
    if(isset($_COOKIE['remember'])){
            $token = $_COOKIE['remember'];
            require './connect.php';


            $sql = "select * from admin
            where token = '$token'
            limit 1";
            $redult = mysqli_query($connect,$sql);
              $each = mysqli_fetch_array($redult);
         
           
            if($each !== null){ 
              
             $_SESSION['level'] = $each['level'];
            $_SESSION['id'] = $each['id'];
            $_SESSION['name'] = $each['name'];
            if($_SESSION['level'] == 1){
                header('location:http://localhost/----n-web-1/----n-web-1/main/manager/admin.php');
                exit;
            }
            if($_SESSION['level'] == 2){
                header('location:http://localhost/----n-web-1/----n-web-1/main/manager/super_admin.php');
                exit;
            }
            }else{
                $sql = "select * from customer
                where token = '$token'
                limit 1";
                $result = mysqli_query($connect,$sql);
                $each = mysqli_fetch_array($result);
            
                $_SESSION['id'] = $each['id'];
                $_SESSION['name'] = $each['name'];
            }
    }

?>
<!DOCTYPE html>
<html lang="en">
<?php include('head.php') ?>
<body>
    
    <!-- phần menu -->

    <?php include('header.php') ?>
   
    <!-- phần bài đăng -->
   
    <?php include('container.php') ?>
   
    <!-- phần chân web -->

    

    <script src="http://localhost/----n-web-1/----n-web-1/asset/javascript/validate.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.3/dist/jquery.validate.min.js"></script>
</body>
</html>