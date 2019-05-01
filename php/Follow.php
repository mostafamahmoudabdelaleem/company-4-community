<?php
require 'Database.php';
class FollowHandler{

    private $db_handler;
    
    // Sets the value of DB handler instance in constructor
	function __construct() {
		$this->db_handler = DatabaseHandler::getInstance();
    }

    // $userID the id of user who make follow
    // $follow the id of the user to follow
    public function follow($userID, $follow){
        $sql = "INSERT INTO `c4_follow` VALUES ('$userID', '$follow')";
		$this->db_handler->connect();
        $this->db_handler->execute_query($sql);
        $this->db_handler->disconnect();
    }

    // $userID the id of user who make unfollow
    // $follow the id of the user to unfollow
    public function unfollow($userID, $follow){
        $sql = "DELETE FROM `c4_follow` WHERE `f_user` = '$userID' AND `f_follow` = '$follow';";
		$this->db_handler->connect();
        $this->db_handler->execute_query($sql);
        $this->db_handler->disconnect();
    }
}