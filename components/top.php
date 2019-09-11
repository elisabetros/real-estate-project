<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/style.css">
    <title><?= $sPageTitle;?></title>
</head>
<body>
    <nav>
    <a id="logo"  href="index.php">REAL ESATATE</a>
    <a class="<?= $sActive=='properties'?'active':''; ?>" href="properties.php">Properties</a>  
    <a class="<?= $sActive=='login'?'active':''; ?>" href="login.php">Login</a>
    <!-- <a class="logout" href="logout.php">Logout</a> -->
    <a class="<?= $sActive=='signup'?'active':''; ?>" href="signup.php">Signup</a>
    </nav>

