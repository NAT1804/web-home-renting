<?php 
    $file_path = realpath(dirname(__FILE__));
    include_once ($file_path.'/../lib/database.php');
    include_once ($file_path.'/../helpers/format.php');
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

        public function showPostersActive() {
        	$query = "SELECT * FROM account WHERE role = ?";
        	$result = $this->db->doPreparedQuery($query, array(1));

            return $result;
        }

        public function showPostersNonActive() {
            $query = "SELECT * FROM account WHERE request = ?";
            $result = $this->db->doPreparedQuery($query, array(1));

            return $result;
        }
 
    }
?>