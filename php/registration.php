<?php 

require_once __DIR__ . "/core/functions/auth.php";  

$formError = false;
$usernameIsValid = false;
$emailIsValid = false;
$passwordsMatch = false;

if(!empty($_POST)){
  $username = htmlspecialchars($_POST['username']);
  $email = htmlspecialchars($_POST['email']);
  $password = htmlspecialchars($_POST['password']);
  $password2 = htmlspecialchars($_POST['password-2']);

  $usernameIsValid = checkUsername($username);
  $emailIsValid = checkEmail($email);
  $passwordsMatch = $password == $password2;

  // var_dump($usernameIsValid);
  // var_dump($emailIsValid);
  // var_dump($passwordsMatch);
}

if($usernameIsValid && $emailIsValid && $passwordsMatch){
  echo "Registered!";
}else{
  $formError = true;
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    
    <title>Registration | PHP</title>
</head>
<body>

<?php require_once "includes/header.php" ?>

<h1>Registration</h1>

<form action="registration.php" method="post">
    <label for="username">Username</label> <br>
    <?php if ($formError && !$usernameIsValid): ?>
        <p style="color: red">Username is taken</p>
    <?php endif; ?>
    <input type="text" name="username" id="username"> <br>

    <label for="email">Email</label> <br>
    <?php if ($formError && !$emailIsValid): ?>
        <p style="color: red">Email is taken</p>
    <?php endif; ?>
    <input type="email" name="email" id="email"> <br>

    <label for="password">Password</label> <br>
    <?php if ($formError && !$passwordsMatch): ?>
        <p style="color: red">passwords doesn't match</p>
    <?php endif; ?>
    <input type="password" name="password" id="password"> <br>

    <label for="password-2">Repeat Password</label> <br>
    <input type="password" name="password-2" id="password-2"> <br>

    <br>

    <input type="submit" value="Register">
</form>



<?php require_once "includes/footer.php" ?>