<?php include_once '../classes/signup.php'; ?>
<?php 
	$signup = new Signup();
	if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['register'])) {
		$adminSignup = $signup->adminSignup($_POST);
	}
?>
<!DOCTYPE html>
<head>
<title>Đăng ký</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Visitors Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, 
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<!-- bootstrap-css -->
<link rel="stylesheet" href="css/bootstrap.min.css" >
<!-- //bootstrap-css -->
<!-- Custom CSS -->
<link href="css/style.css" rel='stylesheet' type='text/css' />
<link href="css/style-responsive.css" rel="stylesheet"/>
<!-- font CSS -->
<link href='//fonts.googleapis.com/css?family=Roboto:400,100,100italic,300,300italic,400italic,500,500italic,700,700italic,900,900italic' rel='stylesheet' type='text/css'>
<!-- font-awesome icons -->
<link rel="stylesheet" href="css/font.css" type="text/css"/>
<link href="css/font-awesome.css" rel="stylesheet"> 
<!-- //font-awesome icons -->
<script src="js/jquery2.0.3.min.js"></script>
</head>
<body>
<div class="reg-w3">
<div class="w3layouts-main">
	<h2>Đăng ký</h2>
		<form action="" method="post">
			<?php if(isset($adminSignup)) echo $adminSignup; ?>
			<input type="text" class="ggg" name="Name" placeholder="Họ và tên" value="<?php 
				echo isset($_POST['Name']) ?  $_POST['Name'] : ''
			 ?>" required="">
			<input type="email" class="ggg" name="Email" placeholder="Email" value="<?php 
				echo (isset($_POST['Email'])) ? $_POST['Email'] : '';
			 ?>" required="">
			<input type="number" class="ggg" name="Phone" placeholder="Số điện thoại" value="<?php 
				echo (isset($_POST['Phone'])) ? $_POST['Phone'] : '';
			 ?>" required="">
			<input type="number" class="ggg" name="IdentityCard" placeholder="Chứng minh nhân dân" value="<?php
				echo (isset($_POST['IdentityCard'])) ? $_POST['IdentityCard'] : ''; 
			 ?>" required="">
			 <input type="text" class="ggg" name="Address" placeholder="Địa chỉ" value="<?php
				echo (isset($_POST['Address'])) ? $_POST['Address'] : ''; 
			 ?>" required="">
			<input type="password" class="ggg" name="Password" placeholder="Mật khẩu" required="">
			<input type="password" class="ggg" name="RePassword" placeholder="Xác nhận mật khẩu" required="">
			<!-- <h4><input type="checkbox" />I agree to the Terms of Service and Privacy Policy</h4> -->
			
			<!-- <div class="clearfix"></div> -->
			<input type="submit" value="Đăng ký" name="register">
		</form>
		<p>Đã có tài khoản.<a href="login.php">Đăng nhập</a></p>
</div>
</div>
<script src="js/bootstrap.js"></script>
<script src="js/jquery.dcjqaccordion.2.7.js"></script>
<script src="js/scripts.js"></script>
<script src="js/jquery.slimscroll.js"></script>
<script src="js/jquery.nicescroll.js"></script>
<!--[if lte IE 8]><script language="javascript" type="text/javascript" src="js/flot-chart/excanvas.min.js"></script><![endif]-->
<script src="js/jquery.scrollTo.js"></script>
</body>
</html>
