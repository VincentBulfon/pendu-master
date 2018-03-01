<?php

$wordIndex = getRandomIndex($words);
$letters= getLettersArray();
$triedLetters = '';
$word = getWord($words,$wordIndex);
$wordLength = strlen($word);
$replacementString = getReplacementString($wordLength);
$serializedLetters=getSerializedLetters($letters);