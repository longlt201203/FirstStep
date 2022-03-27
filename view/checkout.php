<!-- Start All Title Box -->
<div class="all-title-box">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <h2>Checkout</h2>
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">Shop</a></li>
                    <li class="breadcrumb-item active">Checkout</li>
                </ul>
            </div>
        </div>
    </div>
</div>
<!-- End All Title Box -->

<!-- Start Cart  -->
<div class="cart-box-main">
    <div class="container">
        <div class="row">
            <div class="col-sm-6 col-lg-6 mb-3">
                <?=$return_message ?? ""?>
                <div class="checkout-address">
                    <div class="title-left">
                        <h3>Shipping information</h3>
                    </div>
                    <form class="needs-validation" method="post">
                        <input type="hidden" name="tax" value="0.1">
                        <input type="hidden" name="total" value="<?=$total ?? 0?>">
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="firstName">First name</label>
                                <input type="text" class="form-control" id="firstName" name="fname" placeholder="" value="<?=$user["fname"]?>" required>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="lastName">Last name</label>
                                <input type="text" class="form-control" id="lastName" name="lname" placeholder="" value="<?=$user["lname"]?>" required>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="address">Address</label>
                            <input type="text" class="form-control" id="address" name="address" placeholder="" value="<?=$user["address"]?>" required>
                        </div>
                        <div class="title"> <span>Payment</span> </div>
                        <div class="d-block my-3">
                            <div class="custom-control custom-radio">
                                <input id="credit" name="payment_method" type="radio" class="custom-control-input" value="CREDIT" checked required>
                                <label class="custom-control-label" for="credit">Credit</label>
                            </div>
                            <div class="custom-control custom-radio">
                                <input id="cash" name="payment_method" type="radio" class="custom-control-input" value="CASH" required>
                                <label class="custom-control-label" for="cash">Cash</label>
                            </div>
                        </div>
                        <hr class="mb-1">
                        <input type="submit" value="Place Order" class="btn btn-danger">
                    </form>
                </div>
            </div>
            <div class="col-sm-6 col-lg-6 mb-3">
                <div class="row">
                    <div class="col-md-12 col-lg-12">
                        <div class="odr-box">
                            <div class="title-left">
                                <h3>Shopping cart</h3>
                            </div>
                            <div class="rounded p-2 bg-light">
                                <?php
                                if (isset($cart_products)) {
                                    foreach ($cart_products as $product) {
                                        echo '<div class="media mb-2 border-bottom">';
                                        echo '<div class="media-body"> <a href="/FirstStep/shop-detail.php?product='.$product["id"].'">'.$product["name"].'</a>';
                                        echo '<div class="small text-muted">Price: '.number_format($product["price"]).' VNĐ <span class="mx-2">|</span> Qty: '.$_SESSION["cart"][$product["id"]].' <span class="mx-2">|</span> Subtotal: '.number_format($product["price"]/1000*$_SESSION["cart"][$product["id"]]).',000 VNĐ</div>';
                                        echo '</div>';
                                        echo '</div>';
                                    }
                                }
                                ?>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12 col-lg-12">
                        <div class="order-box">
                            <div class="title-left">
                                <h3>Your order</h3>
                            </div>
                            <div class="d-flex">
                                <div class="font-weight-bold">Product</div>
                                <div class="ml-auto font-weight-bold">Total</div>
                            </div>
                            <hr class="my-1">
                            <div class="d-flex">
                                <h4>Sub Total</h4>
                                <div class="ml-auto font-weight-bold"> <?=number_format($total ?? 0)?> VNĐ </div>
                            </div>
                            <div class="d-flex">
                                <h4>Discount</h4>
                                <div class="ml-auto font-weight-bold"> 0 </div>
                            </div>
                            <hr class="my-1">
                            <div class="d-flex">
                                <h4>Coupon Discount</h4>
                                <div class="ml-auto font-weight-bold"> 0 </div>
                            </div>
                            <div class="d-flex">
                                <h4>Tax</h4>
                                <div class="ml-auto font-weight-bold"> <?=number_format(($total ?? 0)*0.1)?> VNĐ </div>
                            </div>
                            <div class="d-flex">
                                <h4>Shipping Cost</h4>
                                <div class="ml-auto font-weight-bold"> Free </div>
                            </div>
                            <hr>
                            <div class="d-flex gr-total">
                                <h5>Grand Total</h5>
                                <div class="ml-auto h5"> <?=number_format(($total ?? 0)*1.1)?> VNĐ </div>
                            </div>
                            <hr> </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
<!-- End Cart -->