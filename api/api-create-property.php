<?php
session_start();
if(!$_SESSION){
    sendError('No agent logged in', __LINE__);
}
if($_POST){
    if(empty($_POST['address'])){
        sendError('Address missing', __LINE__);
    }
    if(empty($_POST['price'])){
        sendError('Address missing', __LINE__);
    }
    if(empty($_POST['zip'])){
        sendError('Address missing', __LINE__);
    }
    if(empty($_FILES['image'])){
        sendError('image missing', __LINE__);
    }
    if(!ctype_digit($_POST['price'])){
        sendError('Price invalid', __LINE__);
    }
    $aAllowedExtensions = ['gif', 'jpg', 'jpeg', 'png'];

    $sExtension= pathinfo($_FILES['image']['name'],PATHINFO_EXTENSION);
    $sExtension= strtolower($sExtension); //convert extension to lower case
    if(!in_array($sExtension, $aAllowedExtensions)){ 
        sendError('the file must be an png, gif, jpg or jpeg', __LINE__); 
    }
    //TODO validate length of price, address zip

}

$sUniqueImageName = uniqid();
$imgProperty = $_FILES['image']['tmp_name'];
move_uploaded_file($imgProperty, __DIR__.'/../images/'.$sUniqueImageName.'.'.$sExtension); 
   

// $_SESSION['user']->id = '5d77db766605a';
$sPropertyId = uniqid();


$jProperty = new stdClass();
$jProperty->agent = $_SESSION['user']->id;
$jProperty->address = $_POST['address'];
$jProperty->price = $_POST['price'];
$jProperty->zip = $_POST['zip'];
$jProperty->image = 'image/'.$sUniqueImageName.'.'.$sExtension;
$jProperty->id = $sPropertyId;
$jProperty->marker = new stdClass();
$jProperty->marker->geometry = new stdClass();
$jProperty->marker->geometry->coordinates = [12.566515, 55.705193];
$jProperty->marker->geometry->type = "Point";
$jProperty->marker->type = "Feature";


// echo substr($jProperty->image,4,2 );
// echo json_encode($jProperties)


$sjProperties = file_get_contents(__DIR__.'/../data/properties.json');
$jProperties = json_decode($sjProperties);
// echo $sjProperties;

array_push($jProperties, $jProperty);
echo json_encode($jProperties);

$sjProperties = json_encode($jProperties, JSON_PRETTY_PRINT);
file_put_contents(__DIR__.'/../data/properties.json', $sjProperties);


echo $jProperties;


/****************/

function sendError($message, $line){
    echo '{"status":0, "message": '.$message.', "line":'.$line.'}';
    exit;
}