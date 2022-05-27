
    <!-- phần đầu -->
    <div id="header">

        <div class="menu_top">

            <div class="home">
                <caption>
                <a href="http://localhost/----n-web-1/----n-web-1/index.php">
                        SugarBaby
                </a>
            </caption>
            </div>

            
            <div class="account">
                <?php if(empty($_SESSION['id'])){ ?>
                <button class="outline btn-sign-in" >Đăng nhập</button>
                |
                <button class="outline btn-sign-up" >Đăng ký</button>
                    <?php  }else{ ?>
                <a style=" color :red;" href="http://localhost/----n-web-1/----n-web-1/sign_out.php">Đăng xuất</a>
                |
                   <?php if(empty($_SESSION['level'])){ ?>
                        <a href="http://localhost/----n-web-1/----n-web-1/main/customer/profile.php">
                            <?php echo $_SESSION['name'] ?>
                            <i class="ti-user profile_icon"></i>
                        </a>
                        <br>
                        <a href="http://localhost/----n-web-1/----n-web-1/main/product/cart.php">
                            Giỏ hàng
                            <i class="ti-shopping-cart-full profile_icon"></i>
                        </a>
                    <?php }else{ ?>
                            <?php if($_SESSION['level'] == 1 ){ ?>
                            <a href="http://localhost/----n-web-1/----n-web-1/main/manager/admin.php?statistical=profile">
                                <?php echo $_SESSION['name'] ?>
                                <i class="ti-user profile_icon"></i>
                            </a>
                             <?php }else{ ?>
                               <a href="#">
                                   <?php echo $_SESSION['name'] ?>
                                   <i class="ti-user profile_icon"></i>
                               </a>
                            <?php } ?>
                    <?php } ?>
                <?php } ?>
            </div>
        </div>

        </div>

    </div>
