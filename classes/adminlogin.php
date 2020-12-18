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

		public function loginAdmin($adminUser, $adminPass){
			$adminUser = $this->fm->validation($adminUser);
			$adminPass = $this->fm->validation($adminPass);

			if (empty($adminUser) || empty($adminPass)) {
				$alert = "Username and Password must be not empty";
			} else {
				$query = "SELECT * FROM account WHERE username = ? AND password = ? AND role = ?";
				$result = $this->db->doPreparedQuery($query, array($adminUser, md5($adminPass), 0));

				if (!empty($result)) {
					Session::set('adminlogin', true);
					Session::set('adminId', $result[0]['account_id']);
					Session::set('adminUsername', $result[0]['username']);
					header('Location: index.php');
				} else {
					$alert = "Username and Password not match";
					return $alert;
				}
			}
		}
	}
?>