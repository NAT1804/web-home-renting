<?php 
    $file_path = realpath(dirname(__FILE__));
    include_once ($file_path.'/../lib/database.php');
    include_once ($file_path.'/../helpers/format.php');
    include_once "notification.php";
?>

<?php 
	class Comment
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

		public function getCommentsOfPost($postId) {
			$query = "SELECT r.*, a.username FROM rate r INNER JOIN account a ON a.account_id = r.account_id WHERE r.post_id = ? AND r.status = 1";
			$result = $this->db->doPreparedQuery($query, array($postId));
			return $result;
		}

		public function addComment($postId, $accId, $comment, $rating) {
			$query = "INSERT INTO rate(post_id,account_id,comment,rating) VALUES (?,?,?,?)";
			$result = $this->db->doPreparedSql($query, array($postId, $accId, $comment, $rating));

			$message = "Tài khoản #".$accId." đánh giá bài viết #".$postId;
			$type = "C";
			$this->noti->addNotificationToAdmin($accId, $postId, $message, $type);
			$alert = "<span id='success'>Thêm comment thành công sẽ hiển thị khi được Admin kiểm duyệt.</span>";
			return $alert;
		}

		public function getComments() {
			$query = "SELECT r.*, a.username FROM rate r INNER JOIN account a ON a.account_id = r.account_id ORDER BY rate_id DESC";
			$result = $this->db->doPreparedQuery($query, array());
			return $result; 
		}

		public function deleteComment($rateId){
			$query = "DELETE FROM rate WHERE rate_id = ?";
			$result = $this->db->doPreparedSql($query, array($rateId));

			if (!empty($result)) {
				$alert = "<span id='success'>Xóa bình luận thành công.</span>";
				return $alert;
			} else {
				$alert = "<span id='error'>Xóa bình luận thất bại.</span>";
				return $alert;
			}
		}

		public function acceptComment($rateId) {
			$query = "UPDATE rate SET status = ?, rep_at = NOW() WHERE rate_id = ?";
			$result = $this->db->doPreparedSql($query, array(1, $rateId));

			if (!empty($result)) {
				$query1 = "SELECT * FROM rate WHERE rate_id = ?";
				$result1 = $this->db->doPreparedQuery($query1, array($rateId));
				$reply = "Đã duyệt bình luận ở bài viết #".$result1[0]['post_id'];
				$type = "C";
				$this->noti->sendNotificationToUser($result1[0]['account_id'], $result1[0]['post_id'], $reply, $type);
				$alert = "<span id='success'>Duyệt bình luận thành công.</span>";
				return $alert;
			} else {
				$alert = "<span id='error'>Duyệt bình luận thất bại.</span>";
				return $alert;
			}
		}

	}
?>