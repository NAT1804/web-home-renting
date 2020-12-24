<?php 
	$file_path = realpath(dirname(__FILE__));
    include_once ($file_path.'/../lib/database.php');
    include_once ($file_path.'/../helpers/format.php');
	include 'mail.php';
?>

<?php 
	class UserLogin
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

		public function userLogin($useremail, $password){
			$useremail = $this->fm->validation($useremail);
			$password = $this->fm->validation($password);

			if (empty($_POST['remember'])) {
				if (isset($_COOKIE['useremail']))
					setcookie("email", "");
				if (isset($_COOKIE['password']))
					setcookie("pass", "");
			}

			if (empty($useremail) || empty($password)) {
				$alert = "<span class='error' style='width: 100%; color: red; font-size: 18px;'>Email và Password không được rỗng.</span>";
				return $alert;
			} 
			
			$query = "SELECT * FROM account WHERE email = ?";
			$check = $this->db->doPreparedQuery($query, array($useremail));
			if (!empty($check)) {
				if (md5($password) == $check[0]['password']) {
					if ($check[0]['role'] != 0) {
						if (!empty($_POST['remember'])) {
							setcookie("useremail", $useremail, time()+ (10*365*24*60*60));
							setcookie("password", $password, time()+ (10*365*24*60*60));
						}
						Session::set('userId', $check[0]['account_id']);
						Session::set('username', $check[0]['username']);
						Session::set('userEmail', $check[0]['email']);
						Session::set('role', $check[0]['role']);
						header('Location: index.php');
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


	}
?>