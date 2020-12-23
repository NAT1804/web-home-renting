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
					$info = "<span id='success'>Bạn đã xác thực thành công Email - ".$result[0]['email']."</span>";
					Session::set('info', $info);
					header('Location: index.php');
					exit();
				} else {
					$alert = "<span id='error'>Lỗi khi cập nhật code</span>";
				return $alert;
				}

			} else {
				$alert = "<span id='error'>Mã xác thực không chính xác.</span>";
				return $alert;
			}
		}

		public function checkResetOTP($code) {
			Session::set('info', '');
			$code = $this->fm->validation($code);
			$query = "SELECT * FROM account WHERE code = ?";
			$result = $this->db->doPreparedQuery($query, array($code));

			if (!empty($result)) {
				Session::set('adminEmail', $result[0]['email']);
				$info = "<span id='success'>Vui lòng tạo mật khẩu mới.</span>";
				Session::set('info', $info);
				header('Location: new-password.php');
				exit();
			} else {
				$alert = "<span id='error'>Mã xác thực không chính xác.</span>";
				return $alert;
			}
		}
	}
?>