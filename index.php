<?php

$stages = [1=>"
  +---+
  |   |
      |
      |
      |
      |
=========",2=>"
  +---+
  |   |
  O   |
      |
      |
      |
=========",3=>"
  +---+
  |   |
  O   |
  |   |
      |
      |
=========",4=>"
  +---+
  |   |
  O   |
 /|   |
      |
      |
=========",5=>"
  +---+
  |   |
  O   |
 /|\  |
      |
      |
=========",6=>"
  +---+
  |   |
  O   |
 /|\  |
 /    |
      |
=========",7=>"
  +---+
  |   |
  O   |
 /|\  |
 / \  |
      |
========="
];

$guess = readline('Guess a letter: ');

$attempts = 0;

checkUsrInput($guess,$stages,$attempts);

// getWord();
// echo getWord()."\n";

function getWord() {
  $words = ['Chocolate','Cheese','Test','Paper','Shark','Empire','Toss','Jumper','Pain ','Bottle','Pat','Love','Song','Back','Muscles','Sighing','Beast','Bed','Lie'];

  $ran = rand(0, count($words)-1);
  return $words[$ran];
}

function checkUsrInput($guess,$stages,$attempts) {
  # checks whether the letter inputted is in the word ramdomly chosen. If it is then it will print out the letters within the string. Otherwise, the stage will increment and the user will have to guess another letter
}

function incrementStage($attempts) {
    # goes to the next stage of the game
    $attempts++;

    return $attempts;
}
