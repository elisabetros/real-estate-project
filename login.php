<?php
session_start();

if($_SESSION){
    header('location:user-profile.php');
}
(function(){
    if($_POST){
        // is email empty
        if(empty($_POST['txtEmail'])){
            return;
        }
        // is password empty
        if(empty($_POST['txtPassword'])){
            return;
        }
        // is loginType empty
        if(empty($_POST['loginType'])){
            return;
        }
        // check if the loginType is a user or an agent
        // if($_POST['loginType'] ==='user' || $_POST['loginType'] ==='agent'  ){
        //     // $sloginType = $_POST['loginType'];
        //     // echo $_POST['loginType'];
        // }else{
        //     return;
        // }
               // is password right length
        if(strlen($_POST['txtPassword']) < 4 ){
            return;
        }
        // is email valid
        if(!filter_var($_POST['txtEmail'], FILTER_VALIDATE_EMAIL)){
            return;
        }


        //  get data from file
        $sjData = file_get_contents(__DIR__.'/data/'.$_POST['loginType'].'s.json');
        // echo $sjData;
        $jData = json_decode($sjData);
        // // check if user exists
        // $blUserMatch = 0;
        foreach($jData as $jUser){
            if($_POST['txtEmail']=== $jUser->email && $_POST['txtPassword']=== $jUser->password){
                // echo json_encode($jUser);
                unset($jUser->password);
                $_SESSION['user'] = $jUser;
                // echo json_encode($_SESSION['user']);
                header('location:'.$_POST['loginType'].'-profile.php');
                // $blUserMatch = 1;
            }
        }
        // if($blUserMatch == 0){
        //     return;
        // }

    }

})();



$sActive= 'login';
$sPageTitle = 'Login';
require_once(__DIR__.'/components/top.php');

?>

<h1>Welcome to Real Estate</h1>
<h2>Please Login</h2>
<form action="" method="POST" id="frmLogin">
    <label for=""><input type="radio" name="loginType" value="user" required>Log in as a user</label>
    <label for=""><input type="radio" name="loginType" value="agent" required>Log in as a agent</label>
    <label for="">Email<input type="text" name="txtEmail" placeholder="jane@example.com" data-type="email" value="frer@e.com"></label>
    <label for="">Password (min 4 characters)<input type="password" name="txtPassword" placeholder="xxxxxx" data-type="text" data-min="4" minlength="4" value="password"></label>
    <button id="btnLogin">Login</button>
</form>


<script src="js/validate.js"></script>
</body>
</html>