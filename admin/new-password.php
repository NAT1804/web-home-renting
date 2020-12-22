<?php 
	include '../classes/adminlogin.php';
 ?>
<?php 
	$email = Session::get('adminEmail');
	if($email == false){
	  header('Location: login.php');
	}
	$class = new AdminLogin();
 	if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['change-pass'])) {
 		$password = $_POST['Password'];
 		$repassword = $_POST['RePassword'];

 		$changePassword = $class->changePassword($password, $repassword);
 	}
 ?>

<!DOCTYPE html>
<head>
<title>Đổi mật khẩu</title>
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
<div class="log-w3">
	<div class="w3layouts-main">
		<h2>Đăng nhập</h2>
			<form action="" method="POST">
				<?php 
					if(isset($_SESSION['info'])) echo $_SESSION['info'];
				?>
				<?php 
					if (isset($changePassword)) {
						echo $changePassword;
					}
				?>
				<input type="password" class="ggg" name="Password" placeholder="Mật khẩu mới" required="">
				<input type="password" class="ggg" name="RePassword" placeholder="Xác nhận mật khẩu" required="">
				<input type="submit" value="Xác nhận" name="change-pass">
			</form>
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
