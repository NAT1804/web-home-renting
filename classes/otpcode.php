<?php 
	include '../lib/session.php';
	Session::checkLogin();
	include '../lib/database.php';
	include '../helpers/format.php';
?>

<?php 
	class OTPCode
	{
		private $db;
		private $fm;

		public function __construct()
		{
			$this->db = new Database();
			$this->fm = new Format();
		}

		public function checkOTP($code) {
			Session::set('info', '');
			$code = $this->fm->validation($code);

			$query = "SELECT * FROM account WHERE code = ?";
			$result = $this->db->doPreparedQuery($query, array($code));

			if (!empty($result)) {
				$codeOTP = $result[0]['code'];
				$code = 0;
				$status = "verified";
				$queryUpdate = "UPDATE account SET code = ?, status = ? WHERE code = ?";
				$resultUpdate = $this->db->doPreparedSql($queryUpdate, array($code, $status, $codeOTP));

				if (!empty($resultUpdate)) {
					Session::set('adminEmail', $result[0]['email']);
					Session::set('adminUser', $result[0]['username']);
					header('Location: index.php');
					exit();
				} else {
					$alert = "<span class='error' style='width: 100%; color: red; font-size: 18px;'>Lỗi khi cập nhật code</span>";
				return $alert;
				}

			} else {
				$alert = "<span class='error' style='width: 100%; color: red; font-size: 18px;'>Mã xác thực không chính xác.</span>";
				return $alert;
			}
		}

		public function adminSignup($data) {
			$name = $this->fm->validation($data['Name']);
			$name = ucwords($name);
			$email = $this->fm->validation($data['Email']);
			$phone = $this->fm->validation($data['Phone']);
			$identityCard = $this->fm->validation($data['IdentityCard']);
			$address = $this->fm->validation($data['Address']);
			$password = $this->fm->validation($data['Password']);
			$repassword = $this->fm->validation($data['RePassword']);

			if (empty($name) || empty($email) ||  empty($phone) ||  empty($identityCard) || empty($address) || empty($password) ||  empty($repassword)) {
				$alert = "<span class='error' style='width: 100%; color: red; font-size: 18px;'>Các trường không được rỗng.</span>";
				return $alert;
			} 
			if (strlen($name) < 5) {
				$alert = "<span class='error' style='width: 100%; color: red; font-size: 18px;'>Tên phải có ít nhất 5 ký tự</span>";
				return $alert;
			}
			if (strlen($phone) != 10 ) {
				$alert = "<span class='error' style='width: 100%; color: red; font-size: 18px;'>Số điện thoại không hợp lệ</span>";
				return $alert;
			}
			if (strlen($identityCard) != 12) {
				$alert = "<span class='error' style='width: 100%; color: red; font-size: 18px;'>Số chứng minh nhân dân không hợp lệ</span>";
				return $alert;
			}
			if ($password !== $repassword) {
				$alert = "<span class='error' style='width: 100%; color: red; font-size: 18px;'>Xác nhận mật khẩu không trùng khớp.</span>";
				return $alert;
			}
			$query = "SELECT * FROM account WHERE email = ?";
			$check = $this->db->doPreparedQuery($query, array($email));
			if (empty($check)) {
				$password = md5($password);
				$code = rand(999999, 111111);
				$status = "notverified";
				$role = 0;
				$queryInsert = "INSERT INTO account(username, password, email, role, idenity_card, phone_number, address, code, status) VALUES (?,?,?,?,?,?,?,?,?)";
				$result = $this->db->doPreparedSql($queryInsert, array($name, $password, $email, $role, $identityCard, $phone, $address, $code, $status));

				if (!empty($result)) {
					$subject = "Email Verification Code";
		            $message = "Your verification code is $code";
		            $sender = "From: michigo2802@gmail.com";
		            if(mail($email, $subject, $message, $sender)){
		                $info = "<span class='error' style='width: 100%; color: green; font-size: 18px; background-color: #ffe6e6; text-align: center; border: 1px;'>We've sent a verification code to your email - $email</span>";
		                Session::set('info', $info);
		                Session::set('adminEmail', $email);
		                Session::set('adminPass', $password);
		                header('location: user-otp.php');
		                exit();		        
		            }else{
		               $alert = "<span class='error' style='width: 100%; color: red; font-size: 18px; background-color: #ccffcc; text-align: center; border: 1px;'>Lỗi khi gửi mail.</span>";
						return $alert;
		            }
				} else {
					$alert = "<span class='error' style='width: 100%; color: red; font-size: 18px; background-color: #ffe6e6; text-align: center; border: 1px;'>Lỗi khi thêm dữ liệu vào database.</span>";
					return $alert;
				}

				if (md5($adminPass) == $check[0]['password']) {
					if ($check[0]['status'] == "verified") {
						if ($check[0]['role'] == 0) {
							Session::set('adminlogin', true);
							Session::set('adminId', $check[0]['account_id']);
							Session::set('adminUsername', $check[0]['username']);
							Session::set('adminEmail', $check[0]['username']);
							Session::set('adminPass', $check[0]['password']);
							header('Location: index.php');
						} else {
							$alert = "<span class='error' style='width: 100%; color: red; font-size: 18px; background-color: #ffe6e6; text-align: center; border: 1px;'>Bạn không có quyền đăng nhập</span>";
							return $alert;
						}
					} else {
						$alert = "<span class='error' style='width: 100%; color: red; font-size: 18px; background-color: #ffe6e6; text-align: center; border: 1px;'>Bạn chưa xác thực email - ".$adminEmail."</span>";
						return $alert;
					}
				} else {
					$alert = "<span class='error' style='width: 100%; color: red; font-size: 18px; background-color: #ffe6e6; text-align: center; border: 1px;'>Bạn nhập sai Email hoặc Password</span>";
					return $alert;
				}
			} else {
				$alert = "<span class='error' style='width: 100%; color: red; font-size: 18px; background-color: #ffe6e6; text-align: center;'>Email đã được đăng ký</span>";
				return $alert;
			}
		}
	}
?>