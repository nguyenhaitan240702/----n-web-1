
    <div id="container" >
<?php include 'menu.php' ?>

<div class="search_bar">
    <form action="">
                <input type="search" name="search" id="search">
                <i class="icon_search ti-search"></i>
    </form>
            </div>


<div class="box_2">
    <?php 
        include('connect.php');

        $category = "select * from category ";

        $print_category = mysqli_query($connect,$category);
        
   $page = 1;
   if(isset($_GET['page'])){
       $page = $_GET['page'];
       
       }
   $search = '';
   if(isset($_GET['search'])){
   $search = $_GET['search'];
  }
   $id_category = '';
   if(isset($_GET['id_category'])){
    $id_category = $_GET['id_category'];
   }
 
   $sql_product = "select count(*)from products
   where
   name like '%$search%'";
   $mang_product = mysqli_query($connect,$sql_product);
    $product = mysqli_fetch_array($mang_product)['count(*)'];

   $sql_product = "select count(*)from products
   where
   id_category like '%$id_category%'";
   $mang_product_de = mysqli_query($connect,$sql_product);
    $product_de = mysqli_fetch_array($mang_product_de)['count(*)'];

    $product_on_page = 30 ;
    if(empty($id_category)){
        $so_page = ceil($product / $product_on_page);
    }else{
        $so_page = ceil($product_de / $product_on_page);
    }

    $skip = $product_on_page * ($page - 1);

   $sql = "select * from products
   where
   name like '%$search%'and id_category like '%$id_category%'
   limit $product_on_page offset $skip" ;
   
   $result = mysqli_query($connect,$sql);
   $eachh = mysqli_fetch_array($result);
       

     
    ?>

    <?php foreach($print_category as $each){ ?>
    <div class="category">

        <a href="http://localhost/----n-web-1/----n-web-1/index.php?id_category=<?php echo $each['id']  ?>">
        <?php echo $each['name']  ?>
        </a>

    </div>
    <?php } ?>

</div>
<?php include('footer.php') ?>

</div>
 <div class="box_3">
     <?php if($eachh == null){ ?>
         <div class="null">
             <h2>Rất tiếc! </h2>
             <h2>Không có sản phẩm này! </h2>
         </div>
     <?php } ?>
        <?php foreach($result as $eachh){ ?>
     <div class="product">
         <a href="http://localhost/----n-web-1/----n-web-1/main/product/index.php?id=<?php echo $eachh['id'] ?>">
             
            <img  src="main/manager/images/<?php echo $eachh['images'] ?>" alt="chắc ảnh lỗi rồi không sao cứ mua đi" class="img_product">
            <h2><?php echo $eachh['name'] ?></h2>
            <?php if($eachh['id_status'] == 1){ ?>
            <p>Giá: <?php  echo number_format( $eachh['price'] , 0, '', ',') ?> đ</p>
            <?php } ?>
            <?php if($eachh['id_status'] == 2){ ?>
            <p>Giá: <span style="text-decoration: line-through;color: red;"><?php  echo number_format( $eachh['price'] , 0, '', ',') ?> đ</span>
                    <span><?php  echo number_format( $eachh['price'] * 0.8 , 0, '', ',') ?> đ</span>
                    <br>
                    <span style="color: red;font-size:1.2em;">SALE 20%</span> </p>
            <?php } ?>
            <?php if($eachh['id_status'] == 3){ ?>
            <p>Giá: <span style="text-decoration: line-through;color: red;"><?php  echo number_format( $eachh['price'] , 0, '', ',') ?> đ</span>
                    <span><?php  echo number_format( $eachh['price'] * 0.5 , 0, '', ',') ?> đ</span>
                    <br>
                    <span style="color: red;font-size:1.2em;">SALE 50%</span></p>
            <?php } ?>

         </a>
     </div>

            <?php } ?>

            <div class="page">
     <?php
     if($so_page > 4){
        if($page < $so_page -4){
     ?>

            <?php if($page > 2){ ?>
                <a href="?page=1&search=<?php echo $search ?>&id_category=<?php echo $id_category?>">
                <?php echo 1 ?>
                    </a>
                <span>...</span>
            <?php } ?>
            <?php if($page == 2){ ?>
                <a href="?page=1&search=<?php echo $search ?>&id_category=<?php echo $id_category?>">
                    <?php echo 1 ?>
                </a>
            <?php } ?>

            <?php for($i = $page ; $i <= $page + 4 ; $i++){?>

            <a href="?page=<?php echo $i ?>&search=<?php echo $search ?>&id_category=<?php echo $id_category?>">
            <?php echo $i ?>
                </a>
                <?php } ?>
                <span>...</span>
                <a href="?page= <?php echo $so_page ?>&search=<?php echo $search ?>&id_category=<?php echo $id_category?>">
                <?php echo $so_page ?>
                </a>
            <?php }else{ ?>
                <?php if($page > 2){ ?>

                <a href="?page=1&search=<?php echo $search ?>&id_category=<?php echo $id_category?>">
                <?php echo 1 ?>
                    </a>
                <span>...</span>
                <?php } ?>

            <?php for($i = $so_page - 4 ; $i <= $so_page ; $i++){?>

                <a href="?page=<?php echo $i ?>&search=<?php echo $search ?>&id_category=<?php echo $id_category?>">
                <?php echo $i ?>
                </a>


            <?php }
        }
     }else{ ?>
         <?php for($i = 1 ; $i <= $so_page ; $i++){?>

             <a href="?page=<?php echo $i ?>&search=<?php echo $search ?>&id_category=<?php echo $id_category?>">
                 <?php echo $i ?>
             </a>
         <?php } ?>
     <?php } ?>
            </div>

           
 </div>
 
</div>        

           <?php include('form.php') ?>