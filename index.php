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

$word = str_split(strtolower(getWord()));
$prevguess = array();

echo "Welcome to Hangman \n";
echo "Your word to guess is.. \n";
for ($i=0;$i<count($word);$i++) {
    echo " _ ";
}
echo "\n\n";

for ($counter=1;$counter<count($stage); $counter++) {

    $guess = strtolower(readline('Guess:'));
    echo "\n";

    checkUsrInput($word,$guess,$stage,$counter);

    echo "\n\n";
}

echo "Your word was... ".getWord()."\n\nRun the program to play again!\n";

function getWord() {
    $words = ['Chocolate','Cheese','Test','Paper','Shark','Empire','Toss','Jumper','Pain ','Bottle','Pat','Love','Song','Back','Muscles','Sighing','Beast','Bed','Lie'];

    $ran = rand(0, count($words)-1);
    // return $words[$ran];
    return $words[1]; // cheese for testing purposes
}

function checkUsrInput($word,$guess,$stage,$counter) {
    # checks whether the letter inputted is in the word ramdomly chosen. If it is then it will print out the letters within the string. Otherwise, the stage will increment and the user will have to guess another letter

    global $prevguess;
    
    for ($x=0; $x<count($word); $x++) {
        if (in_array($word[$x], $prevguess) || $word[$x] == $guess) {
            if ($word[$x] == $guess) {
                $prevguess[] .= $guess;
            }
            echo " ".$word[$x]." ";
        }
        else {
            echo " _ ";
            // incrementStage($attempt);
            // print_r($stage[$attempt])."\n";
        }
    }
}

function incrementStage() {
    # goes to the next stage of the game
    global $attempt;
    $attempt++;

    return $attempt;
}
