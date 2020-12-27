<?php   
    include "inc/header.php";
?>
<?php 
    $login = new UserLogin();
    if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['Login'])) {
        $useremail = $_POST['Email'];
        $password = $_POST['Password'];
        $userLogin = $login->userLogin($useremail, $password);
    }
?>
    <!-- inner banner -->
    <div class="inner-banner-w3ls py-5" id="home">
        <div class="container py-xl-5 py-lg-3">
            <!-- login  -->
            <div class="modal-body my-5 pt-4">
                <h3 class="title-w3 mb-5 text-center text-wh font-weight-bold">Login Now</h3>
                <form action="login.php" method="post">
                    <!-- //in ra thông báo -->
                    <div class="form-group">
                        <?php 
                            if(isset($_SESSION['info-user'])) echo $_SESSION['info-user'];
                        ?>
                    </div>
                    <div class="form-group" id="notice-error">
                        <?php
                            if (isset($userLogin)) echo $userLogin;
                        ?>
                    </div>
                    <div class="form-group">
                        <label class="col-form-label">Email</label>
                        <input type="email" class="form-control" placeholder="Email" name="Email" value="<?php if(isset($_COOKIE['useremail'])) echo $_COOKIE['useremail']; ?>" required>
                    </div>
                    <div class="form-group">
                        <label class="col-form-label">Password</label>
                        <input type="password" class="form-control" placeholder="Password" name="Password" value="<?php if(isset($_COOKIE['password'])) echo $_COOKIE['password']; ?>" required>
                    </div>
                    <button type="submit" class="btn button-style-w3" name="Login" value="Login">Login</button>

                    <div class="row sub-w3l mt-3 mb-5">
                        <div class="col-sm-6 sub-w3layouts_hub">
                            <input type="checkbox" id="brand1" name="remember" <?php if(isset($_COOKIE['useremail'])) { ?> checked <?php } ?> >
                            <label for="brand1" class="text-li text-style-w3ls">
                                <span></span>Remember me?</label>
                        </div>
                        <div class="col-sm-6 forgot-w3l text-sm-right">
                            <a href="#" class="text-li text-style-w3ls">Forgot Password?</a>
                        </div>
                    </div>
                    <p class="text-center dont-do text-style-w3ls text-li">Don't have an account?
                        <a href="register.php" class="font-weight-bold text-li">
                            Register Now</a>
                    </p>
                </form>
            </div>
            <!-- //login -->
        </div>
    </div>
    <!-- //inner banner -->

   <?php
        include "inc/footer.php";
   ?>

</body>

</html>