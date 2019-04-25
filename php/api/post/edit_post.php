<?php
require '../../post.php';

if(isset($_GET['desc']) && isset($_GET['picLink']) && isset($_GET['postID'])){
    $post_handler = new PostHandler();
    $desc = $_GET['desc'];
    $pic_link = $_GET['picLink'];
    $post_id = $_GET['postID'];
    $post_handler->editPost($title, $desc, $pic_link, $publisher);
    $result = "Post edited successfully";
    echo json_encode($result);
}