<?php 
include_once '../lib/database.php';
include_once '../helpers/format.php';
?>

<?php 
    class Style
    {
        private $db;
        private $fm;

        public function __construct()
        {
            $this->db = new Database();
            $this->fm = new Format();
        }

        public function showStyles() {
        	$query = "SELECT * FROM style";
        	$result = $this->db->doPreparedQuery($query, array());

            return $result;
        }
 
    }
?>