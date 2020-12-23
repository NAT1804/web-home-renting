<?php 
	include '../lib/session.php';
	Session::checkLogin();
	include_once '../lib/database.php';
	include_once '../helpers/format.php';
	include 'mail.php';
?>

<?php 
	class Signup
	{

		private $db;
		private $fm;
		private $mail;

		public function __construct()
		{
			$this->db = new Database();
			$this->fm = new Format();
			$this->mail = new Mail();
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
				$alert = "<span id='error'>Các trường không được rỗng.</span>";
				return $alert;
			} 
			if (strlen($name) < 5) {
				$alert = "<span id='error'>Tên phải có ít nhất 5 ký tự</span>";
				return $alert;
			}
			if (strlen($phone) != 10 ) {
				$alert = "<span id='error'>Số điện thoại không hợp lệ</span>";
				return $alert;
			}
			if (strlen($identityCard) != 12) {
				$alert = "<span id='error'>Số chứng minh nhân dân không hợp lệ</span>";
				return $alert;
			}
			if (strlen($password) < 6) {
				$alert = "<span id='error'>Mật khẩu quá ngắn.</span>";
				return $alert;
			}
			if ($password !== $repassword) {
				$alert = "<span id='error'>Xác nhận mật khẩu không trùng khớp.</span>";
				return $alert;
			}
			$query = "SELECT * FROM account WHERE email = ?";
			$check = $this->db->doPreparedQuery($query, array($email));
			if (empty($check)) {
				$password = md5($password);
				$code = rand(999999, 111111);
				$status = "notverified";
				$role = 0;
				$queryInsert = "INSERT INTO account(username, password, email, role, identity_card, phone_number, address, code, status) VALUES (?,?,?,?,?,?,?,?,?)";
				$result = $this->db->doPreparedSql($queryInsert, array($name, $password, $email, $role, $identityCard, $phone, $address, $code, $status));

				if (!empty($result)) {
					$subject = "Email Verification Code";
		            $content = "Your verification code is $code";
					$sendMail = $this->mail->sendMail($email, $subject, $content);

					if ($sendMail['status'] == "false") return $sendMail['alert'];
					if ($sendMail['status'] == "true") {
						$info = "<span id='success'>We've sent a verification code to your email - $email</span>";
		                Session::set('info', $info);
		                Session::set('adminEmail', $email);
		                Session::set('adminPass', $password);
		                header('Location: user-otp.php');
		                exit();
					}

				} else {
					$alert = "<span id='error'>Lỗi khi thêm dữ liệu vào database.</span>";
					return $alert;
				}
			} else {
				$alert = "<span id='error'>Email đã được đăng ký</span>";
				return $alert;
			}
		}
	}
?>