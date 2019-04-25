<?php
require '../../post.php';

if(isset($_GET['postID'])){
    $post_handler = new PostHandler();
    $post_id = $_GET['postID'];
    $result = $post_handler->getPost($post_id);
    echo json_encode($result);
}