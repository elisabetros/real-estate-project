<?php

$sUserType = $_POST['signupType'];
$sUserName = $_POST['txtName'];
$sUserEmail = $_POST['txtEmail'];
$sUserPassword = $_POST['txtPassword'];

echo $sUserEmail, $sUserName, $sUserType, $sUserPassword;
$sjData = '';

$jUser=new stdClass();
$jUser->name = $sUserName;
$jUser->email = $sUserEmail;
$jUser->password=$sUserPassword;


$sjData = file_get_contents(__DIR__.'/../data/'.$sUserType.'s.json');

$jData = json_decode($sjData);
array_push($jData, $jUser);
echo json_encode($jData);
$sjData = json_encode($jData, JSON_PRETTY_PRINT);
file_put_contents(__DIR__.'/../data/'.$sUserType.'s.json', $sjData);


