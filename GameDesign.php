<?php
// This is for the creation of the UI for the game.
// This is what user looks at while playing the game.
?>
<!DOCTYPE html>

<html>
<head>
    <meta charset="UTF-8">
    <link href="titlelogo.PNG" type="image/gif" rel="shortcut icon" />
    <link href="GameBackground.css" rel="stylesheet">
    <link href="GameInterface.css" rel="stylesheet">
    <title>Hangman Game</title>
</head>
<body>
<h1 class="gameHeader"> Hangman Game!</h1>
<!-- Screen display looks like -->
<div class="displaystyle">

    <!-- Shows the images for the hangman over here -->
    <div class="box">
        <img class="hangingStyle" src="<?php echo getPhoto(getCurrentBody());?>"/>
        <p class="clue">Clue: <?php $word1 = getCurrentTerm();
            $index = array_search($word1, $answers);
            echo $clue[$index]; ?></p>
        <!-- Shows if the game is finished or not -->
        <?Php if(gameFinished()):?>
            <h1>GAME OVER!</h1>
        <?php endif;?>
        <!-- If user won the following text will be displayed -->
        <?php if($Win  && gameFinished()):?>
            <p class="win">Congratulations! You are the Savior!</p>
            <!-- If user lost the following text will be displayed -->
        <?php elseif(!$Win  && gameFinished()): ?>
            <p class="lose">Damn! You Killed Me!</p>
        <?php endif;?>
    </div>
    <div class="letterpop">
        <!-- This will help the letters to pop on the screen if the user guesses the letter correctly -->
        <?php
        $predict = getCurrentTerm();
        $maxAlpha = strlen($predict) - 1;
        for($j=0; $j<= $maxAlpha; $j++): $l = getCurrentTerm()[$j]; ?>
            <?php if(in_array($l, getCurrentGuess())):?>
                <span class="letterguess"><?php echo $l;?></span>
            <?php else: ?>
                <span class="letterguess">&nbsp;&nbsp;&nbsp;</span>
            <?php endif;?>
        <?php endfor;?>
    </div>
 <!-- Design for the layout of the alphabets on the screen-->
    <div class="key_layout">
        <div>
            <form method="get">
                <?php
                $max = strlen($alphabets) - 1;
                for($i=0; $i<= $max; $i++){
                    echo "<button class='letterbutton' type='submit' name='keyPress' value='". $alphabets[$i] . "'>".
                        $alphabets[$i] . "</button>";
                    if ($i % 26 == 0 && $i>0) {
                        echo '<br>';
                    }

                }
                ?>
                <br><br>
                <!-- Restart button for Game -->
                <button class="button" type="submit" name="start">Restart Game</button>
            </form>
        </div>
    </div>
</div>
</body>
</html>