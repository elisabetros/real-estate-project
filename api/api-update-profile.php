<?php

session_start();
if(!$_SESSION){
    sendError('no user signed in', __LINE__);
}
if(empty($_POST['newEmail']) || empty($_POST['newName'])){
    sendError('no data', __LINE__);
}
if(!filter_var($_POST['newEmail'], FILTER_VALIDATE_EMAIL )){
    sendError('invalid email', __LINE__);
}
if(strlen($_POST['newName'])<2 ||strlen($_POST['newName'])>20){
    sendError('invalid name', __LINE__);
}

$sjUsers = file_get_contents(__DIR__.'/../data/users.json');
$jUsers = json_decode($sjUsers);

foreach($jUsers as $jUser){
    if($_SESSION['user']->id == $jUser->id){
        $jUser->name = strtolower($_POST['newName']);
        $jUser->email = strtolower( $_POST['newEmail']);
        echo json_encode($jUser);
        $_SESSION['user'] = $jUser;
    }
}
// echo json_encode($jUsers);

$sjUsers = json_encode($jUsers, JSON_PRETTY_PRINT);
file_put_contents(__DIR__.'/../data/users.json', $sjUsers);






/**************************/

function sendError($message, $line){
    echo '{"status":0, "message":"'.$message.'", "line":"'.$line.'"}';
    exit;
}