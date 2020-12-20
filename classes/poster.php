<?php 
include_once '../lib/database.php';
include_once '../helpers/format.php';
?>

<?php 
    class Poster
    {
        private $db;
        private $fm;

        public function __construct()
        {
            $this->db = new Database();
            $this->fm = new Format();
        }

        public function showPosters() {
        	$query = "SELECT * FROM account WHERE role = ?";
        	$result = $this->db->doPreparedQuery($query, array(1));

            return $result;
        }
 
    }
?>