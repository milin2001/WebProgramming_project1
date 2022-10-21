<!-- This page is for new user to signup to play the game-->
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8"/>
    <link href="titlelogo.PNG" type="image/gif" rel="shortcut icon" />
    <title>Hangman sign-up!</title>
    <link rel="stylesheet" href="GameBackground.css"/>
    <link rel="stylesheet" href="GameLoginInterface.css"/>
</head>
<body>
<h1 class="titles">Welcome to Hangman Game!</h1>
<?php
    require('GameDatabase.php');
    // When user inputs his information this will help it to get into the database
    if (isset($_REQUEST['username'])) {

        $username = stripslashes($_REQUEST['username']);
        $username = mysqli_real_escape_string($con, $username);
        $password = stripslashes($_REQUEST['password']);
        $password = mysqli_real_escape_string($con, $password);
        //The query to insert the user information into the database
        $query    = "INSERT into `users` (username, password)
                     VALUES ('$username', '" . md5($password) . "')";
        $result   = mysqli_query($con, $query);
        if ($result) {
            echo "<div class='form'>
                  <h3>You are registered successfully.</h3><br/>
                  <p class='link'>Click here to <a href='login.php'>Login</a></p>
                  </div>";
        } else {
            echo "<div class='form'>
                  <h3>Required fields are missing.</h3><br/>
                  <p class='link'>Click here to <a href='Signup.php'>registration</a> again.</p>
                  </div>";
        }
    } else {
?>
    <form class="form" action="" method="post">
        <h1 class="login-title">Sign-up Here!</h1>
        <input type="text" class="login-input" name="username" placeholder="Enter your username" required /><br>
        <input type="password" class="login-input" name="password" placeholder="Enter your password" required><br>
        <input type="submit" name="submit" value="Register" class="login-button">
        <p class="link">Already have an account? <a href="login.php">Login!</a></p>
    </form>
<?php
    }
?>
</body>
</html>
