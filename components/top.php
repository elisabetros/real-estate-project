<?php
session_start();
if($_SESSION){
    $sMenuTitle = 'Profile';
}else{
    $sMenuTitle = 'Login';
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/style.css">
    <?php
        if($sPageTitle == 'Properties'){
            echo "
            <script src='https://api.mapbox.com/mapbox-gl-js/v1.2.0/mapbox-gl.js'></script>
            <link href='https://api.mapbox.com/mapbox-gl-js/v1.2.0/mapbox-gl.css' rel='stylesheet' />
            ";
        }
    ?>
   
 
    <title><?= $sPageTitle;?></title>
</head>
<body>
    <nav>
    <a id="logo"  href="index.php">REAL ESATATE</a>
    <a class="<?= $sActive=='properties'?'active':''; ?>" href="properties.php">Properties</a>  
    <a class="<?= $sActive=='login'?'active':''; ?>" href="<?=strtolower($sMenuTitle)?>.php"><?=$sMenuTitle?></a>
    <a class="<?= $sActive=='contact-us'?'active':''; ?>" href="contact-us.php">Contact Us</a>
    <!-- <a class="logout" href="logout.php">Logout</a> -->
    <a class="<?= $sActive=='signup'?'active':''; ?>" href="signup.php">Signup</a>
    </nav>

