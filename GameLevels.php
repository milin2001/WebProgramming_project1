<?php
/*Will ask user for the level they want to play*/

include("GameNavbar.html");
if(isset($_GET['GameStart'])){
    session_reset();
}
?>
<!doctype html>
<html>
<head>
    <link href="titlelogo.PNG" type="image/gif" rel="shortcut icon" />
    <link href="GameBackground.css" rel="stylesheet">
    <title>Hangman</title>
</head>
<body>
<!-- This DIV contains button in the style of form
with 4 different sets of level to be played.-->
<div class="flex-container">
    <div class="row">
        <span class="flex-item">
            <h1>Choose the Level of Difficulty!</h1>
             <form action="GameLevel1.php">
                 <button class= "button" type="submit" name="start">Level 1<br> You got 9 tries!</button>
             </form>
            <form action="GameLevel2.php">
                 <button class= "button" type="submit" name="start">Level 2<br> You got 7 tries!</button>
             </form>
            <form action="GameLevel3.php">
                 <button class= "button" type="submit" name="start">Level 3<br> You got 5 tries!</button>
             </form>
            <form action="GameLevel4.php">
                 <button class= "button" type="submit" name="start">Level 4<br> You got 3 tries!</button>
             </form>
            </span>

    </div>
</div>
</body>
</html>
