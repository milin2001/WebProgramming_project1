<!-- This is the login page-->
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8"/>
    <title>Hangman Login!</title>
    <link href="titlelogo.PNG" type="image/gif" rel="shortcut icon" />
    <link rel="stylesheet" href="GameBackground.css"/>
    <link rel="stylesheet" href="GameLoginInterface.css"/>
</head>
<body>
<h1 class="titles">Welcome to Hangman Game!</h1>
<?php
    require('GameDatabase.php');
    session_start();
    // Validate submitted form, if correct create user session.
    if (isset($_POST['username'])) {
        $username = stripslashes($_REQUEST['username']);
        $username = mysqli_real_escape_string($con, $username);
        $password = stripslashes($_REQUEST['password']);
        $password = mysqli_real_escape_string($con, $password);
        // Validate if user info is in the database
        $query    = "SELECT * FROM `users` WHERE username='$username'
                     AND password='" . md5($password) . "'";
        $result = mysqli_query($con, $query) or die(mysql_error());
        $rows = mysqli_num_rows($result);
        if ($rows == 1) {
            $_SESSION['username'] = $username;
            // This will take you to the game homepage
            header("Location: GameHomepage.php");
        } else {
            echo "<div class='form'>
                  <h3>Incorrect Username/password.</h3><br/>
                  <p class='link'>Click here to <a href='login.php'>Login</a> again.</p>
                  </div>";
        }
    } else {
?>
            <!-- This is the form where user will input his/her information-->
    <form class="form" method="post" name="login">
        <h1 class="login-title">Login Now!</h1>
        <input type="text" class="login-input" name="username" placeholder="Enter username" required autofocus="true"/>
        <input type="password" class="login-input" name="password" placeholder="Enter password" required/><br>
        <input type="submit" value="Login" name="submit" class="login-button"/>
        <p class="link">Don't have an account? <a href="Signup.php">Register Here!</a></p>
  </form>
<?php
    }
?>
</body>
</html>
