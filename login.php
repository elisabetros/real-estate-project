<?php
session_start();
if($_SESSION){
    header('location:profile.php');
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
        // if($_POST['loginType'] !='user' || $_POST['loginType'] !='agent'  ){
        //      return;
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
        $sjData = file_get_contents(__DIR__.'/data/users.json');
        // echo $sjData;
        $jData = json_decode($sjData);
        // // check if user exists
        $blUserMatch = 0;
        foreach($jData as $jUser){
            if($_POST['txtEmail']=== $jUser->email && $_POST['txtPassword']=== $jUser->password){
                // echo json_encode($jUser);
                unset($jUser->password);
                $_SESSION['user'] = $jUser;
                // echo json_encode($_SESSION['user']);
                header('location:profile.php');
                return;
                $blUserMatch = 1;
            }
        }
      
    }
})();

$sActive= 'login';
$sPageTitle = 'Login';
require_once(__DIR__.'/components/top.php');
?><div id="loginPage">
    <div class="formContainer">
<h1>Welcome to Horizon Homes</h1>
<h2>Please Login</h2>
<form action="" method="POST" id="frmLogin">
    <label class="radioLabel"><input type="radio" name="loginType" value="user" required>Log in as a user</label>
    <label class="radioLabel"><input type="radio" name="loginType" value="agent" required>Log in as a agent</label>
    <label for="">Email
        <input type="text" name="txtEmail" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$" placeholder="jane@example.com"  value="frer@e.com" required>
        <div class="requirements">Email must be at least 1 charachter, include @ a . and a domain name</div>
    </label>
    <label for="">Password (min 4 characters)
        <input type="password" name="txtPassword" placeholder="xxxxxx"  minlength="4" value="password" required>
        <div class="requirements">Password must be mininum 4 characters</div>
    </label>
    <button id="btnLogin" disabled>Login</button>
</form>
</div>

</div>

<?php
  if($blUserMatch===0){
    echo '
    <div class="modalsShown">
    <div class="modalContent">
        <h1>Wrong Login</h1>
        </div>
    </div>
    ';
}
?>
<script src="js/validate.js"></script>
</body>
</html>