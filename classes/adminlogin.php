<?php 
	include '../lib/session.php';
	Session::checkLogin();
	include '../lib/database.php';
	include '../helpers/format.php';
?>

<?php 
	class AdminLogin
	{
		private $db;
		private $fm;
		
		public function __construct()
		{
			$this->db = new Database();
			$this->fm = new Format();
		}

		public function loginAdmin($adminEmail, $adminPass){
			$adminEmail = $this->fm->validation($adminEmail);
			$adminPass = $this->fm->validation($adminPass);

			if (empty($adminEmail) || empty($adminPass)) {
				$alert = "<span class='error' style='width: 100%; color: red; font-size: 18px;'>Email và Password không được rỗng.</span>";
				return $alert;
			} 
			
			$query = "SELECT * FROM account WHERE email = ?";
			$check = $this->db->doPreparedQuery($query, array($adminEmail));
			if (!empty($check)) {
				if (md5($adminPass) == $check[0]['password']) {
					if ($check[0]['status'] == "verified") {
						if ($check[0]['code'] == 0) {
							if ($check[0]['role'] == 0) {
								Session::set('adminlogin', true);
								Session::set('adminId', $check[0]['account_id']);
								Session::set('adminUsername', $check[0]['username']);
								Session::set('adminEmail', $check[0]['email']);
								Session::set('adminPass', $check[0]['password']);
								header('Location: index.php');
							} else {
								$alert = "<span id='error'>Bạn không có quyền đăng nhập</span>";
								return $alert;
							}
						} else {
							Session::set('adminEmail', $check[0]['email']);
							header('Location: reset-code.php');
							exit();
						}
					} else {
						$info = "<span id='success'>Bạn chưa xác thực email - ".$adminEmail."</span>";
						Session::set('info', $info);
						header('Location: user-otp.php');
						exit();
					}
				} else {
					$alert = "<span id='error'>Bạn nhập sai Email hoặc Password</span>";
					return $alert;
				}
			} else {
				$alert = "<span id='error'>Có vẻ như bạn chưa có tài khoản. Nhấp vào link bên dưới để đăng ký.</span>";
				return $alert;
			}
		}

		public function checkEmail($email) {
			$email = $this->fm->validation($email);
			$query = "SELECT * FROM account WHERE email = ?";
			$result = $this->db->doPreparedQuery($query, array($email));

			if (!empty($result)) {
				$code = rand(999999,111111);
				$queryUpdate = "UPDATE account SET code = ? WHERE email = ?";
				$resultUpdate = $this->db->doPreparedSql($queryUpdate, array($code, $email));

				if (!empty($resultUpdate)) {
					$subject = "Password Reset Code";
	                $message = "Your password reset code is $code";
	                $sender = "From: michigo2802@gmail.com";
	                if(mail($email, $subject, $message, $sender)){
	                    $info = "<span id='success'>We've sent a passwrod reset otp to your email - $email</span>";
	                    $_SESSION['info'] = $info;
	                    $_SESSION['adminEmail'] = $email;
	                    header('Location: ../admin/reset-code.php');
	                    exit();
	                }else{
	                    $alert = "<span id='error'>Lỗi khi gửi code.</span>";
						return $alert;
	                }
				} else {
					$alert = "<span class='error' style='width: 100%; color: red; font-size: 18px; background-color: #ffe6e6; text-align: center;'>Lỗi khi làm mới code.</span>";
					return $alert;
				}
			} else {
				$alert = "<span class='error' style='width: 100%; color: red; font-size: 18px; background-color: #ffe6e6; text-align: center;'>Email này không tồn tại</span>";
				return $alert;
			}
		}

		public function changePassword($password, $repassword) {
			$password = $this->fm->validation($password);
			$repassword = $this->fm->validation($repassword);

			Session::set('info', '');
			if (strlen($password) < 6) {
				$alert = "<span id='error'>Mật khẩu quá ngắn</span>";
				return $alert;
			}
			if ($password !== $repassword) {
				$alert = "<span id='error'>Xác nhận mật khẩu không chính xác</span>";
				return $alert;
			}
			$code = 0;
			$email = Session::get('adminEmail');
			$password = md5($password);
			$query = "UPDATE account SET code = ?, password = ? WHERE email = ?";
			$result = $this->db->doPreparedSql($query, array($code, $password, $email));

			if (!empty($result)) {
				$info = "<span id='success'>Mật khẩu của bạn đã thay đổi. Bây giờ bạn có thể đăng nhập với mật khẩu mới.</span>";
				Session::set('info', $info);
				header('Location: password-changed.php');
				exit();
			} else {
				$alert = "<span id='error'>Thay đổi mật khẩu thất bại</span>";
				return $alert;
			}
		}

	}
?>