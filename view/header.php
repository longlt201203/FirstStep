<body>

<!-- Start Main Top -->
<div class="main-top">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                <div class="text-slid-box">
                    <div id="offer-box" class="carouselTicker">
                        <ul class="offer-box">
                            <li>
                                <i class="fab fa-opencart"></i> Off 10%! Shop Now Man
                            </li>
                            <li>
                                <i class="fab fa-opencart"></i> 50% - 80% off on Fashion
                            </li>
                            <li>
                                <i class="fab fa-opencart"></i> 20% off Entire Purchase Promo code: offT20
                            </li>
                            <li>
                                <i class="fab fa-opencart"></i> Off 50%! Shop Now
                            </li>
                            <li>
                                <i class="fab fa-opencart"></i> Off 10%! Shop Now Man
                            </li>
                            <li>
                                <i class="fab fa-opencart"></i> 50% - 80% off on Fashion
                            </li>
                            <li>
                                <i class="fab fa-opencart"></i> 20% off Entire Purchase Promo code: offT20
                            </li>
                            <li>
                                <i class="fab fa-opencart"></i> Off 50%! Shop Now
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                <div class="right-phone-box">
                    <p>Call US : <a href="#"> +11 900 800 100</a></p>
                </div>
                <div class="our-link">
                    <ul>
                        <?php
                            if (session_status() != PHP_SESSION_ACTIVE) {
                                session_start();
                            }
                            if (isset($_SESSION["user"])) {
                                echo '<li class="text-light">Welcome <a href="/FirstStep/my-account.php">'.$_SESSION["user"]["fname"]." ".$_SESSION["user"]["lname"].'</a></li><li><a href="/FirstStep/logout.php">Logout</a></li>';
                            } else {
                                echo '<li><a href="/FirstStep/register.php">Sign Up</a></li><li><a href="/FirstStep/login.php">Sign In</a></li>';
                            }
                        ?>
                        <li><a href="/FirstStep/contact.php">Contact Us</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End Main Top -->

<!-- Start Main Top -->
<header class="main-header">
    <!-- Start Navigation -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light navbar-default bootsnav">
        <div class="container">
            <!-- Start Header Navigation -->
            <div class="navbar-header">
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar-menu" aria-controls="navbars-rs-food" aria-expanded="false" aria-label="Toggle navigation">
                    <i class="fa fa-bars"></i>
                </button>
                <a class="navbar-brand" href="/FirstStep"><img src="images/logo.png" class="logo" alt=""></a>
            </div>
            <!-- End Header Navigation -->

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="navbar-menu">
                <ul class="nav navbar-nav ml-auto" data-in="fadeInDown" data-out="fadeOutUp">
                    <li class="nav-item <?=$REAL_URI == "/index.php" ? "active" : ""?>"><a class="nav-link" href="/FirstStep">Home</a></li>
                    <li class="nav-item <?=$REAL_URI == "/about.php" ? "active" : ""?>"><a class="nav-link" href="/FirstStep/about.php">About Us</a></li>
                    <li class="dropdown megamenu-fw <?=$REAL_URI == "/shop.php" || $REAL_URI == "/shop-detail.php" ? "active" : ""?>">
                        <a href="/FirstStep/shop.php" class="nav-link dropdown-toggle arrow" data-toggle="dropdown">Product</a>
                        <ul class="dropdown-menu megamenu-content" role="menu">
                            <li>
                                <div class="row">
                                    <?php
                                    $categories = category_select_all();
                                    $i = 0;
                                    $content = "";
                                    foreach ($categories as $category) {
                                        $content .= '<li><a href="/FirstStep/shop.php?category='.$category["id"].'">'.$category["name"].'</a></li>';
                                        $i++;
                                        if ($i % 4 == 0 || $i == sizeof($categories)) {
                                            echo '<div class="col-menu col-md-3">';
                                            echo '<h6 class="title">Category list #'.((int) (($i-1)/4)+1).'</h6>';
                                            echo '<div class="content">';
                                            echo '<ul class="menu-col">'.$content.'</ul>';
                                            echo '</div>';
                                            echo '</div>';
                                            $content = "";
                                        }
                                    }
                                    unset($id,$content,$category);
                                    ?>
                                </div>
                                <!-- end row -->
                            </li>
                        </ul>
                    </li>
                    <li class="dropdown">
                        <a href="#" class="nav-link dropdown-toggle arrow" data-toggle="dropdown">Shop</a>
                        <ul class="dropdown-menu">
                            <li><a href="/FirstStep/cart.php">Cart</a></li>
                            <li><a href="/FirstStep/wishlist.php">Wishlist</a></li>
                        </ul>
                    </li>
                    <li class="nav-item <?=$REAL_URI == "/service.php" ? "active" : ""?>"><a class="nav-link" href="/FirstStep/service.php">Our Service</a></li>
                    <li class="nav-item <?=$REAL_URI == "/contact.php" ? "active" : ""?>"><a class="nav-link" href="/FirstStep/contact.php">Contact Us</a></li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->

            <!-- Start Atribute Navigation -->
            <div class="attr-nav">
                <ul>
                    <li class="search"><a href="#"><i class="fa fa-search"></i></a></li>
                    <li class="side-menu"><a href="#">
                            <i class="fa fa-shopping-bag"></i>
                            <span class="badge">3</span>
                        </a></li>
                </ul>
            </div>
            <!-- End Atribute Navigation -->
        </div>
        <!-- Start Side Menu -->
        <div class="side">
            <a href="#" class="close-side"><i class="fa fa-times"></i></a>
            <li class="cart-box">
                <ul class="cart-list">
                    <?php
                        if (isset($_SESSION["cart"]) && sizeof($_SESSION["cart"]) > 0) {
                            $cart_products = array();
                            $total = 0;
                            foreach (array_keys($_SESSION["cart"]) as $product_id) {
                                $product = product_select($product_id)[0];
                                $cart_products[] = $product;
                                echo '<li>';
                                echo '<a href="#" class="photo"><img src="'.$product["main_img_link"].'" class="cart-thumb" alt="'.$product["name"].'"/></a>';
                                echo '<h6><a href="#">'.$product["name"].'</a></h6>';
                                echo '<p>'.$_SESSION["cart"][$product_id].'x - <span class="price">'.number_format($product["price"]/1000).'K VNĐ</span></p>';
                                echo '</li>';
                                $total += intval($product["price"])*$_SESSION["cart"][$product_id];
                            }
                            echo '<li class="total">';
                            echo '<span><strong>Total</strong>: '.number_format($total/1000).'K VNĐ</span>';
                            echo '<a href="/FirstStep/cart.php" class="btn btn-default hvr-hover btn-cart">VIEW CART</a>';
                            echo '</li>';
                            unset($product_id,$product);
                        }
                    ?>
                </ul>
            </li>
        </div>
        <!-- End Side Menu -->
    </nav>
    <!-- End Navigation -->
</header>
<!-- End Main Top -->

<!-- Start Top Search -->
<div class="top-search">
    <div class="container">
        <form action="/FirstStep/shop.php">
            <div class="input-group">
                <button type="submit" style="background: inherit; outline: none; border: none;"><span class="input-group-addon"><i class="fa fa-search"></i></span></button>
                <input type="text" class="form-control" placeholder="Search" name="search">
                <span class="input-group-addon close-search"><i class="fa fa-times"></i></span>
            </div>
        </form>
    </div>
</div>
<!-- End Top Search -->