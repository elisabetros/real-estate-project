<?php

session_start();
if(!$_SESSION){
    sendError('no one logged in', __LINE__);
}
if($_SESSION['user']->userType != 'agent'){
    sendError('no agent logged in', __LINE__);
}
if(!$_GET){
    sendError('nothing to delete', __LINE__);
}

$sjProperties = file_get_contents(__DIR__.'/../data/properties.json');
$jProperties = json_decode($sjProperties);
// echo $sjProperties;

foreach($jProperties as $index =>  $jProperty){
    if($_SESSION['user']->id === $jProperty->agent){
        if($_GET['id']== $jProperty->id){
            // $image = file_get_contents(__DIR__.'/'.$jProperty->image);
            unlink(__DIR__.'/../'.$jProperty->image);
            // echo json_encode($jProperties[$u]);
            echo $jProperty->address;
            array_splice($jProperties, $index, 1);
            // header('location:profile.php');
        }
    }
}


$sjProperties = json_encode($jProperties, JSON_PRETTY_PRINT);
file_put_contents(__DIR__.'/../data/properties.json', $sjProperties);  



/*************************/
function sendError($message, $line){
    echo '{"status":0, "message":"'.$message.'", "line":"'.$line.'"}';
    exit;
}
