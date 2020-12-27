<?php 
    $file_path = realpath(dirname(__FILE__));
    include_once ($file_path.'/../lib/database.php');
    include_once ($file_path.'/../helpers/format.php');
?>

<?php 
    class Visitor
    {
        private $db;
        private $fm;

        public function __construct()
        {
            $this->db = new Database();
            $this->fm = new Format();
        }

        public function showVisitors() {
        	$query = "SELECT * FROM account WHERE role = ?";
        	$result = $this->db->doPreparedQuery($query, array(2));

            return $result;
        }

        public function delUser($accId) {
            $query = "DELETE FROM account WHERE account_id = ?";
            $result = $this->db->doPreparedSql($query, array($accId));

            if (!empty($result)) {
                $alert = "<span id='success'>Xóa tài khoản thành công</span>";
                return $alert;
            } else {
                $alert = "<span id='error'>Xóa tài khoản thất bại</span>";
                return $alert;
            }
        }
 
    }
?>