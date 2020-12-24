<?php 
    $file_path = realpath(dirname(__FILE__));
    include_once ($file_path.'/../lib/database.php');
    include_once ($file_path.'/../helpers/format.php');
?>

<?php 
    class Notification
    {
        private $db;
        private $fm;

        public function __construct()
        {
            $this->db = new Database();
            $this->fm = new Format();
        }

        public function showNotificationsAdmin() {
        	$query = "SELECT * FROM `notification` n INNER JOIN account a ON a.account_id = n.account_id ORDER BY id DESC";
        	$result = $this->db->doPreparedQuery($query, array());

            return $result;
        }

        public function showNotificationsUser($accId) {
            $query = "SELECT * FROM `notification` WHERE account_id = ? AND reply IS NOT NULL";
            $result = $this->db->doPreparedQuery($query, array($accId));

            return $result;
        }

        public function addNotification($accId, $message) {
            $query = "INSERT INTO `notification`(account_id,`message`) VALUES (?,?)";
            $result = $this->db->doPreparedSql($query, array($accId, $message));

            return $result;
        }
 
    }
?>