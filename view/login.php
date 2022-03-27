<div class="cart-box-main">
    <div class="container">
        <?=isset($return_message) ? $return_message : ""?>
        <div class="row new-account-login">
            <div class="col-sm-6 col-lg-6 mb-3">
                <div class="title-left">
                    <h3>Account Login</h3>
                </div>
                <form class="mt-3 review-form-box" id="formLogin" method="post">
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="InputUsername" class="mb-0">Username</label>
                            <input type="text" class="form-control" id="InputUsername" placeholder="Enter Username" name="username"> </div>
                        <div class="form-group col-md-6">
                            <label for="InputPassword" class="mb-0">Password</label>
                            <input type="password" class="form-control" id="InputPassword" placeholder="Password" name="pass"> </div>
                    </div>
                    <button type="submit" class="btn hvr-hover">Login</button>
                </form>
            </div>
        </div>
    </div>
</div>