<?php

$sSearchFor = $_POST['search'] ??'' ;  //the users input 2400

if(empty($sSearchFor) && $sSearchFor!=='0'){    // isset($sSearchFor)
        echo '[]';
        exit;
}

$addresses = [];
$sjProperties = file_get_contents(__DIR__.'/../data/properties.json');
$jProperties = json_decode($sjProperties);
$matches = [];

foreach($jProperties as $jProperty){
    // echo $jProperty->address;
    if(strpos($jProperty->zip, $sSearchFor)!==false){
        array_push($matches, $jProperty->zip);
    }
    // if(strpos($jProperty->address, strtoLower($sSearchFor))!==false){
    //     array_push($addresses, $jProperty->address);
    // }
}
echo json_encode($matches);




