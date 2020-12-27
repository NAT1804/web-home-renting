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
            $query = "SELECT * FROM `notification` WHERE account_id = ? AND reply IS NOT NULL ORDER BY reply_at DESC";
            $result = $this->db->doPreparedQuery($query, array($accId));

            return $result;
        }

        public function addNotificationToAdmin($accId, $postId, $message, $type) {
            $query = "INSERT INTO `notification`(account_id,post_id,`message`,type) VALUES (?,?,?,?)";
            $result = $this->db->doPreparedSql($query, array($accId, $postId, $message, $type));

            return $result;
        }

        public function sendNotificationToUser($accId, $postId, $reply, $type) {
            if ($postId == null) {
                $query = "UPDATE notification SET reply = ?, reply_at = NOW() WHERE account_id = ? AND type = ? AND post_id is ?";
            } else {
                $query = "UPDATE notification SET reply = ?, reply_at = NOW() WHERE account_id = ? AND type = ? AND post_id = ?";
            }
            $result = $this->db->doPreparedSql($query, array($reply, $accId, $type, $postId));

            return $result;
        }
 
    }
?>