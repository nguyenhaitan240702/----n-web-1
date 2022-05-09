<?php session_start() ?>
<!DOCTYPE html>
<html lang="en">
<?php include('../../head.php') ?>
<body>
    <?php include('../../header.php') ?>
   
    
    <!-- phần bài đăng -->
    <div id="container" >
 <?php include('../../menu.php') ?>

 <div class="search_bar">
                <input type="search" name="search" id="search">
                <i class="icon_search ti-search"></i>
            </div>


<div class="box_2">
    <?php 
        include('../../connect.php');

        $category = "select * from category ";

        $print_category = mysqli_query($connect,$category);
        $id = $_GET['id'];
       
        $product = "select products.*, category.name as name_category, manufacturers.name as name_manufacture from products
        join category on category.id = products.id_category 
        join manufacturers on manufacturers.id = products.id_manufacture
         WHERE products.id = '$id'";

        $print_product = mysqli_query($connect,$product);
        $print = mysqli_fetch_array($print_product);
    ?>
    <?php if(empty($print)){ ?>
        <div class="null">
            <h2>Làm gì có sản phẩm này! Bạn kiếm đâu ra vậy!!?</h2>
        </div>
    <?php }else{ ?>    

    <?php foreach($print_category as $each){ ?>
    <div class="category">

    <a href="http://localhost/----n-web-1/----n-web-1/index.php?id_category=<?php echo $each['id']  ?>">
        <?php echo $each['name']  ?>
        </a>

    </div>
    <?php } ?>

</div>
<?php include('../../footer.php') ?>

        </div>
        <div class="box_product">
           <div class="img_product" >
                <img style="height: 500px; width: 400px" src="<?php echo $print['images'] ?>" alt="chắc ảnh lỗi rồi không sao cứ mua đi">
                <?php if($print['id_status'] == 1){ ?>
            <p class="price-product-index" style="font-size: 2.5em;">Giá: <?php  echo number_format( $print['price'] , 0, '', ',') ?> đ</p>
            <?php } ?>
            <?php if($print['id_status'] == 2){ ?>
            <p class="price-product-index" style="font-size: 2.5em;">Giá: <span style="text-decoration: line-through;color: red;"><?php  echo number_format( $print['price'] , 0, '', ',') ?> đ</span>
                    <br>
                    <span>    <?php  echo number_format( $print['price'] * 0.8 , 0, '', ',') ?> đ</span>
                    <br>
                    <span style="color: red;font-size:1.2em;">SALE 20%</span> </p>
            <?php } ?>
            <?php if($print['id_status'] == 3){ ?>
            <p class="price-product-index" style="font-size: 2.5em;">Giá: <span style="text-decoration: line-through;color: red;"><?php  echo number_format( $print['price'] , 0, '', ',') ?> đ</span>
                    <br>
                    <span>    <?php  echo number_format( $print['price'] * 0.5 , 0, '', ',') ?> đ</span>
                    <br>
                    <span style="color: red;font-size:1.2em;">SALE 50%</span></p>
            <?php } ?>
                
                <br>    
                <?php if(!empty($_SESSION['id'])){ ?>
                <div class="add_to_cart">
                        
                    <button onclick="location.href='add_to_cart.php?id=<?php echo $print['id'] ?>'">Thêm vào giỏ hàng</button>
                </div>
                <?php } ?>
           </div>
            
                <h1><?php echo $print['name'] ?></h1>
                <br>

            <div class="description">
                <p><?php echo $print['description'] ?></p>
            </div>
            
            <?php 
            $id_product = $_GET['id'];
            $sql = "select rating.*, customer.name from rating
            join customer on customer.id = rating.id_customer
            where id_product = '$id_product'";
            $result = mysqli_query($connect,$sql);


            ?>

            <div class="review">

            </div>

            <div class="under">

                    <?php foreach( $result as $each): ?>
                <div class="review-rating">
                   <span class="name-rating"><?php echo $each['name'] ?></span>
                   <?php if($each['rating'] == 5){  ?>
                    <img height="30" src="data:image/png;base64,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" >
                    <?php } ?>
                   <?php if($each['rating'] == 4){  ?>
                    <img height="30" src="data:image/jpeg;base64,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" >
                    <?php } ?>
                   <?php if($each['rating'] == 3){  ?>
                    <img height="30" src="data:image/jpeg;base64,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" >
                    <?php } ?>
                   <?php if($each['rating'] == 2){  ?>
                    <img height="30" src="data:image/png;base64,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" >
                    <?php } ?>
                   <?php if($each['rating'] == 1){  ?>
                    <img height="30" src="https://image.shutterstock.com/image-vector/one-stars-icon-vector-600w-1316819483.jpg" >
                    <?php } ?>
                    <br>
                    <span><?php echo $each['content'] ?></span>
                   <br><br>
                   <span class="time-rating"><?php  $date=date_create($each['time']); echo date_format($date,"H:i:s  d-m-Y ") ?> </span>
                      
                </div>
                    <?php endforeach ?>
                    <?php if(!empty($_SESSION['id'])){ ?>
                <button type="button" class="btn_order btn-open-rating" >Đánh giá</button>
                    <?php } ?>
            </div>
            
          
        </div>
        <?php } ?>
            <div class="rating ">
                    <div class="form_rating">
            <button class="btn_close js_close" >X</button>
                        <form action="rating.php" method="post"> 
                            <table>
                            <input type="text" name="id_product" value="<?php echo $id ?>">

                                
                                        <tr>
                                        <td colspan = "2" align="center">
                                              <textarea name="content" style="border-radius: 10px;" cols="80" rows="5"></textarea>
                                        </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                Đánh giá: 
                                            </td>
                                            <td>
                                                
                                    <input type="checkbox" name="star" id="st1" value="5" >
                                    <label for="st1"></label>
                                    <input type="checkbox" name="star" id="st2" value="4" >
                                    <label for="st2"></label>
                                    <input type="checkbox" name="star" id="st3" value="3" >
                                    <label for="st3"></label>
                                    <input type="checkbox" name="star" id="st4" value="2" >
                                    <label for="st4"></label>
                                    <input type="checkbox" name="star" id="st5" value="1" >
                                    <label for="st5"></label>

                                            </td>
                                        </tr>
                                    </table>
                               
                               
                                    <button style="border-radius: 10px;" class=" btn-rating" >Đánh giá</button>
                        </form>
                    </div>
  <?php mysqli_close($connect) ?>
            </div>
    </div>        
    <?php include('../../form.php') ?>  
</body>
</html>
