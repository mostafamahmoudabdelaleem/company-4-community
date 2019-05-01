<?php
require '../../Voting.php';
header('Content-Type: application/json');

if(isset($_SERVER['HTTP_API_KEY']) && $_SERVER['HTTP_API_KEY'] == 111111){
    if(isset($_GET['userID']) && isset($_GET['postID'])){
        $vote_handler = new VotingHandler();
        $postID = $_GET['postID'];
        $userID = $_GET['userID'];
        $vote_handler->like($postID, $userID);
        $result = array(
            'msg' => "Liked successfully",
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
