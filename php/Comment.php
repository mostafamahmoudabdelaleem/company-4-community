<?php
require 'Database.php';
class CommentHandler{

    private $db_handler;
    
    // Sets the value of DB handler instance in constructor
	function __construct() {
		$this->db_handler = DatabaseHandler::getInstance();
    }

    // $user the id of user who make comment
    // $post the id of post which user comment to
    // $comment the actual text of comment
    public function makeComment($user, $post, $comment){
        $sql = "INSERT INTO `c4_comment` 
            (`c_text`, `c_postid`, `c_userid`) 
            VALUES 
            ('$comment', '$post', '$user');";
        $this->db_handler->connect();
        $this->db_handler->execute_query($sql);
        $this->db_handler->disconnect();
    }

    // $id the id of comment to edit
    // $comment the actual text of comment
    public function editComment($id, $comment){
        $sql = "UPDATE `c4_comment` SET `c_text` = '$comment' WHERE `c_id` = '$id';";
        $this->db_handler->connect();
        $this->db_handler->execute_query($sql);
        $this->db_handler->disconnect();
    }

    // $id the id of comment to delete
    public function deleteComment($id){
        $sql = "DELETE FROM `c4_comment` WHERE `c_id` = '$id';";
        $this->db_handler->connect();
        $this->db_handler->execute_query($sql);
        $this->db_handler->disconnect();
    }
}