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
                $sql = "select * from customer
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
                  <input type="radio" name="gender" checked>Nam
                  <input type="radio" name="gender" >Nữ
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
        <h1>LỊCH SỬ MUA HÀNG</h1>
          <?php 
             $sql = "select bill.*, status_bill.name as status_name from bill 
             join status_bill on bill.id_status = status_bill.id             
             where id_customer = '$id' and id_status = 1
             order by id desc";
             $result = mysqli_query($connect,$sql);
             $billl = mysqli_fetch_array($result);
       
        ?>
        <div class="bill_waitting"> 
            <p>Đơn hàng đang chờ</p>
              <?php if(empty($billl)){ ?>
                <div class="bill_summary">
                     <span style="line-height: 50px;font-size:1.5em;">! Không có đơn hàng nào đang chờ</span>
                </div>
                <?php }else{ ?>
                   
                    <table>
                    <tr>
                            <th style="width:4% ;"></th>
                            <th style="width:25% ;">Thời gian đặt</th>
                            <th style="width: 15%;">Tổng tiền</th>
                            <th style="width: 56%;">
                        </th>
                            

                        </tr>
                    </table>
                <?php foreach($result as $each): ?>
        <div class="div-bill">
            <div class="bill_summary">
                    <table>
                        
                        <tr>
                           
                            <td style="width:10%;"></td>
                            <td style="width: 20%;"><?php 
                            $date=date_create($each['time']);
                            echo date_format($date,"H:i:s  d-m-Y ")
                            ?></td>
                            <td style="width: 20%;"><?php echo number_format(  $each['total_price'] , 0, '', ',') ?> đ</td>
                            <td style="width: 40%;">
                                <button class="btn_detail_open" >Chi tiết</button>
                                <button class="btn_detail_close" >Đóng</button></td>       
                            <td style="width:10% ;"><a href="drop_bill.php?id=<?php echo $each['id'] ?>">Hủy</a></td>
                        </tr>
                    </table>
                        </div> 
                         <?php

                        $id_bill = $each['id'];
                                    $sqll = "select bill_detail.*,products.* from bill_detail
                                    join products on bill_detail.id_product = products.id
                                    where id_bill = '$id_bill'";
                                    $resultt = mysqli_query($connect,$sqll);
                                    
                        ?>
                                 
                            <?php foreach($resultt as $eachh):?>

                                <?php if($eachh['id_status'] == 1){
                                    $price = $eachh['price'];
                                }
                                if($eachh['id_status'] == 2){
                                $price = $eachh['price'] * 0.8;
                                }
                                if($eachh['id_status'] == 3){
                                    $price = $eachh['price'] * 0.5;
                                } ?> 
                           
                        <div class="bill_detail <?php echo $id_bill ?>">
                                <table>
                                    <tr>
                                        <td style="width:10% ;"><img height="80" width="60" style="border-radius: 8px" src="<?php echo $eachh['images'] ?>" alt="qq"></td>
                                        <td style="width: 50%;"><p style="font-size: 1.2em;top: 0"> <?php echo $eachh['name'] ?></p></td>
                                        <td style="width:20% ;">Số lượng: <span style="font-style: 1.2em; color:red"><?php echo $eachh['quantity'] ?></span></td>
                                        <td style="width: 20%;"><?php echo number_format(  $price * $eachh['quantity']  , 0, '', ',') ?> đ</td>
                                    </tr>
                                </table>
                        </div>
           
                            <?php endforeach ?>
 </div>
                                <?php endforeach ?>
                    
            <?php } ?>
        </div>
          
          <?php 
             $sql = "select bill.*, status_bill.name as status_name from bill 
             join status_bill on bill.id_status = status_bill.id
             where id_customer = '$id' and id_status = 2";
             $result = mysqli_query($connect,$sql);
             $billl = mysqli_fetch_array($result);
       
        ?>
        <div class="bill_waitting">
        <p>Đơn hàng đang giao</p>
              <?php if(empty($billl)){ ?>
                <div class="bill_summary">
                     <span style="line-height: 50px;font-size:1.5em;">! Không có đơn hàng nào đang giao</span>
                </div>
                <?php }else{ ?>
                   
                    <table>
                    <tr>
                            <th style="width:4% ;"></th>
                            <th style="width:25% ;">Thời gian đặt</th>
                            <th style="width: 15%;">Tổng tiền</th>
                            <th style="width: 56%;">
                        </th>
                            

                        </tr>
                    </table>
                <?php foreach($result as $each): ?>
                        <div class="div-bill">
                            <div class="bill_summary">
                                    <table>
                                        
                                        <tr>
                                        
                                            <td style="width:10%;"></td>
                                            <td style="width: 20%;"><?php 
                                            $date=date_create($each['time']);
                                            echo date_format($date,"H:i:s  d-m-Y ")
                                            ?></td>
                                            <td style="width: 20%;"><?php echo number_format(  $each['total_price'] , 0, '', ',') ?> đ</td>
                                            <td style="width: 40%;">
                                            <button class="btn_detail-ship_open" >Chi tiết</button>  
                                            <button class="btn_detail-ship_close" >Đóng</button></td>       
                                            <td style="width:10% ;"><a href="drop_bill.php?id=<?php echo $each['id'] ?>">Hủy</a></td>
                                        </tr>
                                    </table>
                                        </div> 
                                        <?php

                                        $id_bill = $each['id'];
                                                    $sqll = "select bill_detail.*,products.* from bill_detail
                                                    join products on bill_detail.id_product = products.id
                                                    where id_bill = '$id_bill'";
                                                    $resultt = mysqli_query($connect,$sqll);
                                                    
                                        ?>
                                                
                                            <?php foreach($resultt as $eachh):?>

                                                <?php if($eachh['id_status'] == 1){
                                                    $price = $eachh['price'];
                                                }
                                                if($eachh['id_status'] == 2){
                                                $price = $eachh['price'] * 0.8;
                                                }
                                                if($eachh['id_status'] == 3){
                                                    $price = $eachh['price'] * 0.5;
                                                } ?> 
                                        
                                        <div class="bill_detail-ship <?php echo $id_bill ?>">
                                                <table>
                                                    <tr>
                                                        <td style="width:10% ;"><img height="80" width="60" style="border-radius: 8px" src="<?php echo $eachh['images'] ?>" alt="qq"></td>
                                                        <td style="width: 50%;"><p style="font-size: 1.2em;top: 0"> <?php echo $eachh['name'] ?></p></td>
                                                        <td style="width:20% ;">Số lượng: <span style="font-style: 1.2em; color:red"><?php echo $eachh['quantity'] ?></span></td>
                                                        <td style="width: 20%;"><?php echo number_format(  $price * $eachh['quantity']  , 0, '', ',') ?> đ</td>
                                                    </tr>
                                                </table>
                                        </div>
                                                
                                            <?php endforeach ?>
                        </div>
                                <?php endforeach ?>
                    
            <?php } ?>
        </div>
          
          <?php 
             $sql = "select bill.*, status_bill.name as status_name from bill 
             join status_bill on bill.id_status = status_bill.id
             where id_customer = '$id' and id_status = 3";
             $result = mysqli_query($connect,$sql);
             $billl = mysqli_fetch_array($result);
            $sum = 0;                                      
        ?>
        <div class="bill_waitting">
        <p>Đơn hàng đã hoàn tất</p>
              <?php if(empty($billl)){ ?>
                <div class="bill_summary">
                     <span style="line-height: 50px;font-size:1.5em;">! Không có đơn hàng nào đã hoàn tất</span>
                </div>
                <?php }else{ ?>
                   
                    <table>
                    <tr>
                            <th style="width:4% ;"></th>
                            <th style="width:25% ;">Thời gian đặt</th>
                            <th style="width: 15%;">Tổng tiền</th>
                            <th style="width: 56%;"></th>
                            

                        </tr>
                    </table>
                <?php foreach($result as $each): ?>
                        <div class="div-bill">                
                            <div class="bill_summary">
                                    <table>
                                        
                                        <tr>
                                        
                                            <td style="width:10%;"></td>
                                            <td style="width: 20%;"><?php 
                                            $date=date_create($each['time']);
                                            echo date_format($date,"H:i:s  d-m-Y ")
                                            ?></td>
                                            <td style="width: 20%;"><?php echo number_format(  $each['total_price'] , 0, '', ',') ?> đ</td>
                                            <td style="width: 40%;">
                                            <button class="btn_detail-ok_open">Chi tiết</button>                                                 
                                            <button class="btn_detail-ok_close" >Đóng</button>
                                            </td> 
                                            <td style="width:10% ;"></td>
                                        </tr>
                                    </table>
                                        </div> 
                                        <?php

                                        $id_bill = $each['id'];
                                                    $sqll = "select bill_detail.*,products.* from bill_detail
                                                    join products on bill_detail.id_product = products.id
                                                    where id_bill = '$id_bill'";
                                                    $resultt = mysqli_query($connect,$sqll);
                                                    $sum += $each['total_price'];
                                        ?>
                                                
                                            <?php foreach($resultt as $eachh):?>

                                                <?php if($eachh['id_status'] == 1){
                                                    $price = $eachh['price'];
                                                }
                                                if($eachh['id_status'] == 2){
                                                $price = $eachh['price'] * 0.8;
                                                }
                                                if($eachh['id_status'] == 3){
                                                    $price = $eachh['price'] * 0.5;
                                                } ?> 
                                        
                                        <div class="bill_detail-ok <?php echo $id_bill ?>">
                                                <table>
                                                    <tr>
                                                        <td style="width:10% ;"><img height="80" width="60" style="border-radius: 8px" src="<?php echo $eachh['images'] ?>" alt="qq"></td>
                                                        <td style="width: 50%;"><p style="font-size: 1.2em;top: 0"> <?php echo $eachh['name'] ?></p></td>
                                                        <td style="width:20% ;">Số lượng: <span style="font-style: 1.2em; color:red"><?php echo $eachh['quantity'] ?></span></td>
                                                        <td style="width: 20%;"><?php echo number_format(  $price * $eachh['quantity']  , 0, '', ',') ?> đ</td>
                                                    </tr>
                                                </table>
                                        </div>
                                                
                                            <?php endforeach ?>
                        </div>
                                <?php endforeach ?>
                    
            <?php } ?>
        </div>
          
          <?php 
             $sql = "select bill.*, status_bill.name as status_name from bill 
             join status_bill on bill.id_status = status_bill.id
             where id_customer = '$id' and id_status = 4";
             $result = mysqli_query($connect,$sql);
             $billl = mysqli_fetch_array($result);
       
        ?>
        <div class="bill_waitting">
        <p>Đơn hàng đã hủy</p>
              <?php if(empty($billl)){ ?>
                <div class="bill_summary">
                     <span style="line-height: 50px;font-size:1.5em;">! Không có đơn hàng nào đã hủy</span>
                </div>
                <?php }else{ ?>
                   
                    <table>
                    <tr>
                            <th style="width:4% ;"></th>
                            <th style="width:25% ;">Thời gian đặt</th>
                            <th style="width: 15%;">Tổng tiền</th>
                            <th style="width: 56%;">
                        </th>
                            

                        </tr>
                    </table>
                <?php foreach($result as $each): ?>
                        <div class="div-bill">
                            <div class="bill_summary">
                                    <table>
                                        
                                        <tr>
                                        
                                            <td style="width:10%;"></td>
                                            <td style="width: 20%;"><?php 
                                            $date=date_create($each['time']);
                                            echo date_format($date,"H:i:s  d-m-Y ")
                                            ?></td>
                                            <td style="width: 20%;"><?php echo number_format(  $each['total_price'] , 0, '', ',') ?> đ</td>
                                            <td style="width: 40%;">
                                            <button class="btn_detail-ko_open" >Chi tiết</button>                                                
                                            <button class="btn_detail-ko_close">Đóng</button></td>       
                                            <td style="width:10% ;"><a href="backup-bill.php?id=<?php echo $each['id'] ?>">Đặt lại</a></td>
                                        </tr>
                                    </table>
                                        </div> 
                                        <?php

                                        $id_bill = $each['id'];
                                                    $sqll = "select bill_detail.*,products.* from bill_detail
                                                    join products on bill_detail.id_product = products.id
                                                    where id_bill = '$id_bill'";
                                                    $resultt = mysqli_query($connect,$sqll);
                                                    
                                        ?>
                                                
                                            <?php foreach($resultt as $eachh):?>

                                                <?php if($eachh['id_status'] == 1){
                                                    $price = $eachh['price'];
                                                }
                                                if($eachh['id_status'] == 2){
                                                $price = $eachh['price'] * 0.8;
                                                }
                                                if($eachh['id_status'] == 3){
                                                    $price = $eachh['price'] * 0.5;
                                                } ?> 
                                        
                                        <div class="bill_detail-ko <?php echo $id_bill ?>">
                                                <table>
                                                    <tr>
                                                        <td style="width:10% ;"><img height="80" width="60" style="border-radius: 8px" src="<?php echo $eachh['images'] ?>" alt="qq"></td>
                                                        <td style="width: 50%;"><p style="font-size: 1.2em;top: 0"> <?php echo $eachh['name'] ?></p></td>
                                                        <td style="width:20% ;">Số lượng: <span style="font-style: 1.2em; color:red"><?php echo $eachh['quantity'] ?></span></td>
                                                        <td style="width: 20%;"><?php echo number_format(  $price * $eachh['quantity']  , 0, '', ',') ?> đ</td>
                                                    </tr>
                                                </table>
                                        </div>
                                                
                                            <?php endforeach ?>
                        </div>
                                <?php endforeach ?>
                    
            <?php } ?>
        </div>
          <div class="box-drop-money">
            <span >Bạn đã làm rơi: <?php echo number_format(  $sum , 0, '', ',') ?> đ</span>
        </div>
    </div>
   
    </div>
     <?php mysqli_close($connect) ?>
</body>
</html>