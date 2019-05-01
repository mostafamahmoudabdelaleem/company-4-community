<?php
require '../../Comment.php';
header('Content-Type: application/json');

if(isset($_SERVER['HTTP_API_KEY']) && $_SERVER['HTTP_API_KEY'] == 111111){
    if(isset($_GET['userID']) && isset($_GET['postID']) && isset($_GET['comment'])){
        $comment_handler = new CommentHandler();
        $comment = $_GET['comment'];
        $userID = $_GET['userID'];
        $postID = $_GET['postID'];
        $comment_handler->makeComment($userID, $postID, $comment);
        $result = array(
            'msg' => "Comment Added successfully",
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
