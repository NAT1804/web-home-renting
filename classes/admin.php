<?php 
include_once '../lib/database.php';
include_once '../helpers/format.php';
?>

<?php 
    class Admin
    {
        private $db;
        private $fm;

        public function __construct()
        {
            $this->db = new Database();
            $this->fm = new Format();
        }

        public function showAdmins() {
        	$query = "SELECT * FROM account WHERE role = ?";
        	$result = $this->db->doPreparedQuery($query, array(0));

            return $result;
        }
 
    }
?>