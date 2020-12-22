
<!-- Xử lí đăng nhập -->
<?php
    session_start() ;
    include "lib/connection.php";
    $message = "";

    if (isset($_POST["Login"]))
    {
        
        if (empty($_POST["Username"]) || (empty($_POST["Password"])))
        {
            $message = "<label> All field is required! <label>" ;
        }
        else 
        {   
            $userName = $_POST["Username"] ;
            $passWord = md5($_POST["Password"]) ;
 

            $query = "SELECT * FROM account WHERE username = :username AND password = :password AND role > 0 " ;
            $statement = $connect->prepare($query) ;
            $statement->execute(
                array(
                    'username' => $userName,
                    'password' => $passWord

                )
                );
            $count = $statement->rowCount();
            $data = $statement->fetch(PDO::FETCH_OBJ);

            if ($count > 0)
            {
                $_SESSION["UserId"] = $data->account_id ;
                $_SESSION["Username"] = $_POST["Username"] ;
                $_SESSION["Role"] = $data->role ;
                header("Location:index.php") ;
            }
            else
            {
                $message = "Username OR Password is wrong" ;
            }
        }
    }
?> 

<?php   
    include "inc/header.php";
    
?>

    <!-- inner banner -->
    <div class="inner-banner-w3ls py-5" id="home">
        <div class="container py-xl-5 py-lg-3">
            <!-- login  -->
            <div class="modal-body my-5 pt-4">
                <h3 class="title-w3 mb-5 text-center text-wh font-weight-bold">Login Now</h3>
                <form action="login.php" method="post">
                    <div class="form-group">
                        <label class="col-form-label">Username</label>
                        <input type="text" class="form-control" placeholder="Username" name="Username" required="" >
                    </div>
                    <div class="form-group">
                        <label class="col-form-label">Password</label>
                        <input type="password" class="form-control" placeholder="*****" name="Password" required="">
                    </div>
                    <button type="submit" class="btn button-style-w3" name="Login" value="Login">Login</button>
                    
                    <!-- //in ra thông báo -->
                    <?php
                        if (isset($message))
                        {
                            echo '<label class=text-danger>' .$message. '</label>' ;
                        }
                    ?>

                    <div class="row sub-w3l mt-3 mb-5">
                        <div class="col-sm-6 sub-w3layouts_hub">
                            <input type="checkbox" id="brand1" value="">
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