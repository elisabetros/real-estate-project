
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/style.css">
    <title>Signup</title>
</head>
<body>

<form action="api/api-create-user.php" method="POST">
    <label for=""><input type="radio" value="user" name="signupType">Signup as a user</label>
    <label for=""><input type="radio" value="agent" name="signupType">Signup as a agent</label>
    <label>Name<input type="text" name="txtName" placeholder="Your Name"></label>
    <label>Email<input type="email" name="txtEmail" placeholder="Your Email"></label>
    <label>Password<input type="password" name="txtPassword" placeholder="Your Password"></label>
    <button>Signup</button>
</form>
    


</body>
</html>