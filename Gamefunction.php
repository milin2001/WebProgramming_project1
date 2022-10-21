<?php
function getPhoto($part){
    return "body_". $part. ".png";
}


// Get all the hangman Parts
function getBody(){
    global $frameWork;
    return isset($_SESSION["parts"]) ? $_SESSION["parts"] : $frameWork;
}

// add part to the Hangman
function addBody(){
    $parts = getBody();
    array_shift($parts);
    $_SESSION["parts"] = $parts;
}

// get Current Hangman Body part
function getCurrentBody(){
    $parts = getBody();
    return $parts[0];
}

// get the current answers
function getCurrentTerm(){
    //  return "HANGMAN"; // for now testing
    global $answers;
    if(!isset($_SESSION["word"]) && empty($_SESSION["word"])){
        $key = array_rand($answers);
        $_SESSION["word"] = $answers[$key];
    }
    return $_SESSION["word"];
}


// user responses logic

// get user response
function getCurrentGuess(){
    return isset($_SESSION["responses"]) ? $_SESSION["responses"] : [];
}

function addGuess($letter){
    $responses = getCurrentGuess();
    array_push($responses, $letter);
    $_SESSION["responses"] = $responses;
}

// check if pressed letter is correct
function isAlphabetRight($letter){
    $word = getCurrentTerm();
    $max = strlen($word) - 1;
    for($i=0; $i<= $max; $i++){
        if($letter == $word[$i]){
            return true;
        }
    }
    return false;
}

// is the word (guess) correct

function isAnswerRight(){
    $predict = getCurrentTerm();
    $responses = getCurrentGuess();
    $max = strlen($predict) - 1;
    for($i=0; $i<= $max; $i++){
        if(!in_array($predict[$i],  $responses)){
            return false;
        }
    }
    return true;
}

// check if the body is ready to hang

function isHangmanReady(){
    $parts = getBody();
    // is the current parts less than or equal to one
    if(count($parts) <= 1){
        return true;
    }
    return false;
}

// manage game session

// is game complete
function gameFinished(){
    return isset($_SESSION["gameFinished"]) ? $_SESSION["gameFinished"] :false;
}


// set game as complete
function setGameAsFinished(){
    $_SESSION["gameFinished"] = true;
}
// restart the game. Clear the session variables
function resetGame(){
    session_destroy();
    session_start();

}

// start a new game
function setNewGame(){
    $_SESSION["gameFinished"] = false;
}

?>

