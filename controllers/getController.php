<?php

$wordIndex = getRandomIndex($words);
$trials = 0;
$letters= getLettersArray();
$triedLetters = '';
$word = getWord($words,$wordIndex);
$wordLength = strlen($word);
$replacementString = getReplacementString($wordLength);
$remainingTrials = MAX_TRIALS;
$wordFound = false;



setcookie('gamedata', encode(compact('letters','triedLetters','wordIndex','replacementString','trials')));