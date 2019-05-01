<?php
require 'Database.php';
class PostHandler{

    private $db_handler;
    
    // Sets the value of DB handler instance in constructor
	function __construct() {
		$this->db_handler = DatabaseHandler::getInstance();
    }
    
    // $title => post title
    // $desc => content of the post
    // $pic_link => link of picture in the post if exist
    // $publisher => user who make the post
    public function makePost($title, $desc, $pic_link, $publisher){
        $sql = "INSERT INTO `c4_post`
                (`p_title`, `p_desc`, `p_picLink`, `p_publisher`)
                VALUES 
                ('$title', '$desc', '$pic_link', '$publisher')";
        $this->db_handler->connect();
        $this->db_handler->execute_query($sql);
        $this->db_handler->disconnect();
    }

    // $post_id => the id of post to edit
    // $desc => new value of content of the post
    // $pic_link => new value of link of picture in the post
    public function editPost($post_id, $desc, $pic_link){
        $sql = "UPDATE `c4_post` 
                SET `p_desc` = '$desc' 
                , `p_picLink` = '$pic_link' 
                WHERE `p_id` = '$post_id' ";
        $this->db_handler->connect();
        $this->db_handler->execute_query($sql);
        $this->db_handler->disconnect();
    }

    // $post_id => the id of post to delete
    public function deletePost($post_id){
        $sql = "DELETE FROM `c4_post` WHERE `p_id` = '$post_id' ";
        $this->db_handler->connect();
        $this->db_handler->execute_query($sql);
        $this->db_handler->disconnect();
    }

    // $post_id => the id of post to get
    public function getPost($post_id){
        $sql = "SELECT * FROM `c4_post` WHERE `p_id` = '$post_id' ";
        $this->db_handler->connect();
        $result = $this->db_handler->execute_query($sql);
        $this->db_handler->disconnect();
        return $result;
    }
}