<?php 
include_once '../lib/database.php';
include_once '../helpers/format.php';
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
 
    }
?>