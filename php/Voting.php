<?php 
require 'Database.php';
class VotingHandler{

	private $db_handler;

	// Sets the value of DB handler instance in constructor
	function __construct() {
		$this->db_handler = DatabaseHandler::getInstance();
	}
	
	// $postID the id of post user likes
	// $userID the id of user who make like
	public function like($postid, $userid)
	{
		$sql = "INSERT INTO `c4_voting`(`v_user`, `v_post`, `v_type`) VALUES ('$userid', '$postid', 1)";
		$this->db_handler->connect();
        $this->db_handler->execute_query($sql);
        $this->db_handler->disconnect();
	}

	// $postID the id of post user dislikes
	// $userID the id of user who make dislike
	public function dislike($postid, $userid)
	{
		$sql = "INSERT INTO `c4_voting`(`v_user`, `v_post`, `v_type`) VALUES ('$userid', '$postid', 0)";
		$this->db_handler->connect();
        $this->db_handler->execute_query($sql);
        $this->db_handler->disconnect();
	}

	// $postID the id of post
	// $userID the id of user
	public function remove_vote($postid, $userid)
	{
		$sql = "DELETE FROM `c4_voting` WHERE (`v_user` = '$userid' AND `v_post` = '$postid'))";
		$this->db_handler->connect();
        $this->db_handler->execute_query($sql);
        $this->db_handler->disconnect();
	}
}