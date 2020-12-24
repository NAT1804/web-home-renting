<?php   
    include "inc/header.php";
?>
<?php  
    $signup = new UserSignup();
    if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['Register'])) {
        $userSignup = $signup->userSignup($_POST);
    }

?>
    <!-- inner banner -->
    <div class="inner-banner-w3ls py-5" id="home">
        <div class="container py-xl-5 py-lg-3">
            <!-- register  -->
            <div class="modal-body mt-md-2 mt-5">
                <h3 class="title-w3 mb-5 text-center text-wh font-weight-bold">Register Now</h3>
                <form action="register.php" method="post">
                    <div class="form-group" id="notice-error">
                        <?php
                        if (isset($userSignup)) echo $userSignup;     
                        ?>
                    </div>
                    <fieldset class="form-group" data-role="controlgroup">
                        <label class="col-form-label">Register As</label><br>
                        <input type="radio" id="renter" name="user-role" value=2 checked>
                        <label class="col-form-label" for="renter">Người tìm trọ</label>
                        <input type="radio" id="owner" name="user-role" value=1>
                        <label class="col-form-label" for="owner">Người đăng</label>
                    </fieldset>
                    <div class="form-group">
                        <label class="col-form-label">Username</label>
                        <input type="text" class="form-control" placeholder="Username" name="Username" value="<?php 
                            echo (isset($_POST['Username']) ? $_POST['Username'] : '');
                         ?>" required>
                    </div>

                    <div class="form-group">
                        <label class="col-form-label">Email</label>
                        <input type="email" class="form-control" placeholder="example@email.com" name="Email" value="<?php 
                            echo (isset($_POST['Email']) ? $_POST['Email'] : '');
                         ?>" required="">
                    </div>

                    <div class="form-group">
                        <label class="col-form-label">Identity Card</label>
                        <input type="number" class="form-control" placeholder="Contains 12 digits" name="IdentityCard" value="<?php 
                            echo (isset($_POST['IdentityCard']) ? $_POST['IdentityCard'] : '');
                         ?>" required="">
                    </div>

                    <div class="form-group">
                        <label class="col-form-label">Phone Number</label>
                        <input type="number" class="form-control" placeholder="Contains 10 digits" name="PhoneNumber" value="<?php 
                            echo (isset($_POST['PhoneNumber']) ? $_POST['PhoneNumber'] : '');
                         ?>" required="">
                    </div>

                    <div class="form-group">
                        <label class="col-form-label">Address</label>
                        <input type="text" class="form-control" placeholder="Quận Thanh Xuân" name="Address" value="<?php 
                            echo (isset($_POST['Address']) ? $_POST['Address'] : '');
                         ?>" required="">
                    </div>

                    <div class="form-group">
                        <label class="col-form-label">Password</label>
                        <input type="password" class="form-control" placeholder="Password" name="Password" required="">
                    </div>

                    <div class="form-group">
                        <label class="col-form-label">Confirm Password</label>
                        <input type="password" class="form-control" placeholder="Confirm Password" name="ConfirmPass" required="">
                    </div>

                    <div class="sub-w3l my-3">
                        <div class="sub-w3layouts_hub"> 
                            <input type="checkbox" id="brand1" name="license" <?php if(isset($_POST['license'])){ ?> checked <?php } ?> required="">
                            <label for="brand1" class="text-li text-style-w3ls">
                                <span></span>I Accept to the Terms & Conditions</label>
                        </div>
                    </div>

                    <button type="submit" class="btn button-style-w3" name="Register">Register</button>
                </form>
            </div>
            <!-- //register -->
        </div>
    </div>
    <!-- //inner banner -->

    <?php
        include "inc/footer.php";
    ?>

</body>

</html>