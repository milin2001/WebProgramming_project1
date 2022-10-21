<?php
// This file contains the php code for the game
include("GameNavbar.html");
error_reporting(error_level: 0);
include("Gamefunction.php");
$alphabets = "ABCDEFGHIJKLMNOPQRSTUVWXYZ";
$Win = false;


// Extracting the words and clues from the text file
$file_handle = fopen("wordnclue.txt", "rb");
$i=0;
$answers = [];
$clue = [];
while (!feof($file_handle) ) {

    $text_row = fgets($file_handle);
    $parts = explode(',', $text_row);
    $answers[$i] = $parts[0];   // Storing the word into the answer array
    $clue[$i] = $parts[1];   // Storing word clue into the clue array
    $i++;
}
fclose($file_handle);

/* This code will restart the game when the restart button is pressed */
if(isset($_GET['start'])){
    resetGame();
}
/*This will detect when the key is pressed  */
if(isset($_GET['keyPress'])){
    $liveKey = isset($_GET['keyPress']) ? $_GET['keyPress'] : null;
    // if correct key is pressed
    if($liveKey
        && isAlphabetRight($liveKey)
        && !isHangmanReady()
        && !gameFinished()){

        addGuess($liveKey);
        if(isAnswerRight()){
            $Win = true;
            setGameAsFinished();

        }
    }else{
        // If wrong key is pressed hangman  will start building itself
        if(!isHangmanReady()){
            addBody();
            if(isHangmanReady()){
                setGameAsFinished();
            }
        }else{
            setGameAsFinished();
        }
    }
}

include("GameDesign.php");
?>

