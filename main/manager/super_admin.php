<?php session_start() ?>

<!DOCTYPE html>
<html lang="en">
<?php include('../../head.php') ?>
<body>
    
    <!-- phần menu -->

    <?php include('../../header.php') ?>
   
    <!-- phần bài đăng -->
   
    <?php include('container.php') ?>
        <div class="box_2">
            <div class="category">
                <a href="?">Doanh số</a>
            </div>
            <div class="category">
                <a href="?statistical=1">Admin</a>
            </div>
            <div class="category">
                <a href="?statistical=2">Customers</a>
            </div>
            <div class="category">
                <a href="?statistical=3">Products</a>
            </div>
            <div class="category">
                <a href="?statistical=4">Manufacturers</a>
            </div>

         </div>
    </div>

    <div class="bill_history">
      <?php if (empty($_GET['statistical'])){
          include('turnover.php');
      } ?>
        <?php if (isset($_GET['statistical'])){ ?>

            <?php if ($_GET['statistical'] == 1){ ?>

            <?php } ?>

            <?php if ($_GET['statistical'] == 2){ ?>

            <?php } ?>

            <?php if ($_GET['statistical'] == 3){ ?>

            <?php } ?>
            
            <?php if ($_GET['statistical'] == 4 ){ ?>

            <?php } ?>

        <?php } ?>
    </div>
</body>
</html>
    