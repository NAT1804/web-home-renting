<?php 
    $file_path = realpath(dirname(__FILE__));
    include_once ($file_path.'/../lib/database.php');
    include_once ($file_path.'/../helpers/format.php');
?>

<?php 
    class District
    {
        private $db;
        private $fm;

        public function __construct()
        {
            $this->db = new Database();
            $this->fm = new Format();
        }

        public function showDistricts($provinceId) {
        	$query = "SELECT * FROM district WHERE province_id = ?";
        	$result = $this->db->doPreparedQuery($query, array($provinceId));

            return $result;
        }

        public function getNameById($districtId) {
            $query = "SELECT district_name FROM district WHERE district_id = ?";
            $result = $this->db->doPreparedQuery($query, array($districtId));

            return $result;
        }
 
    }
?>