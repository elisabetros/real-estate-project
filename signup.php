
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

<form id="signupForm" action="api/api-create-user.php" method="POST">
    <label for=""><input type="radio" value="user" name="signupType">Signup as a user</label>
    <label for=""><input type="radio" value="agent" name="signupType">Signup as a agent</label>
    <label>Name<input type="text" name="txtName" placeholder="Janice" required minlength="2" maxlength="20">
    <div class="requirements">
      Your name must be between 2 and 20 characters.
    </div></label>
    <label>Email<input type="email" name="txtEmail" placeholder="your@email.com" required>
    <div class="requirements">
      Your email must be in a valid format, example@example.com.
    </div></label>
    <label>Password<input type="password" name="txtPassword" placeholder="xxxxx" required minlength="6">
    <div class="requirements">
      Your password must be at least 6 characters.
    </div></label>
    <button disabled>Signup</button>
</form>
    

<script src="js/app.js"></script>
</body>
</html>