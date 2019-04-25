<?php
require '../../post.php';

if(isset($_GET['title']) && isset($_GET['desc']) 
        && isset($_GET['picLink']) && isset($_GET['publisher'])){
    $post_handler = new PostHandler();
    $title = $_GET['title'];
    $desc = $_GET['desc'];
    $pic_link = $_GET['picLink'];
    $publisher = $_GET['publisher'];
    $post_handler->makePost($title, $desc, $pic_link, $publisher);
    $result = "Post created successfully";
    echo json_encode($result);
}