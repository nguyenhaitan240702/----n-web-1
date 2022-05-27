<?php session_start() ?>
<!DOCTYPE html>
<html lang="en">
<?php include('../../head.php') ?>
<body>
<?php include('../../header.php') ?>


<!-- phần bài đăng -->
<div id="container" >
    <?php include('../../menu.php');
    date_default_timezone_set('Asia/Ho_Chi_Minh');
    ?>
    <div class="profile">
        <div class="update_profile">
            <button class="btn_order btn-update" >Sửa</button>
        </div>
        <!--     -->

        <?php
        include('../../connect.php');
        $token = $_COOKIE['remember'];
        $sql = "select * from admin
                            where token = '$token'";
        $print = mysqli_query($connect,$sql);
        $profile = mysqli_fetch_array($print);
        $id = $profile['id'];
        ?>

        <!--    -->
        <table class="table_profile">
            <p>Hồ sơ cá nhân</p>
            <tr>
                <td style="width:30%; height: 30px">
                    Tên của bạn
                </td>
                <td>
                    <?php echo $profile['name'] ?>
                </td>
            </tr>
            <tr>
                <td style="width:30%; height: 30px">
                    Ngày sinh
                </td>
                <td>
                    <?php
                    $date=date_create($profile['birthday']);
                    echo date_format($date," d-m-Y ")  ?>
                </td>
            </tr>
            <tr>
                <td style="width:30%; height: 30px">
                    Giới tính
                </td>
                <td>
                    <?php echo $profile['gender'] ?>
                </td>
            </tr>
            <tr>
                <td style="width:30%; height: 30px">
                    Số điện thoại
                </td>
                <td>
                    <?php echo $profile['number_phone'] ?>
                </td>
            </tr>
            <tr>
                <td style="width:30%; height: 30px">
                    Địa chỉ
                </td>
                <td>
                    <?php echo $profile['adress'] ?>
                </td>
            </tr>
            <tr>
                <td style="width:30%; height: 30px">
                    Email
                </td>
                <td>
                    <?php echo $profile['email'] ?>
                </td>
            </tr>

        </table>
    </div>
</div>
    <div class="update">

        <div class="form_update_profile">
            <button class="btn_close  js_close" >X</button>
            <form action="update_profile.php" method="post">
                <table>
                    <p>>Bạn muốn thay đổi hồ sơ của mình à?<</p>
                    <tr>
                        <td>
                            <input type="hidden" value="<?php echo $id ?>" name="id" >
                        </td>
                    </tr>
                    <tr>
                        <td style="width: 30%; height:50px" >
                            Tên của bạn
                        </td>
                        <td>
                            <input type="text" name="name" value=" <?php echo $profile['name'] ?>">
                        </td>
                    </tr>
                    <tr>
                        <td style="width: 30%; height:50px">
                            Ngày sinh
                        </td>
                        <td>
                            <input type="date" name="birthday" value=" <?php echo $profile['birthday'] ?>">
                        </td>
                    </tr>
                    <tr>
                        <td style="width: 30%; height:50px">
                            Giới tính
                        </td>
                        <td>
                            <input type="radio" name="gender" value="Nam" checked>Nam
                            <input type="radio" name="gender" value="Nữ" >Nữ
                        </td>
                    </tr>
                    <tr>
                        <td style="width: 30%; height:50px">
                            Số điện thoại
                        </td>
                        <td>
                            <input type="number" name="number_phone" value=" <?php echo $profile['number_phone'] ?>">
                        </td>
                    </tr>
                    <tr>
                        <td style="width: 30%; height:50px">
                            Địa chỉ
                        </td>
                        <td>
                            <input type="text" name="adress" value=" <?php echo $profile['adress'] ?>">
                        </td>
                    </tr>
                    <tr>
                        <td style="width: 30%; height:50px">
                            Email
                        </td>
                        <td>
                            <input type="email" name="email" value="<?php echo $profile['email'] ?>">
                        </td>
                    </tr>
                    <tr>
                        <td style="width: 30%; height:50px">
                            Mật khẩu
                        </td>
                        <td>
                            <input type="password" name="password">
                        </td>

                    </tr>

                </table>
                <button>Cập nhật</button>
            </form>

        </div>
</div>

<div class="bill_history">
    <?php
        $id = $_SESSION['id'];
    $connect = mysqli_connect('localhost','root','0000','project_web_1',3306);
    mysqli_set_charset($connect,'utf8');
    $sql = "SELECT
             admin.id,
             admin.name,
             SUM(if(DATE(time) = CURDATE(), 1, 0)) as 'today',
             SUM(if(DATE(time) >= CURDATE() - INTERVAL 30 DAY, 1, 0)) as '30_days',
             count(*) as tong
             from admin
             LEFT join bill
             on (
                 admin.id = bill.id_admin
                 and bill.id_status > 1
             )
             where 
             admin.id = '$id'
             group by admin.id";
    $result = mysqli_query($connect, $sql);
    $each = mysqli_fetch_array($result);
    ?>
    <div class="review" style="top: 20%; left: 25%">
    <h1>Hôm nay đã duyệt</h1>
        <span><?php echo $each['today'] ?> Đơn</span>
    </div>
    <div class="review"
         style="top: 20%; left: 65%">
    <h1>Tháng này đã duyệt</h1>

                <?php if($each['30_days']> 1350){ ?>
        <span style="color:red"><?php echo $each['30_days'] ?> Đơn</span>
                    <br>
                    <h3>{ Đã đạt KPi: 1350 Đơn}</h3>
                <?php } else { ?>
        <span style="color:red"><?php echo $each['30_days'] ?> Đơn</span>
                    <br>

                    <h3>  { Chưa đạt KPI: 1350 Đơn }</h3>
                <?php } ?>

    </div>
</div>