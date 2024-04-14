<?php

$stage = [1=>"
+---+
|   |
|
|
|
|
=========",2=>"
+---+
|   |
|   O
|
|
|
=========",3=>"
+---+
|   |
|   O
|   |
|
|
=========",4=>"
+---+
|   |
|   O
|  /|
|
|
=========",5=>"
+---+
|   |
|   O
|  /|\
|
|
=========",6=>"
+---+
|   |
|   O
|  /|\
|  /
|
=========",7=>"
+---+
|   |
|   O
|  /|\
|  / \
|
========="
];

$attempt = 1;
$word = str_split(getWord());
$prevguess = array();

echo "Welcome to Hangman \n";
for ($i=0;$i<count($stage); $i++) {

    $guess = readline('Guess:');
    echo "\n";
    for ($x=0; $x<count($word); $x++) {
        checkUsrInput($word,$guess,$stage,$attempt,$x);
    }
    echo "\n\n";
}

echo "Your word was... ".getWord()."\n\nRun the program to play again!\n";

function getWord() {
    $words = ['Chocolate','Cheese','Test','Paper','Shark','Empire','Toss','Jumper','Pain ','Bottle','Pat','Love','Song','Back','Muscles','Sighing','Beast','Bed','Lie'];

    $ran = rand(0, count($words)-1);
    // return $words[$ran];
    return $words[1]; // cheese for testing purposes
}

function checkUsrInput($word,$guess,$stage,$attempt,$x) {
    # checks whether the letter inputted is in the word ramdomly chosen. If it is then it will print out the letters within the string. Otherwise, the stage will increment and the user will have to guess another letter

    global $prevguess;

    if (in_array($word[$x], $prevguess) || $word[$x] == $guess) {
        $prevguess[] .= $guess;
        echo " ".$word[$x]." ";
    }
    else {
        echo " _ ";
        incrementStage($attempt);
        // print_r($stage[$attempt])."\n";
    }
}

function incrementStage() {
    # goes to the next stage of the game
    global $attempt;
    $attempt++;

    return $attempt;
}
