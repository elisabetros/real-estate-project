<?php

session_start();
if(!$_SESSION){
    sendError('no one signed in', __LINE__);
}
if($_SESSION['user']->userType != 'agent'){
    sendError('no agent logged in', __LINE__);
}
if(empty($_POST['id'])){
    sendError('no property to update', __LINE__);
} 
if(empty($_POST['newPrice'])){
    sendError('no price', __LINE__);
} 
if(empty($_POST['newAddress'])){
    sendError('no Address', __LINE__);
}
if(empty($_POST['newZip'])){
    sendError('no Zip', __LINE__);
}
if(!ctype_digit($_POST['newPrice'])){
    sendError('Price invalid', __LINE__);
}
if(!ctype_digit($_POST['newZip'])){
    sendError('Zip invalid', __LINE__);
}
if(strlen($_POST['newZip'])!= 4){
    sendError('zip length wrong', __LINE__);
}
if(strlen($_POST['newAddress'])<2 ||strlen($_POST['newAddress'])>50){
    sendError('invalid address', __LINE__);
}
if(strlen($_POST['newPrice'])<2 ||strlen($_POST['newPrice'])>9999999999999 ){
    sendError('Price invalid', __LINE__);
}

$sjProperties = file_get_contents(__DIR__.'/../data/properties.json');
$jProperties = json_decode($sjProperties);

foreach($jProperties as $jProperty){
    if($_POST['id'] == $jProperty->id){
        $jProperty->address = strtolower($_POST['newAddress']);
        $jProperty->zip = $_POST['newZip'];
        $jProperty->price =$_POST['newPrice'];
        // echo json_encode($jProperty);
    }
}
// echo json_encode($jProperties);

$sjProperties = json_encode($jProperties, JSON_PRETTY_PRINT);
file_put_contents(__DIR__.'/../data/properties.json', $sjProperties);

echo '{"status":1, "message":"update complete", "line":"'.__LINE__.'"}';






/**************************/

function sendError($message, $line){
    echo '{"status":0, "message":"'.$message.'", "line":"'.$line.'"}';
    exit;
}  