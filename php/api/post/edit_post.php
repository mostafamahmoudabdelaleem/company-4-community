<?php
require '../../Post.php';
header('Content-Type: application/json');

if(isset($_SERVER['HTTP_API_KEY']) && $_SERVER['HTTP_API_KEY'] == 111111){

    if(isset($_GET['desc']) && isset($_GET['picLink']) && isset($_GET['postID'])){
        $post_handler = new PostHandler();
        $desc = $_GET['desc'];
        $pic_link = $_GET['picLink'];
        $post_id = $_GET['postID'];
        $post_handler->editPost($post_id, $desc, $pic_link);
        $result = array(
            'msg' => "Post edited successfully",
            'code' => 200
        );
        echo json_encode($result);
    }else{
        $result = array(
            'msg' => "Bad Request",
            'code' => 403
        );
        echo json_encode($result);
    }
}else{
    $result = array(
        'msg' => "Bad Authentications",
        'code' => 402
    );
    echo json_encode($result);
}