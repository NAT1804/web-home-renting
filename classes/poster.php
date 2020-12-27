<?php 
    $file_path = realpath(dirname(__FILE__));
    include_once ($file_path.'/../lib/database.php');
    include_once ($file_path.'/../helpers/format.php');
    include_once "notification.php";
?>

<?php 
    class Poster
    {
        private $db;
        private $fm;
        private $noti;

        public function __construct()
        {
            $this->db = new Database();
            $this->fm = new Format();
            $this->noti = new Notification();
        }

        public function showPostersActive() {
        	$query = "SELECT * FROM account WHERE role = ? ORDER BY account_id DESC";
        	$result = $this->db->doPreparedQuery($query, array(1));

            return $result;
        }

        public function showPostersNonActive() {
            $query = "SELECT * FROM account WHERE request = ? ORDER BY account_id DESC";
            $result = $this->db->doPreparedQuery($query, array(1));

            return $result;
        }

        public function acceptPoster($accId) {
            $query = "UPDATE account SET role = ?, request = ? WHERE account_id = ?";
            $result = $this->db->doPreparedSql($query, array(1, 0, $accId));

            $reply = "Tài khoản #".$accId." được duyệt có thể đăng bài.";
            $type = "A";
            $postId = null;
            $this->noti->sendNotificationToUser($accId, $postId, $reply, $type);
            return $result;
        }

  
    }
?>