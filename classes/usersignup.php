<?php 
	$file_path = realpath(dirname(__FILE__));
    include_once ($file_path.'/../lib/database.php');
    include_once ($file_path.'/../helpers/format.php');
    //include_once ($file_path.'/mail.php');
	include_once "notification.php";
?>

<?php 
	class UserSignup
	{

		private $db;
		private $fm;
		//private $mail;
		private $noti;

		public function __construct()
		{
			$this->db = new Database();
			$this->fm = new Format();
			//$this->mail = new Mail();
			$this->noti = new Notification();
		}

		public function userSignup($data) {
			$userrole = $this->fm->validation($data['user-role']);
			$name = $this->fm->validation($data['Username']);
			$name = ucwords($name);
			$email = $this->fm->validation($data['Email']);
			$phone = $this->fm->validation($data['PhoneNumber']);
			$identityCard = $this->fm->validation($data['IdentityCard']);
			$address = $this->fm->validation($data['Address']);
			$password = $this->fm->validation($data['Password']);
			$repassword = $this->fm->validation($data['ConfirmPass']);
			$license = $this->fm->validation($data['license']);

			if (empty($name) || empty($email) ||  empty($phone) ||  empty($identityCard) || empty($address) || empty($password) ||  empty($repassword) || empty($userrole) || empty($license)) {
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
				$password = md5($password);;
				$status = "verified";
				$code = 0;
				if ($userrole == 2) $request = 0;
				else $request = 1;
				$queryInsert = "INSERT INTO account(username, password, email, role, identity_card, phone_number, address, code, status, request) VALUES (?,?,?,?,?,?,?,?,?,?)";
				$result = $this->db->doPreparedSql($queryInsert, array($name, $password, $email, 2, $identityCard, $phone, $address, $code, $status, $request));

				if (!empty($result)) {
					$queryGet = "SELECT * FROM account WHERE email = ? ORDER BY account_id DESC LIMIT 1";
					$getAccId = $this->db->doPreparedQuery($queryGet, array($email));
					if (empty($getAccId)) {
						$alert = "<span id='error'>Lỗi khi thêm dữ liệu vào database.</span>";
						return $alert;
					}
					$accId = $getAccId[0]['account_id'];
					if ($userrole == 2) {
						$info = "<span id='success'>Tạo tài khoản thành công</span>";
						$message = $email." vừa đăng ký tài khoản tìm trọ";
            			$this->noti->addNotification($accId, $message);
					} else {
						$info = "<span id='success'>Tạo tài khoản thành công. Chờ xác nhận từ admin để có thể đăng bài.</span>";
						$message = $email." vừa đăng ký tài khoản cho thuê trọ đang chờ duyệt.";
            			$this->noti->addNotification($accId, $message);
					}
	                Session::set('info-user', $info);
	                Session::set('userEmail', $email);
	                //Session::set('userPass', $password);
	                header('Location: login.php');
	                exit();
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