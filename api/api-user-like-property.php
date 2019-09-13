<?php

session_start();
if(!$_SESSION){
    sendError('no user signed in', __LINE__);
}
if($_SESSION['user']->userType !== 'user'){
    sendError('not a user', __LINE__);
}
if(empty($_GET['id'])){
    sendError('no data', __LINE__);
}

$sjProperties = file_get_contents(__DIR__.'/../data/properties.json');
$jProperties = json_decode($sjProperties);
// echo json_encode($jProperties);
$bl=0;

foreach($jProperties as $jProperty){
    if ($_GET['id'] == $jProperty->id){
        array_push( $jProperty->userLikes, $_SESSION['user']->id);
        $bl=1;
       }
}

if($bl==0){
    sendError('no match', __LINE__);
}

// foreach($jUsers as $jUser){
//     if ($_SESSION['user']->id == $jUser->id){
//         $jUser->likedProperties = [];
//         array_push(  $jUser->likedProperties, $_GET['id']);
//         $_SESSION['user'] = $jUser;
//         // echo json_encode($_SESSION['user']);
//     }
// }

$sjProperties = json_encode($jProperties, JSON_PRETTY_PRINT);
file_put_contents( __DIR__.'/../data/properties.json', $sjProperties);
echo '{"status":1, "message": "Property liked", "line":'.__LINE__.'}';




/**************************/

function sendError($message, $line){
    echo '{"status":0, "message":"'.$message.'", "line":"'.$line.'"}';
    exit;
}