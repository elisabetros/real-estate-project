<?php

session_start();
if(!$_SESSION){
    header('location:index.php');
}
if(!$_GET){
    header('location:profile.php');
}
$sjProperties = file_get_contents(__DIR__.'/data/properties.json');
$jProperties = json_decode($sjProperties);
// echo $sjProperties;

foreach($jProperties as $index =>  $jProperty){
    if($_SESSION['user']->id === $jProperty->agent){
        if($_GET['id']== $jProperty->id){
            // echo json_encode($jProperties[$u]);
            echo "property: $jProperty->address deleted";
            array_splice($jProperties, $index, 1);
            header('location:profile.php');
        }
    }
}


$sjProperties = json_encode($jProperties, JSON_PRETTY_PRINT);
file_put_contents(__DIR__.'/data/properties.json', $sjProperties);  



/*************************/

