<?php
require '../../Post.php';
header('Content-Type: application/json');

if(isset($_SERVER['HTTP_API_KEY']) && $_SERVER['HTTP_API_KEY'] == 111111){

    if(isset($_GET['postID'])){
        $post_handler = new PostHandler();
        $post_id = $_GET['postID'];
        $data = $post_handler->getPost($post_id);
        $data = $data->fetch_assoc();
        $result = array(
            'data' => $data,
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