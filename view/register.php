<div class="cart-box-main">
    <div class="container">
        <div class="row new-account-login">
            <div class="col-sm-6 col-lg-6 mb-3">
                <div class="title-left">
                    <h3>Create New Account</h3>
                    <?=isset($return_message) ? $return_message : ""?>
                </div>
                <form class="mt-3 review-form-box" id="formRegister" method="post">
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="InputUsername" class="mb-0">Username</label>
                            <input type="text" class="form-control" id="InputUsername" placeholder="Username" name="username"> </div>
                        <div class="form-group col-md-6">
                            <label for="InputName" class="mb-0">First Name</label>
                            <input type="text" class="form-control" id="InputName" placeholder="First Name" name="fname"> </div>
                        <div class="form-group col-md-6">
                            <label for="InputLastname" class="mb-0">Last Name</label>
                            <input type="text" class="form-control" id="InputLastname" placeholder="Last Name" name="lname"> </div>
                        <div class="form-group col-md-6">
                            <label for="InputEmail1" class="mb-0">Email Address</label>
                            <input type="email" class="form-control" id="InputEmail1" placeholder="Enter Email" name="email"> </div>
                        <div class="form-group col-md-6">
                            <label for="InputPhone" class="mb-0">Phone Number</label>
                            <input type="text" class="form-control" id="InputPhone" placeholder="Phone Number" name="phone"> </div>
                        <div class="form-group col-md-6">
                            <label for="InputAddress" class="mb-0">Address</label>
                            <input type="text" class="form-control" id="InputAddress" placeholder="Address" name="address"> </div>
                        <div class="form-group col-md-6">
                            <label for="InputPassword1" class="mb-0">Password</label>
                            <input type="password" class="form-control" id="InputPassword1" placeholder="Password" name="pass"> </div>
                        <div class="form-group col-md-6">
                            <label for="InputPassword2" class="mb-0">Confirm Password</label>
                            <input type="password" class="form-control" id="InputPassword2" placeholder="Password" name="pass_confirm"> </div>
                    </div>
                    <button type="submit" class="btn hvr-hover">Register</button>
                </form>
            </div>
        </div>

    </div>
</div>