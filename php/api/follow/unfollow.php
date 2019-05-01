<?php
require '../../Follow.php';
header('Content-Type: application/json');

if(isset($_SERVER['HTTP_API_KEY']) && $_SERVER['HTTP_API_KEY'] == 111111){
    if(isset($_GET['userID']) && isset($_GET['follow'])){
        $follow_handler = new FollowHandler();
        $follow = $_GET['follow'];
        $userID = $_GET['userID'];
        $follow_handler->unfollow($userID, $follow);
        $result = array(
            'msg' => "User Unfollowed successfully",
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
