<?php
require '../../post.php';

if(isset($_GET['postID'])){
    $post_handler = new PostHandler();
    $post_id = $_GET['postID'];
    $post_handler->deletePost($post_id);
    $result = "Post deleted successfully";
    echo json_encode($result);
}