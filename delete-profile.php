<?php
session_start();
if(!$_SESSION){
    header('location:index.php');
}

$sjUsers = file_get_contents(__DIR__.'/data/users.json');
$jUsers = json_decode($sjUsers);

foreach($jUsers as $index => $jUser){
if($_SESSION['user']->id == $jUser->id){
    echo $index;
    echo "delete user! $jUser->name";
    array_splice($jUsers, $index, 1);
    session_destroy();
    header('location:index.php');
}
}

$sjUsers = json_encode($jUsers, JSON_PRETTY_PRINT);
file_put_contents(__DIR__.'/data/users.json', $sjUsers);  