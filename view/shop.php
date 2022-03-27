<!-- Start All Title Box -->
<div class="all-title-box">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <h2>Shop</h2>
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">Shop</li>
                </ul>
            </div>
        </div>
    </div>
</div>
<!-- End All Title Box -->

<!-- Start Shop Page  -->
<div class="shop-box-inner">
    <div class="container">
        <div class="row">
            <div class="col-xl-3 col-lg-3 col-sm-12 col-xs-12 sidebar-shop-left">
                <div class="product-categori">
                    <div class="search-product">
                        <form>
                            <input class="form-control" placeholder="Search here..." type="text" name="search" value="<?=$_GET["search"] ?? ""?>">
                            <button type="submit"> <i class="fa fa-search"></i></button>
                        </form>
                    </div>
                    <div class="filter-sidebar-left">
                        <div class="title-left">
                            <h3>Categories</h3>
                        </div>
                        <div class="list-group list-group-collapse list-group-sm list-group-tree" id="list-group-men" data-children=".sub-men">
                            <a href="<?=uri_remove_parameters($_SERVER["REQUEST_URI"],array("category"))?>" class="list-group-item list-group-item-action '.<?=(!isset($_GET["category"]) ? "active" : "")?>.'"> All</small></a>
                            <?php
                                foreach ($categories as $category) {
                                    echo '<a href="'.uri_update_parameters(uri_remove_parameters($_SERVER["REQUEST_URI"],array("search")),array("category" => $category["id"])).'" class="list-group-item list-group-item-action '.(isset($_GET["category"]) && $_GET["category"] == $category["id"] ? "active" : "").'"> '.$category["name"].'</a>';
                                }
                                unset($category);
                            ?>
                        </div>
                    </div>
                    <div class="filter-brand-left">
                        <div class="title-left">
                            <h3>Brand</h3>
                        </div>
                        <div class="list-group list-group-collapse list-group-sm list-group-tree" id="list-group-men" data-children=".sub-men">
                            <a href="<?=uri_remove_parameters($_SERVER["REQUEST_URI"],array("brand"))?>" class="list-group-item list-group-item-action '.<?=(!isset($_GET["brand"]) ? "active" : "")?>.'"> All</small></a>
                            <?php
                            foreach ($brands as $brand) {
                                echo '<a href="'.uri_update_parameters(uri_remove_parameters($_SERVER["REQUEST_URI"],array("search")),array("brand" => $brand["id"])).'" class="list-group-item list-group-item-action '.(isset($_GET["brand"]) && $_GET["brand"] == $brand["id"] ? "active" : "").'"> '.$brand["name"].'</a>';
                            }
                            unset($brand);
                            ?>
                        </div>
                    </div>

                </div>
            </div>
            <div class="col-xl-9 col-lg-9 col-sm-12 col-xs-12 shop-content-right">
                <div class="right-product-box">
                    <div class="product-item-filter row">
                        <div class="col-12 col-sm-8 text-center text-sm-left">
                            <p>Showing all <?=sizeof($products)?> results</p>
                            <div class="dropdown">
                                <button class="btn btn-danger dropdown-toggle" type="button" id="sortbyBtn" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    Sort by
                                </button>
                                <div class="dropdown-menu" aria-labelledby="sortbyBtn">
                                    <a class="dropdown-item" href="<?=uri_remove_parameters($_SERVER["REQUEST_URI"],array("sort"))?>">Nothing</a>
                                    <a class="dropdown-item" href="<?=uri_update_parameters($_SERVER["REQUEST_URI"],array("sort" => "NEW"))?>">New</a>
                                    <a class="dropdown-item" href="<?=uri_update_parameters($_SERVER["REQUEST_URI"],array("sort" => "SALE"))?>">Sale</a>
                                    <a class="dropdown-item" href="<?=uri_update_parameters($_SERVER["REQUEST_URI"],array("sort" => "DESC_PRICE"))?>">High Price -> Low Price</a>
                                    <a class="dropdown-item" href="<?=uri_update_parameters($_SERVER["REQUEST_URI"],array("sort" => "ASC_PRICE"))?>">Low Price -> High Price</a>
                                </div>

                            </div>
                        </div>
                        <div class="col-12 col-sm-4 text-center text-sm-right">
                            <ul class="nav nav-tabs ml-auto">
                                <li>
                                    <a class="nav-link active" href="#grid-view" data-toggle="tab"> <i class="fa fa-th"></i> </a>
                                </li>
                                <li>
                                    <a class="nav-link" href="#list-view" data-toggle="tab"> <i class="fa fa-list-ul"></i> </a>
                                </li>
                            </ul>
                        </div>
                    </div>

                    <div class="row product-categorie-box">
                        <div class="tab-content">
                            <div role="tabpanel" class="tab-pane fade show active" id="grid-view">
                                <div class="row">
                                    <?php
                                        foreach ($products as $product) {
                                            echo "<div class=\"col-sm-6 col-md-6 col-lg-4 col-xl-4\"'>
                                        <div class=\"products-single fix\">
                                            <div class=\"box-img-hover\" style='height: 70%;'>
                                                <div class=\"type-lb\">
                                                    <p class=\"".($product['status'] != 'NONE' ? $product['status'] : '')."\">".($product['status'] != 'NONE' ? $product['status'] : '')."</p>
                                                </div>
                                                <img src=\"{$product["main_img_link"]}\" class=\"img-fluid\" alt=\"{$product["name"]}\">
                                                <div class=\"mask-icon\">
                                                    <ul>
                                                        <li><a href=\"/FirstStep/shop-detail.php?product={$product["id"]}\" data-toggle=\"tooltip\" data-placement=\"right\" title=\"View\"><i class=\"fas fa-eye\"></i></a></li>
                                                        <li><a href=\"/FirstStep/add_to_wishlist.php?action=add&product={$product["id"]}\" data-toggle=\"tooltip\" data-placement=\"right\" title=\"Add to Wishlist\"><i class=\"far fa-heart\"></i></a></li>
                                                    </ul>
                                                    <a class=\"cart\" href=\"/FirstStep/add_to_cart.php?action=add&product={$product["id"]}\">Add to Cart</a>
                                                </div>
                                            </div>
                                            <div class=\"why-text\">
                                                <h4><a href='/FirstStep/shop-detail.php?product={$product["id"]}'>{$product["name"]}</a></h4>
                                                <h5>".number_format($product["price"])." VNĐ</h5>
                                            </div>
                                        </div>
                                    </div>";
                                        }
                                    ?>
                                </div>
                            </div>
                            <div role="tabpanel" class="tab-pane fade" id="list-view">
                                <?php
                                    foreach ($products as $product) {
                                        echo "<div class=\"list-view-box\">
                                    <div class=\"row\" style='min-height: 150px; max-height: 300px'>
                                        <div class=\"col-sm-6 col-md-6 col-lg-4 col-xl-4\">
                                            <div class=\"products-single fix\">
                                                <div class=\"box-img-hover\">
                                                    <div class=\"type-lb\">
                                                    <p class=\"".($product['status'] != 'NONE' ? $product['status'] : '')."\">".($product['status'] != 'NONE' ? $product['status'] : '')."</p>
                                                    </div>
                                                    <img src=\"{$product["main_img_link"]}\" class=\"img-fluid\" alt=\"Image\">
                                                    <div class=\"mask-icon\">
                                                        <ul>
                                                            <li><a href=\"/FirstStep/shop-detail.php?product={$product["id"]}}\" data-toggle=\"tooltip\" data-placement=\"right\" title=\"View\"><i class=\"fas fa-eye\"></i></a></li>
                                                            <li><a href=\"/FirstStep/add_to_wishlist.php?action=add&product={$product["id"]}\" data-toggle=\"tooltip\" data-placement=\"right\" title=\"Add to Wishlist\"><i class=\"far fa-heart\"></i></a></li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class=\"col-sm-6 col-md-6 col-lg-8 col-xl-8\">
                                            <div class=\"why-text full-width\" style='height: 100%'>
                                                <h4><a href='/FirstStep/shop-detail.php?product={$product["id"]}' class='text-dark'>{$product["name"]}</a></h4>
                                                <h5> <!--<del>$ 60.00</del>-->".number_format($product["price"])." VNĐ</h5>
                                                <p>{$product["description"]}</p>
                                                <a class=\"btn hvr-hover\" href=\"/FirstStep/add_to_cart.php?action=add&product={$product["id"]}\">Add to Cart</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>";
                                    }
                                ?>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
<!-- End Shop Page -->
<script src="/FirstStep/js/shop.js"></script>