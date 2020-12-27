<?php 
    $file_path = realpath(dirname(__FILE__));
    include_once ($file_path.'/../lib/database.php');
    include_once ($file_path.'/../helpers/format.php');
?>

<?php 
	class Comment
	{
		private $db;
        private $fm;
		
		public function __construct()
		{
			$this->db = new Database();
            $this->fm = new Format();
		}

		public function getCommentsOfPost($postId) {
			$query = "SELECT r.*, a.username FROM rate r INNER JOIN account a ON a.account_id = r.account_id WHERE r.post_id = ?";
			$result = $this->db->doPreparedQuery($query, array($postId));
			return $result;
		}

		public function addComment($postId, $accId, $comment, $rating) {
			$query = "INSERT INTO rate(post_id,account_id,comment,rating) VALUES (?,?,?,?)";
			$result = $this->db->doPreparedSql($query, array($postId, $accId, $comment, $rating));

			return $result;
		}
	}
?>