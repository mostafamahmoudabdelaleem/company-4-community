<?php
require '../../Post.php';
header('Content-Type: application/json');

if(isset($_SERVER['HTTP_API_KEY']) && $_SERVER['HTTP_API_KEY'] == 111111){

    if(isset($_GET['userID'])){
        $post_handler = new PostHandler();
        $user_id = $_GET['userID'];
        $data = $post_handler->getfeed($user_id);
        $c = 0;
        $dataarr = array();
        while($row = $data->fetch_assoc()){
            $dataarr[$c] = $row;
            $c += 1;
        }
        $result = array(
            'data' => $dataarr,
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