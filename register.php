<?php
    session_start() ;
    include "lib/connection.php" ;
?>

<?php   
    $message = "" ;
    if (isset($_POST["Register"]))
    {
        $role = $_POST["user-role"] ;
        $username = $_POST["Username"] ;
        $email = $_POST["Email"] ;
        $IdCard = $_POST["ID"] ;
        $phoneNumber = $_POST["PhoneNumber"] ;
        $address = $_POST["Address"] ;
        $password_1 = $_POST["Password"] ;
        $password_2 = $_POST["ConfirmPass"] ;

        if (!($password_1 === $password_2))
        {
            $message = "Password does not match!" ; 
        }
        else 
        {
            $statement = $connect->prepare("SELECT * FROM account WHERE username = :username");
            $statement->bindParam("username", $username, PDO::PARAM_STR);
            $statement->execute();
            $count = $statement->rowCount() ;
            if ($count < 1)
            {
                $password = md5($password_1) ;
                $statement = $connect->prepare("INSERT INTO account(username,password,role,email,identity_card,phone_number,address) VALUES (:username,:password,:role,:email,:identity_card,:phone_number,:address)");
                $statement->bindParam("username", $username, PDO::PARAM_STR);
                $statement->bindParam("password", $password, PDO::PARAM_STR);
                $statement->bindParam("role", $role, PDO::PARAM_STR);
                $statement->bindParam("email", $email, PDO::PARAM_STR);
                $statement->bindParam("identity_card",$IdCard, PDO::PARAM_STR);
                $statement->bindParam("phone_number", $phoneNumber, PDO::PARAM_STR);
                $statement->bindParam("address", $address, PDO::PARAM_STR);
                $statement->execute() ;
                header("Location:login.php");
            }
            else
            {
                $message = "Username already exists!" ;
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
            <!-- register  -->
            <div class="modal-body mt-md-2 mt-5">
                <h3 class="title-w3 mb-5 text-center text-wh font-weight-bold">Register Now</h3>
                <form action="register.php" method="post">
                    <fieldset class="form-group" data-role="controlgroup">
                        <label class="col-form-label">Register As</label><br>
                        <input type="radio" id="owner" name="user-role" value=1 checked>
                        <label class="col-form-label" for="owner">Người đăng</label>
                        <input type="radio" id="renter" name="user-role" value=2>
                        <label class="col-form-label" for="renter">Người tìm trọ</label><br>
                    </fieldset>
                    <div class="form-group">
                        <label class="col-form-label">Username</label>
                        <input type="text" class="form-control" placeholder="Username" name="Username" required="">
                    </div>

                    <div class="form-group">
                        <label class="col-form-label">Email</label>
                        <input type="email" class="form-control" placeholder="loremipsum@email.com" name="Email"
                            required="">
                    </div>

                    <div class="form-group">
                        <label class="col-form-label">Identity Card</label>
                        <input type="text" class="form-control" placeholder="123456789" name="ID" required="">
                    </div>

                    <div class="form-group">
                        <label class="col-form-label">Phone Number</label>
                        <input type="text" class="form-control" placeholder="0123456789" name="PhoneNumber" required="">
                    </div>

                    <div class="form-group">
                        <label class="col-form-label">Address</label>
                        <input type="text" class="form-control" placeholder="Quận Thanh Xuân" name="Address" required="">
                    </div>

                    <div class="form-group">
                        <label class="col-form-label">Password</label>
                        <input type="password" class="form-control" placeholder="*****" name="Password" required="">
                    </div>

                    <div class="form-group">
                        <label class="col-form-label">Confirm Password</label>
                        <input type="password" class="form-control" placeholder="*****" name="ConfirmPass" required="">
                    </div>

                    <?php
                        if (isset($message))
                        {
                            echo '<label class="text-danger">' . $message . '</label>' ;
                        }
                    ?>
                    <div class="sub-w3l my-3">
                        <div class="sub-w3layouts_hub">
                            <input type="checkbox" id="brand1" value="" required="">
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