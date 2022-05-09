<?php session_start() ?>
<!DOCTYPE html>
<html lang="en">
<?php include('../../head.php') ?>
<body>
   
    <?php include('../../header.php') ?>
   
    
    <!-- phần bài đăng -->
    <div id="container" >
 <?php include('../../menu.php') ?>
 <div style="position: fixed; left: 3%;bottom:0;">
       <?php include '../../footer.php'  ?>
 </div>
                 
        </div>
         <?php if(empty($_SESSION['cart'])){ 
     $null = 'Bạn chưa thêm sản phẩm nào vào trong giỏ hàng';
          ?>
      <div class="null">
         <p> <?php echo $null ?></p>
      </div>
       
       <?php
    }else{   
    $cart = $_SESSION['cart'];
    $sum = 0
    ?>
        <div class="box_product">
            <div class="list_cart">
               
            <table >
                <tr>
                    <th style="width: 20%;"></th>
                    <th style="width: 40%;">Tên</th>
                    <th style="width: 10%;">Giá</th>
                    <th style="width: 10%;">Số lượng</th>
                    <th style="width: 10%;">Tổng tiền</th>
                    <th style="width: 10%;">xóa</th>
                </tr>
                <?php foreach ( $cart as $id => $each): ?>
                  
                   
                <tr>
                    <td><img height="200" width="180" src="<?php echo $each['images'] ?>" alt="qq"></td>
                    <td><p style="font-size: 2em;top: 0"> <?php echo $each['name'] ?></p></td>
                    <td><?php if(empty($_SESSION['cart'][$id]['price_sale']) ){ ?>
            <p> <?php  echo number_format( $each['price'] , 0, '', ',') ?> đ</p>
            <?php } ?>
            <?php if(!empty($_SESSION['cart'][$id]['price_sale']) ){ ?>
            <p><span style="text-decoration: line-through;color: red;"><?php  echo number_format( $each['price'] , 0, '', ',') ?> đ</span>
                    <span><?php  echo number_format( $each['price_sale'] , 0, '', ',') ?> đ</span>
                    </p>
            <?php } ?>
            
                    </td>
                    <td>
                    <button onclick="location.href='update_quantity.php?id=<?php echo $id ?>&type=decre'">-</button>
                     <?php echo $each['quantity'] ?>
                    <button onclick="location.href='update_quantity.php?id=<?php echo $id ?>&type=incre'">+</button>
                    </td>
                    <td> 
                        <?php if(empty($_SESSION['cart'][$id]['price_sale'])){ ?>
                        <?php $result = $each['price'] * $each['quantity'];
                                $sum += $result;
                                echo number_format( $result, 0, '', ',');
                        ?>đ
                        <?php } ?>
                        <?php if(!empty($_SESSION['cart'][$id]['price_sale'])){ ?>
                        <?php $result = $each['price_sale'] * $each['quantity'] ;
                                $sum += $result;
                                echo number_format( $result, 0, '', ',');
                        ?>đ
                        <?php } ?>
                    </td>
                    <td><a href="delete_cart_product.php?id=<?php echo $id ?>">Xóa</a></td>
                </tr>
                <?php endforeach ?> 
                
            </table>
    <?php }  ?>
            </div> 
    <?php if(!empty($_SESSION['cart'])){ ?>
            <div class="num_in_cart">
                <p> Số sản phẩm trong giỏ hàng: 
                    <?php
                     $num = count($_SESSION['cart']);
                            echo $num ;               
                    ?>
                    
                </p>
                    
            </div>
            <div class="um_in_cart">
                <p> Tổng tiền: 
                    <?php
                     echo number_format( $sum, 0, '', ',');    
                    ?> đ
                    
                </p>
                <button class="btn_order">Đặt Hàng</button>
                    
            </div>
    <?php } ?>
        </div>
        
            <div class="order">
                
                <div class="form_order">
                
                <button class="btn_close js_close">X</button>
                <?php
                 $id =$_SESSION['id'];
                 require '../../connect.php';
                 $sql = "select * from customer 
                 where id = '$id'";

                 $result = mysqli_query($connect,$sql);
                 $each = mysqli_fetch_array($result)
                 
                 
                 ?>
                <form action="order.php" method="post">
                        <table  cellpadding ="5" align = "center">
                            <?php if(isset($_GET['erorr'])){
                                echo $_GET['erorr'];
                            } ?>
                            <tr>
                                <th colspan = "2"> ĐẶT HÀNG </th>
                            </tr>
                           
                            <tr>
                                <td>Số điện thoại người nhận</td>
                                <td>
                                    <input type="number" name="number_phone" size="30" value="<?php echo $each['number_phone'] ?>">
                                </td>
                            </tr>
                            <tr>
                                <td>Địa chỉ người nhận</td>
                                <td>
                                    <input type="text" name="adress" value="<?php echo $each['adress'] ?>" >
                                </td>
                            </tr>
                            <tr>
                                <td>Notes</td>
                                <td>
                                    <textarea name="notes" id="" cols="30" rows="10"></textarea>
                                </td>
                            </tr>
                            <tr>
                                <td colspan = "2" align="center">
                                    &nbsp;
                                    <button class="btn_order" >Đặt Hàng</button>
                                    <br>
                                   
                                </td>
                            </tr>
                
                        </table>
                        <?php mysqli_close($connect) ?>
                </form>
                
                </div>  
                        </div>
    </div>          
</body>
</html>