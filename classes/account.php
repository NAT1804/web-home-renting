<?php 
    $file_path = realpath(dirname(__FILE__));
    include_once ($file_path.'/../lib/database.php');
    include_once ($file_path.'/../helpers/format.php');
?>

<?php 
	class Account
	{
		private $db;
        private $fm;
		
		public function __construct()
		{
			$this->db = new Database();
            $this->fm = new Format();
		}

		public function roleAccById($accId) {
			$query = "SELECT * FROM account WHERE account_id = ?";
			$result = $this->db->doPreparedQuery($query, array($accId));

			return $result;
		}
	}
?>