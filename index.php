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

$word = getWord();
$lowword = str_split(strtolower($word));
$prevguess = array();
$badattempts = 1;

echo "Welcome to Hangman \n";
echo "Your word to guess is.. \n";
for ($i=0;$i<count($lowword);$i++) {
    echo " _ ";
}
echo "\n\n";

while ($badattempts < count($stage)) {

    if (count(array_unique($prevguess)) == count(array_unique($lowword))) {
        echo "You won! \n\nRun the program to play again!\n";
        exit;
    }
    else {
        $guess = strtolower(readline('Guess:'));
        echo "\n";

        checkUsrInput($lowword,$guess,$stage,$badattempts);

        echo "\n\n";
    }
}

echo "Your word was... ".$word."\n\nRun the program to play again!\n";

function getWord() {
    $words = ['Chocolate','Cheese','Test','Paper','Shark','Empire','Toss','Jumper','Pain','Bottle','Pat','Love','Song','Back','Muscles','Sighing','Beast','Bed','Lie'];

    $ran = rand(0, count($words)-1);
    return $words[$ran];
}

function checkUsrInput($lowword,$guess,$stage,$badattempts) {
    # checks whether the letter inputted is in the word ramdomly chosen. If it is then it will print out the letters within the string. Otherwise, the stage will increment and the user will have to guess another letter

    global $prevguess;
    global $badattempts;

    if (!in_array($guess, $lowword)) {
        $badattempts++;
        print_r($stage[$badattempts]);
        echo "\n";
    }

    for ($x=0; $x<count($lowword); $x++) {
        
        if (in_array($lowword[$x], $prevguess) || $lowword[$x] == $guess) {
            if ($lowword[$x] == $guess) {
                $prevguess[] .= $guess;
            }
            echo " ".$lowword[$x]." ";
        }
        else {
            echo " _ ";
        }
    }
}

function incrementStage($stage) {
    # goes to the next stage of the game
    $stage++;

    return $stage;
}
