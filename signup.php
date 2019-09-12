<?php
session_start();
if($_SESSION){
    header('location:user-profile.php');
}
(function(){
    if($_POST){
        //is name emptu
        if(empty($_POST['txtName'])){
            return;
        }
        // is email empty
        if(empty($_POST['txtEmail'])){
            return;
        }
        // is password empty
        if(empty($_POST['txtPassword'])){
            return;
        }
        // is signuptype empty
        if(empty($_POST['signUpType'])){
            return;
        }
        // check if the signUpType is a user or an agent
        if($_POST['signUpType'] ==='users' || $_POST['signUpType'] ==='agents'  ){
            // $sSignUpType = $_POST['signUpType'];
        }else{
            return;
        }
        // is name right length
        if(strlen($_POST['txtName'])<2 || strlen($_POST['txtName'])>20){
            return;
        }
        // is password right length
        if(strlen($_POST['txtPassword'])<4 ){
            return;
        }
        // is email valid
        if(!filter_var($_POST['txtEmail'], FILTER_VALIDATE_EMAIL)){
            return;
        }
        $jUser = new stdClass();
        $jUser->name =strtolower($_POST['txtName']);
        $jUser->email = strtolower($_POST['txtEmail']);
        $jUser->password = $_POST['txtPassword'];
        $jUser->id = uniqid();
        $jUser->userType = $_POST['signUpType'];
        // echo json_encode($jUser);
        //  get data from file
        $sjData = file_get_contents(__DIR__.'/data/users.json');
        // echo $sjData;
        $jData = json_decode($sjData);
        // add new data from form in data object
        array_push($jData, $jUser);
        // echo json_encode($jData);
        $sjData = json_encode($jData, JSON_PRETTY_PRINT);
        // put all data in file
        file_put_contents(__DIR__.'/data/users.json', $sjData);
        // echo $sjData;
        // start session for the new user?
        //TODO send welcoming email
        // redirect to profile
    }
})();



$sActive= 'signup';
$sPageTitle = 'Signup';
require_once(__DIR__.'/components/top.php');

?>

<h1>Welcome to Real Estate</h1>
<h2>Please signup</h2>
<form method="POST" id="frmSignup">
    <label for=""><input type="radio" name="signUpType" value="users" required>Sign up as a user</label>
    <label for=""><input type="radio" name="signUpType" value="agents" required>Sign up as a agent</label>
    <label for="">Name (2 to 20 characters)
        <input type="text" name="txtName" placeholder="Jane" maxlength="20" minlength="2" data-type="text" >
        <div class="requirements">Name must be 2 to 20 characthers</div>
    </label>
    <label for="">Email
        <input type="text" name="txtEmail" placeholder="jane@example.com" data-type="email" value="jane@jane.com">
        <div class="requirements">Email must be at least 1 charachter, include @ a . and a domain name</div>
    </label>
    <label for="">Password (min 4 characters)
        <input type="password" name="txtPassword" placeholder="xxxxxx" data-type="text" data-min="4" minlength="4" value="123455">
        <div class="requirements">Password must be mininum 4 characters</div>
    </label>
    <button id="btnSignup">Signup</button>
</form>


    <script src="js/validate.js"></script>
</body>
</html>