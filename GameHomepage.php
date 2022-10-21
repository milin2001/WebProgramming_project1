<?php /*Homepage of the game */
include("auth_session.php");
include("GameNavbar.html");
?>
<?php
session_reset();
?>
<!doctype html>
<html>
<head>
    <link href="titlelogo.PNG" type="image/gif" rel="shortcut icon" />
    <link href="GameBackground.css" rel="stylesheet">
    <title>Hangman</title>

</head>
<body>
<div class="flex-container">
    <div class="row">
        <span class="flex-item">
            <h1>Welcome to Hangman Game!</h1>
            <form action="GameLevels.php">
                 <button class= "button">Let's Play!</button>
            </form>
        </span>
    </div>
</div>
</body>
</html>
