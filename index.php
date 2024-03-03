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

echo "Welcome to Hangman \n";
$guess = readline('Guess:');
echo "\n";
for ($x=0; $x<count($word); $x++) {

	checkUsrInput($word,$guess,$stage,$attempt,$x);
}
echo "\n\n";

function getWord() {
    $words = ['Chocolate','Cheese','Test','Paper','Shark','Empire','Toss','Jumper','Pain ','Bottle','Pat','Love','Song','Back','Muscles','Sighing','Beast','Bed','Lie'];

    $ran = rand(0, count($words)-1);
    // return $words[$ran];
    return $words[1]; // cheese for testing
}

function checkUsrInput($word,$guess,$stage,$attempt,$x) {
    # checks whether the letter inputted is in the word ramdomly chosen. If it is then it will print out the letters within the string. Otherwise, the stage will increment and the user will have to guess another letter

    if ($word[$x] == $guess) {
        echo " ".$word[$x]." ";
    }
    else {
        echo " _ ";
        incrementStage($attempt);
    }
}

function incrementStage() {
    # goes to the next stage of the game
    global $attempt;
    $attempt++;

    return $attempt;
}
