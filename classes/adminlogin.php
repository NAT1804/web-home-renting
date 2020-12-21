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
						if ($check[0]['role'] == 0) {
							Session::set('adminlogin', true);
							Session::set('adminId', $check[0]['account_id']);
							Session::set('adminUsername', $check[0]['username']);
							Session::set('adminEmail', $check[0]['email']);
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
				$alert = "<span class='error' style='width: 100%; color: red; font-size: 18px; background-color: #ffe6e6; text-align: center;'>Có vẻ như bạn chưa có tài khoản. Nhấp vào link bên dưới để đăng ký</span>";
				return $alert;
			}
		}
	}
?>