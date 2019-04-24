<?php
require 'Database.php';
class Post{

    private $db_handler = DatabaseHandler->getInstance();

    // $title => post title
    // $desc => content of the post
    // $pic_link => link of picture in the post if exist
    // $publisher => user who make the post
    public function makePost($title, $desc, $pic_link, $publisher){
        $sql = "INSERT INTO `POST`
                (`p_title`, `p_desc`, `p_pic_link`, `p_publisher`)
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
        $sql = "UPDATE `POST` 
                SET `p_desc` = '$desc' 
                AND `p_pic_link` = '$pic_link' 
                WHERE `p_id` = '$post_id' ";
        $this->db_handler->connect();
        $this->db_handler->execute_query($sql);
        $this->db_handler->disconnect();
    }

    // $post_id => the id of post to delete
    public function deletePost($post_id){
        $sql = "DELETE FROM `POST` WHERE `p_id` = '$post_id' ";
        $this->db_handler->connect();
        $this->db_handler->execute_query($sql);
        $this->db_handler->disconnect();
    }
}