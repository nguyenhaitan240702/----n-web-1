
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
                <a href="http://localhost/----n-web-1/----n-web-1/main/customer/profile.php">
                    <?php echo $_SESSION['name'] ?>
                    <i class="ti-user profile_icon"></i>
                </a>
                <br>
                    <?php if(empty($_SESSION['level'])){ ?>
                    <a href="http://localhost/----n-web-1/----n-web-1/main/product/cart.php">
                        Giỏ hàng
                        <i class="ti-shopping-cart-full profile_icon"></i>
                    </a>
                    <?php }else{ ?>
                        <a href="http://localhost/----n-web-1/----n-web-1/main/product/cart.php">
                        Quản lý
                        <i class="fa-solid fa-gear profile_icon"></i>
                    </a>
                    <?php } ?>
                <?php } ?>
            </div>
        </div>

        </div>

    </div>
