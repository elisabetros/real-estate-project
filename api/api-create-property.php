<?php
session_start();
if(!$_SESSION){
    sendError('No agent logged in', __LINE__);
}
if($_POST){
    if(empty($_POST['txtAddress'])){
        sendError('Address missing', __LINE__);
    }
    if(empty($_POST['txtPrice'])){
        sendError('Address missing', __LINE__);
    }
    if(empty($_POST['txtZip'])){
        sendError('Address missing', __LINE__);
    }
    if(empty($_FILES['image'])){
        sendError('image missing', __LINE__);
    }
    if(!ctype_digit($_POST['txtPrice'])){
        sendError('Price invalid', __LINE__);
    }
    $aAllowedExtensions = ['gif', 'jpg', 'jpeg', 'png'];
foreach($_FILES as $aImageFile){
    $sExtension= pathinfo($aImageFile['name'],PATHINFO_EXTENSION);
    $sExtension= strtolower($sExtension); //convert extension to lower case
    if(!in_array($sExtension, $aAllowedExtensions)){ 
        sendError('the file must be an png, gif, jpg or jpeg', __LINE__); 
    }
    //TODO validate length of price, address zip
}
}

// foreach($_FILES as $aImageFile){
    $sExt=  pathinfo($aImageFile['name'])['extension']; // gets the extension of a file
    $imgProperty = $aImageFile['tmp_name'];
    move_uploaded_file($imgProperty, __DIR__.'/../images/'.$aImageFile['name']); 
    // }

$_SESSION['user']->id = '5d77fc609e013';

$jProperty = new stdClass();
$jProperty->agent = $_SESSION['user']->id;
$jProperty->address = $_POST['txtAddress'];
$jProperty->price = $_POST['txtPrice'];
$jProperty->zip = $_POST['txtZip'];
$jProperty->image = 'image/'.$_FILES['image']['name'];

// echo json_encode($jProperties);
// echo $_FILES['image']['name'];


$sjProperties = file_get_contents(__DIR__.'/../data/properties.json');
$jProperties = json_decode($sjProperties);
// echo $sjProperties;

array_push($jProperties, $jProperty);
echo json_encode($jProperties);

$sjProperties = json_encode($jProperties, JSON_PRETTY_PRINT);
file_put_contents(__DIR__.'/../data/properties.json', $sjProperties);





/****************/

function sendError($message, $line){
    echo '{"status":0, "message": '.$message.', "line":'.$line.'}';
    exit;
}